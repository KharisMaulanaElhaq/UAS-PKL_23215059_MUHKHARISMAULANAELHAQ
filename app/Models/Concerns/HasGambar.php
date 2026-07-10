<?php

namespace App\Models\Concerns;

trait HasGambar
{
    public function getGambarUrlAttribute(): string
    {
        if ($this->gambar) {
            return asset($this->gambar);
        }

        return asset('assets/images/penyakit-hama/default.svg');
    }
}
