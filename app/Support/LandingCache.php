<?php

namespace App\Support;

use App\Models\Gejala;
use App\Models\Hama;
use App\Models\Komoditas;
use App\Models\Penyakit;
use App\Models\RiwayatDeteksi;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class LandingCache
{
    public const STATS_KEY = 'landing.stats';

    public const KOMODITAS_KEY = 'landing.komoditas';

    public const TTL = 600;

    public static function stats(): array
    {
        return Cache::remember(self::STATS_KEY, self::TTL, fn () => [
            'penyakit' => Penyakit::count(),
            'hama' => Hama::count(),
            'gejala' => Gejala::count(),
            'deteksi' => RiwayatDeteksi::count(),
        ]);
    }

    public static function komoditasList(): Collection
    {
        return Cache::remember(self::KOMODITAS_KEY, self::TTL, fn () => Komoditas::orderBy('nama')->get());
    }

    public static function forgetStats(): void
    {
        Cache::forget(self::STATS_KEY);
    }

    public static function forgetKomoditas(): void
    {
        Cache::forget(self::KOMODITAS_KEY);
    }

    public static function registerInvalidation(): void
    {
        foreach ([Penyakit::class, Hama::class, Gejala::class, RiwayatDeteksi::class] as $model) {
            $model::saved(fn () => self::forgetStats());
            $model::deleted(fn () => self::forgetStats());
        }

        Komoditas::saved(fn () => self::forgetKomoditas());
        Komoditas::deleted(fn () => self::forgetKomoditas());
    }
}
