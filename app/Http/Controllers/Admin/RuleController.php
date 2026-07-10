<?php

namespace App\Http\Controllers\Admin;

use App\Exports\RulesCfExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\RuleRequest;
use App\Models\Gejala;
use App\Models\Hama;
use App\Models\Penyakit;
use App\Models\Rule;
use App\Support\FiltersKomoditas;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class RuleController extends Controller
{
    use FiltersKomoditas;

    public function index(Request $request): View
    {
        $jenis = $request->query('jenis');

        $rules = $this->buildFilteredRulesQuery($request)
            ->with(['details.gejala'])
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $rules->getCollection()->transform(function (Rule $rule) {
            $target = $rule->target();
            if ($target) {
                $target->load('komoditas');
            }
            $rule->setRelation('targetModel', $target);

            return $rule;
        });

        return view('admin.rules.index', array_merge(
            compact('rules', 'jenis'),
            $this->komoditasViewData($request)
        ));
    }

    public function export(Request $request): StreamedResponse
    {
        $rules = $this->buildFilteredRulesQuery($request)
            ->with(['details.gejala', 'penyakit.komoditas', 'hama.komoditas'])
            ->latest()
            ->get();

        $filename = 'rules-cf-' . now()->format('Y-m-d-His') . '.xlsx';

        return (new RulesCfExport($rules))->download($filename);
    }

    public function create(Request $request): View
    {
        $komoditasId = $this->resolveRuleKomoditasId($request);

        return view('admin.rules.create', array_merge(
            $this->filteredRuleLists($komoditasId),
            [
                'rule' => new Rule(),
                'selectedGejala' => [],
            ],
            $this->komoditasViewData($request)
        ));
    }

    public function store(RuleRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $rule = Rule::create([
                'jenis' => $request->input('jenis'),
                'target_id' => (int) $request->input('target_id'),
            ]);

            foreach ($request->normalizedGejala() as $row) {
                $rule->details()->create($row);
            }
        });

        return redirect()
            ->route('rules.index')
            ->with('success', 'Rule berhasil ditambahkan.');
    }

    public function edit(Request $request, Rule $rule): View
    {
        $rule->load('details.gejala');

        $selectedGejala = $rule->details->map(fn ($detail) => [
            'id' => $detail->gejala_id,
            'nilai_cf' => (float) $detail->nilai_cf,
        ])->keyBy('id')->all();

        $komoditasId = $this->resolveRuleKomoditasId($request, $rule);

        return view('admin.rules.edit', array_merge(
            $this->filteredRuleLists($komoditasId),
            [
                'rule' => $rule,
                'selectedGejala' => $selectedGejala,
            ],
            $this->komoditasViewData($request)
        ));
    }

    public function update(RuleRequest $request, Rule $rule): RedirectResponse
    {
        DB::transaction(function () use ($request, $rule) {
            $rule->update([
                'jenis' => $request->input('jenis'),
                'target_id' => (int) $request->input('target_id'),
            ]);

            $rule->details()->delete();

            foreach ($request->normalizedGejala() as $row) {
                $rule->details()->create($row);
            }
        });

        return redirect()
            ->route('rules.index')
            ->with('success', 'Rule berhasil diperbarui.');
    }

    public function destroy(Rule $rule): RedirectResponse
    {
        $rule->delete();

        return redirect()
            ->route('rules.index')
            ->with('success', 'Rule berhasil dihapus.');
    }

    private function resolveRuleKomoditasId(Request $request, ?Rule $rule = null): ?int
    {
        $jenis = $request->old('jenis');
        $targetId = $request->old('target_id');

        if ($jenis && $targetId) {
            if ($jenis === 'penyakit') {
                return Penyakit::where('id', $targetId)->value('komoditas_id');
            }

            if ($jenis === 'hama') {
                return Hama::where('id', $targetId)->value('komoditas_id');
            }
        }

        if ($rule) {
            $fromRule = $rule->target()?->komoditas_id;
            if ($fromRule) {
                return $fromRule;
            }
        }

        return $this->komoditasFilterId($request);
    }

    /** @return array<string, mixed> */
    private function filteredRuleLists(?int $komoditasId): array
    {
        $gejalaQuery = Gejala::orderBy('kode_gejala');
        $penyakitQuery = Penyakit::orderBy('kode_penyakit');
        $hamaQuery = Hama::orderBy('kode_hama');

        if ($komoditasId) {
            $gejalaQuery->where('komoditas_id', $komoditasId);
            $penyakitQuery->where('komoditas_id', $komoditasId);
            $hamaQuery->where('komoditas_id', $komoditasId);
        }

        return [
            'gejalaList' => $gejalaQuery->get(),
            'penyakitList' => $penyakitQuery->get(),
            'hamaList' => $hamaQuery->get(),
        ];
    }

    private function buildFilteredRulesQuery(Request $request): Builder
    {
        $jenis = $request->query('jenis');
        $komoditasId = $this->komoditasFilterId($request);

        return Rule::query()
            ->when(in_array($jenis, ['penyakit', 'hama'], true), fn ($q) => $q->where('jenis', $jenis))
            ->when($komoditasId, function ($query) use ($komoditasId) {
                $penyakitIds = Penyakit::where('komoditas_id', $komoditasId)->pluck('id');
                $hamaIds = Hama::where('komoditas_id', $komoditasId)->pluck('id');

                $query->where(function ($q) use ($penyakitIds, $hamaIds) {
                    $q->where(function ($inner) use ($penyakitIds) {
                        $inner->where('jenis', 'penyakit')->whereIn('target_id', $penyakitIds);
                    })->orWhere(function ($inner) use ($hamaIds) {
                        $inner->where('jenis', 'hama')->whereIn('target_id', $hamaIds);
                    });
                });
            });
    }
}
