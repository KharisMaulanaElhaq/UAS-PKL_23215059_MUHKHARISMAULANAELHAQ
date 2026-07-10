<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakit';

    protected $fillable = [
        'komoditas_id',
        'kode_penyakit',
        'nama_penyakit',
        'deskripsi',
        'solusi',
        'gambar',
    ];

    public function komoditas(): BelongsTo
    {
        return $this->belongsTo(Komoditas::class);
    }

    protected $appends = ['gambar_url'];

    public function getGambarUrlAttribute(): string
    {
        if ($this->gambar && file_exists(public_path($this->gambar))) {
            return asset($this->gambar);
        }

        return asset('assets/images/targets/default-penyakit.jpg');
    }

    public function rules(): HasMany
    {
        return $this->hasMany(Rule::class, 'target_id')->where('jenis', 'penyakit');
    }
}
