<?php

namespace App\Http\Controllers;

use App\Models\Komoditas;
use App\Models\RiwayatDeteksi;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(Request $request): View
    {
        $komoditasId = $request->query('komoditas_id');
        $komoditasList = Komoditas::orderBy('nama')->get();

        $riwayat = RiwayatDeteksi::query()
            ->with('komoditas')
            ->where('user_id', $request->user()->id)
            ->when($komoditasId, fn ($q) => $q->where('komoditas_id', (int) $komoditasId))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('landing.riwayat', compact('riwayat', 'komoditasList', 'komoditasId'));
    }
}
