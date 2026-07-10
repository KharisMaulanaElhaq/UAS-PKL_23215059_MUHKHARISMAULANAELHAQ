<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Hama;
use App\Models\Komoditas;
use App\Models\Penyakit;
use App\Models\RiwayatDeteksi;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $komoditasId = $request->query('komoditas_id');
        $komoditasList = Komoditas::orderBy('nama')->get();

        $stats = [
            'gejala' => Gejala::when($komoditasId, fn ($q) => $q->where('komoditas_id', $komoditasId))->count(),
            'penyakit' => Penyakit::when($komoditasId, fn ($q) => $q->where('komoditas_id', $komoditasId))->count(),
            'hama' => Hama::when($komoditasId, fn ($q) => $q->where('komoditas_id', $komoditasId))->count(),
            'rules' => Rule::count(),
            'users' => User::count(),
            'deteksi' => RiwayatDeteksi::when($komoditasId, fn ($q) => $q->where('komoditas_id', $komoditasId))->count(),
        ];

        $latestRules = Rule::latest()->take(5)->get();
        $latestGejala = Gejala::with('komoditas')
            ->when($komoditasId, fn ($q) => $q->where('komoditas_id', $komoditasId))
            ->latest()->take(5)->get();
        $latestDeteksi = RiwayatDeteksi::with(['user', 'komoditas'])
            ->when($komoditasId, fn ($q) => $q->where('komoditas_id', $komoditasId))
            ->latest()->take(8)->get();

        $chartData = $this->buildChartData($komoditasId ? (int) $komoditasId : null);

        return view('admin.dashboard', compact('stats', 'latestRules', 'latestGejala', 'latestDeteksi', 'chartData', 'komoditasList', 'komoditasId'));
    }

    private function buildChartData(?int $komoditasId = null): array
    {
        $penyakitRules = Penyakit::query()
            ->when($komoditasId, fn ($q) => $q->where('komoditas_id', $komoditasId))
            ->withCount(['rules'])
            ->orderByDesc('rules_count')
            ->take(6)
            ->get(['id', 'kode_penyakit', 'nama_penyakit']);

        $hamaRules = Hama::query()
            ->when($komoditasId, fn ($q) => $q->where('komoditas_id', $komoditasId))
            ->withCount(['rules'])
            ->orderByDesc('rules_count')
            ->take(6)
            ->get(['id', 'kode_hama', 'nama_hama']);

        $deteksiPerBulan = RiwayatDeteksi::query()
            ->when($komoditasId, fn ($q) => $q->where('komoditas_id', $komoditasId))
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as bulan"), DB::raw('COUNT(*) as total'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->take(12)
            ->get();

        $deteksiPerKomoditas = RiwayatDeteksi::query()
            ->select('nama_komoditas', DB::raw('COUNT(*) as total'))
            ->groupBy('nama_komoditas')
            ->orderByDesc('total')
            ->get();

        $deteksiPenyakit = RiwayatDeteksi::query()
            ->when($komoditasId, fn ($q) => $q->where('komoditas_id', $komoditasId))
            ->where('jenis_hasil', 'penyakit')
            ->select('nama_target', DB::raw('COUNT(*) as total'))
            ->groupBy('nama_target')
            ->orderByDesc('total')
            ->take(6)
            ->get();

        $deteksiHama = RiwayatDeteksi::query()
            ->when($komoditasId, fn ($q) => $q->where('komoditas_id', $komoditasId))
            ->where('jenis_hasil', 'hama')
            ->select('nama_target', DB::raw('COUNT(*) as total'))
            ->groupBy('nama_target')
            ->orderByDesc('total')
            ->take(6)
            ->get();

        return [
            'overview' => [
                'categories' => ['Gejala', 'Penyakit', 'Hama', 'Rules'],
                'series' => [
                    Gejala::when($komoditasId, fn ($q) => $q->where('komoditas_id', $komoditasId))->count(),
                    Penyakit::when($komoditasId, fn ($q) => $q->where('komoditas_id', $komoditasId))->count(),
                    Hama::when($komoditasId, fn ($q) => $q->where('komoditas_id', $komoditasId))->count(),
                    Rule::count(),
                ],
            ],
            'deteksi_komoditas' => [
                'categories' => $deteksiPerKomoditas->pluck('nama_komoditas')->filter()->all(),
                'series' => $deteksiPerKomoditas->pluck('total')->map(fn ($v) => (int) $v)->all(),
            ],
            'penyakit' => [
                'categories' => $penyakitRules->pluck('kode_penyakit')->all(),
                'labels' => $penyakitRules->pluck('nama_penyakit')->all(),
                'series' => $penyakitRules->pluck('rules_count')->map(fn ($v) => (int) $v)->all(),
            ],
            'hama' => [
                'categories' => $hamaRules->pluck('kode_hama')->all(),
                'labels' => $hamaRules->pluck('nama_hama')->all(),
                'series' => $hamaRules->pluck('rules_count')->map(fn ($v) => (int) $v)->all(),
            ],
            'deteksi_bulan' => [
                'categories' => $deteksiPerBulan->pluck('bulan')->map(fn ($b) => date('M Y', strtotime($b . '-01')))->all(),
                'series' => $deteksiPerBulan->pluck('total')->map(fn ($v) => (int) $v)->all(),
            ],
            'deteksi_penyakit' => [
                'categories' => $deteksiPenyakit->pluck('nama_target')->all(),
                'series' => $deteksiPenyakit->pluck('total')->map(fn ($v) => (int) $v)->all(),
            ],
            'deteksi_hama' => [
                'categories' => $deteksiHama->pluck('nama_target')->all(),
                'series' => $deteksiHama->pluck('total')->map(fn ($v) => (int) $v)->all(),
            ],
        ];
    }
}
