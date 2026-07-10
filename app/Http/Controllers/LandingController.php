<?php

namespace App\Http\Controllers;

use App\Support\LandingCache;
use Illuminate\Contracts\View\View;

class LandingController extends Controller
{
    public function home(): View
    {
        $stats = LandingCache::stats();
        $komoditasList = LandingCache::komoditasList();

        return view('landing.home', compact('stats', 'komoditasList'));
    }

    public function tentang(): View
    {
        $komoditasList = LandingCache::komoditasList();
        $stats = LandingCache::stats();

        return view('landing.tentang', compact('komoditasList', 'stats'));
    }

    public function caraKerja(): View
    {
        return view('landing.cara-kerja');
    }
}
