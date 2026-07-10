<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PenyakitRequest;
use App\Models\Komoditas;
use App\Models\Penyakit;
use App\Support\FiltersKomoditas;
use App\Support\TargetImageUploader;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    use FiltersKomoditas;

    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));

        $penyakit = Penyakit::query()
            ->with('komoditas')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('kode_penyakit', 'like', "%{$search}%")
                        ->orWhere('nama_penyakit', 'like', "%{$search}%");
                });
            });

        $this->applyKomoditasFilter($penyakit, $request);

        $penyakit = $penyakit
            ->orderBy('kode_penyakit')
            ->paginate(10)
            ->withQueryString();

        return view('admin.penyakit.index', array_merge(
            compact('penyakit', 'search'),
            $this->komoditasViewData($request)
        ));
    }

    public function create(): View
    {
        return view('admin.penyakit.create', [
            'komoditasList' => Komoditas::orderBy('nama')->get(),
        ]);
    }

    public function store(PenyakitRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = TargetImageUploader::store($request->file('gambar'), 'penyakit');
        }

        Penyakit::create($data);

        return redirect()
            ->route('penyakit.index')
            ->with('success', 'Penyakit berhasil ditambahkan.');
    }

    public function show(Penyakit $penyakit): View
    {
        $penyakit->load('komoditas');

        return view('admin.penyakit.show', [
            'penyakit' => $penyakit,
            'komoditasList' => Komoditas::orderBy('nama')->get(),
        ]);
    }

    public function edit(Penyakit $penyakit): View
    {
        return view('admin.penyakit.edit', [
            'penyakit' => $penyakit,
            'komoditasList' => Komoditas::orderBy('nama')->get(),
        ]);
    }

    public function update(PenyakitRequest $request, Penyakit $penyakit): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            TargetImageUploader::delete($penyakit->gambar);
            $data['gambar'] = TargetImageUploader::store($request->file('gambar'), 'penyakit');
        }

        $penyakit->update($data);

        return redirect()
            ->route('penyakit.index')
            ->with('success', 'Penyakit berhasil diperbarui.');
    }

    public function destroy(Penyakit $penyakit): RedirectResponse
    {
        $penyakit->delete();

        return redirect()
            ->route('penyakit.index')
            ->with('success', 'Penyakit berhasil dihapus.');
    }
}
