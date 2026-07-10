<?php

namespace App\Http\Controllers;

use App\Models\Komoditas;
use App\Models\Rule;
use App\Services\DiagnosisService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\View\View;

class DiagnosisController extends Controller
{
    public function __construct(
        private DiagnosisService $diagnosisService,
    ) {}

    public function index()
    {
        return redirect()->route('deteksi.komoditas', 'jagung');
    }

    public function detect(Komoditas $komoditas): View
    {
        return view('landing.deteksi', compact('komoditas'));
    }

    public function targets(Komoditas $komoditas): JsonResponse
    {
        return response()->json([
            'komoditas' => [
                'id' => $komoditas->id,
                'nama' => $komoditas->nama,
                'slug' => $komoditas->slug,
                'gambar' => $komoditas->gambar_url,
            ],
            'targets' => $this->diagnosisService->getTargets($komoditas->id),
        ]);
    }

    public function symptomsForTarget(Komoditas $komoditas, string $jenis, int $targetId): JsonResponse
    {
        $this->validateTarget($komoditas, $jenis, $targetId);

        $symptoms = $this->diagnosisService->getSymptomsForTarget($komoditas->id, $jenis, $targetId);
        $targets = $this->diagnosisService->getTargets($komoditas->id);
        $target = $targets->first(
            fn ($t) => $t['jenis'] === $jenis && (int) $t['target_id'] === $targetId
        );

        return response()->json([
            'target' => $target,
            'symptoms' => $symptoms,
        ]);
    }

    public function calculate(Komoditas $komoditas, Request $request): JsonResponse
    {
        $validated = $this->validateBackwardRequest($komoditas, $request);
        [$selectedIds, $userCfMap] = $this->parseSymptomsInput($validated['symptoms']);

        $result = $this->diagnosisService->calculateForTarget(
            $komoditas->id,
            $validated['jenis'],
            (int) $validated['target_id'],
            $selectedIds,
            $userCfMap,
        );

        if (! $result) {
            return response()->json(['message' => 'Gejala tidak valid untuk target ini.'], 422);
        }

        return response()->json(['result' => $result]);
    }

    public function store(Komoditas $komoditas, Request $request): JsonResponse
    {
        $validated = $this->validateBackwardRequest($komoditas, $request, true);
        [$selectedIds, $userCfMap] = $this->parseSymptomsInput($validated['symptoms']);

        $riwayat = $this->diagnosisService->saveHistoryForTarget(
            komoditasId: $komoditas->id,
            jenis: $validated['jenis'],
            targetId: (int) $validated['target_id'],
            selectedGejalaIds: $selectedIds,
            userCfMap: $userCfMap,
            userId: auth()->id(),
            guestName: auth()->check() ? null : $request->input('nama_pengguna'),
            ipAddress: $request->ip(),
        );

        return response()->json([
            'success' => true,
            'message' => 'Riwayat deteksi berhasil disimpan.',
            'riwayat_id' => $riwayat->id,
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function validateBackwardRequest(Komoditas $komoditas, Request $request, bool $allowGuestName = false): array
    {
        $rules = [
            'jenis' => ['required', 'string', ValidationRule::in([Rule::JENIS_PENYAKIT, Rule::JENIS_HAMA])],
            'target_id' => 'required|integer|min:1',
            'symptoms' => 'required|array|min:1',
            'symptoms.*.id' => 'required|integer|exists:gejala,id',
            'symptoms.*.user_cf' => ['required', 'numeric', ValidationRule::in(DiagnosisService::allowedUserCfValues())],
        ];

        if ($allowGuestName) {
            $rules['nama_pengguna'] = 'nullable|string|max:100';
        }

        $validated = $request->validate($rules);
        $this->validateTarget($komoditas, $validated['jenis'], (int) $validated['target_id']);

        return $validated;
    }

    private function validateTarget(Komoditas $komoditas, string $jenis, int $targetId): void
    {
        if (! $this->diagnosisService->targetBelongsToKomoditas($komoditas->id, $jenis, $targetId)) {
            abort(404, 'Penyakit/hama tidak ditemukan untuk komoditas ini.');
        }
    }

    /**
     * @param  array<int, array{id: int, user_cf: float}>  $symptoms
     * @return array{0: array<int>, 1: array<int, float>}
     */
    private function parseSymptomsInput(array $symptoms): array
    {
        $selectedIds = [];
        $userCfMap = [];

        foreach ($symptoms as $item) {
            $id = (int) $item['id'];
            $selectedIds[] = $id;
            $userCfMap[$id] = $this->diagnosisService->normalizeUserCf((float) $item['user_cf']);
        }

        return [$selectedIds, $userCfMap];
    }
}
