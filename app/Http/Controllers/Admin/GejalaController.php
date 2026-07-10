<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GejalaRequest;
use App\Models\Gejala;
use App\Models\Komoditas;
use App\Support\FiltersKomoditas;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    use FiltersKomoditas;

    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));

        $gejala = Gejala::query()
            ->with([
                'komoditas',
                'rules.penyakit',
                'rules.hama',
            ])
            ->withCount('rules')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('kode_gejala', 'like', "%{$search}%")
                        ->orWhere('nama_gejala', 'like', "%{$search}%");
                });
            });

        $this->applyKomoditasFilter($gejala, $request);

        $gejala = $gejala
            ->orderBy('kode_gejala')
            ->paginate(10)
            ->withQueryString();

        return view('admin.gejala.index', array_merge(
            compact('gejala', 'search'),
            $this->komoditasViewData($request)
        ));
    }

    public function create(): View
    {
        return view('admin.gejala.create', [
            'komoditasList' => Komoditas::orderBy('nama')->get(),
        ]);
    }

    public function store(GejalaRequest $request): RedirectResponse
    {
        Gejala::create($request->validated());

        return redirect()
            ->route('gejala.index')
            ->with('success', 'Gejala berhasil ditambahkan.');
    }

    public function edit(Gejala $gejala): View
    {
        $gejala->load(['komoditas', 'rules.penyakit', 'rules.hama']);

        return view('admin.gejala.edit', [
            'gejala' => $gejala,
            'komoditasList' => Komoditas::orderBy('nama')->get(),
        ]);
    }

    public function update(GejalaRequest $request, Gejala $gejala): RedirectResponse
    {
        $gejala->update($request->validated());

        return redirect()
            ->route('gejala.index')
            ->with('success', 'Gejala berhasil diperbarui.');
    }

    public function destroy(Gejala $gejala): RedirectResponse
    {
        $gejala->delete();

        return redirect()
            ->route('gejala.index')
            ->with('success', 'Gejala berhasil dihapus.');
    }
}
