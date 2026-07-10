<?php

namespace App\Support;

use App\Models\Gejala;
use App\Models\Hama;
use App\Models\Komoditas;
use App\Models\Penyakit;
use App\Models\Rule;

class KnowledgeSeederHelper
{
    /** Kode gejala per komoditas: GP01 (padi), GJ01 (jagung), GB01 (bawang). */
    public static function gejalaCode(string $slug, int $number): string
    {
        $letter = match ($slug) {
            'padi' => 'P',
            'jagung' => 'J',
            'bawang' => 'B',
            default => 'X',
        };

        return sprintf('G%s%02d', $letter, $number);
    }

    /** Path gambar target, mis. targetImage('penyakit-p', 4) → assets/images/targets/penyakit-p04.jpg */
    public static function targetImage(string $basename, int $number): string
    {
        return sprintf('assets/images/targets/%s%02d.jpg', $basename, $number);
    }

    /**
     * Satu gejala dapat dipakai di banyak rule (penyakit/hama).
     * Bobot CF pakar disimpan per rule di tabel rule_details (nilai_cf).
     *
     * @param  array<int, array{0: string, 1: string}>  $gejalaRows  [kode, nama]
     * @param  array<int, array<string, mixed>>  $penyakitRows
     * @param  array<int, array<string, mixed>>  $hamaRows
     * @param  array<int, array{jenis: string, target_code: string, gejala: array<int, array{0: string, 1: float>}|array<string, float>}>  $rulesConfig
     */
    public static function seed(Komoditas $komoditas, array $gejalaRows, array $penyakitRows, array $hamaRows, array $rulesConfig): void
    {
        $kodeList = [];

        foreach ($gejalaRows as [$kode, $nama]) {
            Gejala::updateOrCreate(
                ['komoditas_id' => $komoditas->id, 'kode_gejala' => $kode],
                ['nama_gejala' => $nama],
            );
            $kodeList[] = $kode;
        }

        foreach ($penyakitRows as $row) {
            Penyakit::updateOrCreate(
                ['komoditas_id' => $komoditas->id, 'kode_penyakit' => $row['kode_penyakit']],
                array_merge($row, ['komoditas_id' => $komoditas->id]),
            );
        }

        foreach ($hamaRows as $row) {
            Hama::updateOrCreate(
                ['komoditas_id' => $komoditas->id, 'kode_hama' => $row['kode_hama']],
                array_merge($row, ['komoditas_id' => $komoditas->id]),
            );
        }

        foreach ($rulesConfig as $cfg) {
            $target = $cfg['jenis'] === Rule::JENIS_PENYAKIT
                ? Penyakit::where('komoditas_id', $komoditas->id)->where('kode_penyakit', $cfg['target_code'])->first()
                : Hama::where('komoditas_id', $komoditas->id)->where('kode_hama', $cfg['target_code'])->first();

            if (! $target) {
                continue;
            }

            $rule = Rule::firstOrCreate([
                'jenis' => $cfg['jenis'],
                'target_id' => $target->id,
            ]);

            $rule->details()->delete();

            foreach (self::normalizeRuleGejala($cfg['gejala']) as [$kode, $cf]) {
                $gejala = Gejala::where('komoditas_id', $komoditas->id)->where('kode_gejala', $kode)->first();
                if (! $gejala) {
                    continue;
                }

                $rule->details()->create([
                    'gejala_id' => $gejala->id,
                    'nilai_cf' => $cf,
                ]);
            }
        }

        self::pruneUnusedGejalaCodes($komoditas, $kodeList);
    }

    /**
     * @param  array<int, array{0: string, 1: float>}|array<string, float>  $gejala
     * @return array<int, array{0: string, 1: float}>
     */
    public static function normalizeRuleGejala(array $gejala): array
    {
        if ($gejala === []) {
            return [];
        }

        if (array_is_list($gejala)) {
            return array_map(
                fn ($row) => [$row[0], (float) $row[1]],
                $gejala,
            );
        }

        return collect($gejala)
            ->map(fn ($cf, $kode) => [$kode, (float) $cf])
            ->values()
            ->all();
    }

    /** @param  array<int, string>  $activeCodes */
    public static function pruneUnusedGejalaCodes(Komoditas $komoditas, array $activeCodes): void
    {
        Gejala::query()
            ->where('komoditas_id', $komoditas->id)
            ->whereNotIn('kode_gejala', $activeCodes)
            ->whereDoesntHave('ruleDetails')
            ->delete();
    }

    /**
     * @param  array<string, string>  $pool
     * @return array<int, array{0: string, 1: string}>
     */
    public static function gejalaPoolToRows(array $pool): array
    {
        return collect($pool)
            ->map(fn (string $nama, string $kode) => [$kode, $nama])
            ->values()
            ->all();
    }
}
