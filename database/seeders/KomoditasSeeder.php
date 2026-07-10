<?php

namespace Database\Seeders;

use App\Models\Komoditas;
use Illuminate\Database\Seeder;

class KomoditasSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'kode' => Komoditas::KODE_JAGUNG,
                'nama' => 'Jagung',
                'slug' => 'jagung',
                'deskripsi' => 'Deteksi penyakit dan hama pada tanaman jagung.',
                'gambar' => 'assets/images/komoditas/jagung.jpg',
            ],
        ];

        foreach ($items as $row) {
            Komoditas::updateOrCreate(['slug' => $row['slug']], $row);
        }
    }
}
