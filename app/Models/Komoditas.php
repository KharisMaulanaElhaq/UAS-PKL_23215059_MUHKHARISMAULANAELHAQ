<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Komoditas extends Model
{
    use HasFactory;

    protected $table = 'komoditas';

    protected $fillable = [
        'kode',
        'nama',
        'slug',
        'gambar',
        'deskripsi',
    ];

    protected $appends = ['gambar_url'];

    public const KODE_JAGUNG = 'JAGUNG';

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getGambarUrlAttribute(): string
    {
        if ($this->gambar && file_exists(public_path($this->gambar))) {
            return asset($this->gambar);
        }

        return asset('assets/images/komoditas/jagung.jpg');
    }

    /** Prefix kode gejala: GJ */
    public function gejalaKodePrefix(): string
    {
        return 'GJ';
    }

    public function gejala(): HasMany
    {
        return $this->hasMany(Gejala::class);
    }

    public function penyakit(): HasMany
    {
        return $this->hasMany(Penyakit::class);
    }

    public function hama(): HasMany
    {
        return $this->hasMany(Hama::class);
    }

    public function riwayatDeteksi(): HasMany
    {
        return $this->hasMany(RiwayatDeteksi::class);
    }
}
