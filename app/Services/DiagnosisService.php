<?php

namespace App\Services;

use App\Models\Gejala;
use App\Models\Hama;
use App\Models\Komoditas;
use App\Models\Penyakit;
use App\Models\RiwayatDeteksi;
use App\Models\Rule;
use Illuminate\Support\Collection;

class DiagnosisService
{
    /** @var array<string, string> */
    public const USER_CF_LEVELS = [
        '0' => 'Tidak',
        '0.2' => 'Tidak Yakin',
        '0.4' => 'Kurang Yakin',
        '0.6' => 'Cukup Yakin',
        '0.8' => 'Yakin',
        '1' => 'Sangat Yakin',
    ];

    public static function allowedUserCfValues(): array
    {
        return array_map('floatval', array_keys(self::USER_CF_LEVELS));
    }

    public function normalizeUserCf(float $cf): float
    {
        if (abs($cf - 0.1) < 0.001) {
            return 0.0;
        }

        $cf = round($cf, 1);
        $key = (string) $cf;
        if ($key === '1' || $cf === 1.0) {
            return 1.0;
        }

        if ($cf === 0.0) {
            return 0.0;
        }

        if (isset(self::USER_CF_LEVELS[$key])) {
            return (float) $key;
        }

        foreach (self::allowedUserCfValues() as $value) {
            if (abs($cf - $value) < 0.001) {
                return $value;
            }
        }

        return 1.0;
    }

    public function getUserCfLabel(float $cf): string
    {
        $normalized = $this->normalizeUserCf($cf);
        $key = match (true) {
            $normalized === 1.0 => '1',
            $normalized === 0.0 => '0',
            default => (string) $normalized,
        };

        return self::USER_CF_LEVELS[$key] ?? 'Sangat Yakin';
    }

    public function getKomoditasList(): Collection
    {
        return Komoditas::query()
            ->orderBy('nama')
            ->get()
            ->map(fn (Komoditas $k) => [
                'id' => $k->id,
                'kode' => $k->kode,
                'nama' => $k->nama,
                'slug' => $k->slug,
                'deskripsi' => $k->deskripsi,
                'gambar' => $k->gambar_url,
            ]);
    }

    /**
     * Backward chaining — daftar penyakit/hama per komoditas.
     */
    public function getTargets(int $komoditasId): Collection
    {
        $penyakitIds = Penyakit::where('komoditas_id', $komoditasId)->pluck('id');
        $hamaIds = Hama::where('komoditas_id', $komoditasId)->pluck('id');

        return Rule::with(['penyakit', 'hama', 'details'])
            ->where(function ($query) use ($penyakitIds, $hamaIds) {
                $query->where(function ($q) use ($penyakitIds) {
                    $q->where('jenis', Rule::JENIS_PENYAKIT)->whereIn('target_id', $penyakitIds);
                })->orWhere(function ($q) use ($hamaIds) {
                    $q->where('jenis', Rule::JENIS_HAMA)->whereIn('target_id', $hamaIds);
                });
            })
            ->get()
            ->map(function (Rule $rule) {
                $target = $rule->target();
                if (! $target) {
                    return null;
                }

                return [
                    'jenis' => $rule->jenis,
                    'target_id' => $rule->target_id,
                    'rule_id' => $rule->id,
                    'kode' => $rule->target_code,
                    'nama' => $rule->target_name,
                    'deskripsi' => $target->deskripsi ?? '',
                    'gambar' => $target->gambar_url,
                    'jumlah_gejala' => $rule->details->count(),
                ];
            })
            ->filter()
            ->sortBy('kode')
            ->values();
    }

    public function getSymptomsForTarget(int $komoditasId, string $jenis, int $targetId): Collection
    {
        if (! $this->targetBelongsToKomoditas($komoditasId, $jenis, $targetId)) {
            return collect();
        }

        $rule = Rule::with(['details.gejala'])
            ->where('jenis', $jenis)
            ->where('target_id', $targetId)
            ->first();

        if (! $rule) {
            return collect();
        }

        return $rule->details
            ->sortByDesc('nilai_cf')
            ->map(function ($detail) use ($komoditasId) {
                if (! $detail->gejala || (int) $detail->gejala->komoditas_id !== $komoditasId) {
                    return null;
                }

                return [
                    'id' => $detail->gejala->id,
                    'kode' => $detail->gejala->kode_gejala,
                    'nama' => $detail->gejala->nama_gejala,
                    'nilai_cf' => (float) $detail->nilai_cf,
                ];
            })
            ->filter()
            ->values();
    }

    /**
     * @param  array<int>  $selectedGejalaIds
     * @param  array<int, float>  $userCfMap
     */
    public function calculateForTarget(
        int $komoditasId,
        string $jenis,
        int $targetId,
        array $selectedGejalaIds,
        array $userCfMap = [],
    ): ?array {
        if (! $this->targetBelongsToKomoditas($komoditasId, $jenis, $targetId)) {
            return null;
        }

        $rule = Rule::with(['details.gejala', 'penyakit', 'hama'])
            ->where('jenis', $jenis)
            ->where('target_id', $targetId)
            ->first();

        if (! $rule) {
            return null;
        }

        $ruleGejalaIds = $rule->details->pluck('gejala_id')->all();
        $validSelected = array_values(array_intersect($selectedGejalaIds, $ruleGejalaIds));

        if (empty($validSelected)) {
            return null;
        }

        $matchedDetails = $rule->details->filter(
            fn ($d) => in_array($d->gejala_id, $validSelected, true)
                && $d->gejala
                && (int) $d->gejala->komoditas_id === $komoditasId
        );

        if ($matchedDetails->isEmpty()) {
            return null;
        }

        $cf = 0.0;
        $gejalaBreakdown = [];

        foreach ($matchedDetails as $detail) {
            $cfUser = $this->normalizeUserCf($userCfMap[$detail->gejala_id] ?? 1.0);
            $cfGejala = (float) $detail->nilai_cf * $cfUser;
            $cf = $this->combineCf($cf, $cfGejala);

            $gejalaBreakdown[] = [
                'gejala_id' => $detail->gejala_id,
                'cf_pakar' => (float) $detail->nilai_cf,
                'cf_user' => $cfUser,
                'cf_gejala' => round($cfGejala, 4),
            ];
        }

        $target = $rule->target();

        return [
            'rule_id' => $rule->id,
            'jenis' => $rule->jenis,
            'target_id' => $rule->target_id,
            'kode' => $rule->target_code,
            'nama' => $rule->target_name,
            'nilai_cf' => round($cf, 4),
            'persentase' => round($cf * 100, 1),
            'deskripsi' => $target?->deskripsi ?? '',
            'solusi' => $target?->solusi ?? '',
            'gambar' => $target?->gambar_url ?? '',
            'gejala_cocok' => $matchedDetails->count(),
            'total_gejala_rule' => $rule->details->count(),
            'gejala_breakdown' => $gejalaBreakdown,
        ];
    }

    public function combineCf(float $cfOld, float $cfNew): float
    {
        return $cfOld + ($cfNew * (1 - $cfOld));
    }

    /**
     * @param  array<int, float>  $userCfMap
     */
    public function saveHistoryForTarget(
        int $komoditasId,
        string $jenis,
        int $targetId,
        array $selectedGejalaIds,
        array $userCfMap = [],
        ?int $userId = null,
        ?string $guestName = null,
        ?string $ipAddress = null,
    ): RiwayatDeteksi {
        $result = $this->calculateForTarget($komoditasId, $jenis, $targetId, $selectedGejalaIds, $userCfMap);

        if (! $result) {
            throw new \RuntimeException('Tidak ada hasil diagnosa.');
        }

        $komoditas = Komoditas::findOrFail($komoditasId);

        $gejalaList = Gejala::where('komoditas_id', $komoditasId)
            ->whereIn('id', $selectedGejalaIds)
            ->get();

        $gejalaTerpilih = $gejalaList->map(function (Gejala $g) use ($userCfMap) {
            $cfUser = $this->normalizeUserCf($userCfMap[$g->id] ?? 1.0);

            return [
                'id' => $g->id,
                'kode' => $g->kode_gejala,
                'nama' => $g->nama_gejala,
                'cf_user' => $cfUser,
                'cf_label' => $this->getUserCfLabel($cfUser),
            ];
        })->values()->all();

        return RiwayatDeteksi::create([
            'komoditas_id' => $komoditas->id,
            'nama_komoditas' => $komoditas->nama,
            'user_id' => $userId,
            'nama_pengguna' => $guestName,
            'jenis_hasil' => $result['jenis'],
            'target_id' => $result['target_id'],
            'nama_target' => $result['nama'],
            'kode_target' => $result['kode'],
            'nilai_cf' => $result['nilai_cf'],
            'gejala_terpilih' => $gejalaTerpilih,
            'ip_address' => $ipAddress,
        ]);
    }

    public function targetBelongsToKomoditas(int $komoditasId, string $jenis, int $targetId): bool
    {
        if ($jenis === Rule::JENIS_PENYAKIT) {
            return Penyakit::where('id', $targetId)->where('komoditas_id', $komoditasId)->exists();
        }

        if ($jenis === Rule::JENIS_HAMA) {
            return Hama::where('id', $targetId)->where('komoditas_id', $komoditasId)->exists();
        }

        return false;
    }
}
