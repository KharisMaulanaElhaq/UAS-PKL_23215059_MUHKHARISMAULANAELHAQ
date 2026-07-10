<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::table('komoditas')->count() === 0) {
            DB::table('komoditas')->insert([
                [
                    'kode' => 'PADI',
                    'nama' => 'Padi',
                    'slug' => 'padi',
                    'deskripsi' => 'Deteksi penyakit dan hama pada tanaman padi.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'kode' => 'JAGUNG',
                    'nama' => 'Jagung',
                    'slug' => 'jagung',
                    'deskripsi' => 'Deteksi penyakit dan hama pada tanaman jagung.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'kode' => 'BAWANG',
                    'nama' => 'Bawang Merah',
                    'slug' => 'bawang',
                    'deskripsi' => 'Deteksi penyakit dan hama pada tanaman bawang merah.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        $padiId = DB::table('komoditas')->where('slug', 'padi')->value('id');

        Schema::table('gejala', function (Blueprint $table) {
            $table->dropUnique(['kode_gejala']);
            $table->foreignId('komoditas_id')->nullable()->after('id')->constrained('komoditas')->cascadeOnDelete();
        });

        Schema::table('penyakit', function (Blueprint $table) {
            $table->dropUnique(['kode_penyakit']);
            $table->foreignId('komoditas_id')->nullable()->after('id')->constrained('komoditas')->cascadeOnDelete();
        });

        Schema::table('hama', function (Blueprint $table) {
            $table->dropUnique(['kode_hama']);
            $table->foreignId('komoditas_id')->nullable()->after('id')->constrained('komoditas')->cascadeOnDelete();
        });

        if ($padiId) {
            DB::table('gejala')->whereNull('komoditas_id')->update(['komoditas_id' => $padiId]);
            DB::table('penyakit')->whereNull('komoditas_id')->update(['komoditas_id' => $padiId]);
            DB::table('hama')->whereNull('komoditas_id')->update(['komoditas_id' => $padiId]);
        }

        Schema::table('gejala', function (Blueprint $table) {
            DB::statement('ALTER TABLE gejala MODIFY komoditas_id BIGINT UNSIGNED NOT NULL');
            $table->unique(['komoditas_id', 'kode_gejala']);
        });

        Schema::table('penyakit', function (Blueprint $table) {
            DB::statement('ALTER TABLE penyakit MODIFY komoditas_id BIGINT UNSIGNED NOT NULL');
            $table->unique(['komoditas_id', 'kode_penyakit']);
        });

        Schema::table('hama', function (Blueprint $table) {
            DB::statement('ALTER TABLE hama MODIFY komoditas_id BIGINT UNSIGNED NOT NULL');
            $table->unique(['komoditas_id', 'kode_hama']);
        });

        Schema::table('riwayat_deteksi', function (Blueprint $table) {
            $table->foreignId('komoditas_id')->nullable()->after('id')->constrained('komoditas')->nullOnDelete();
            $table->string('nama_komoditas')->nullable()->after('komoditas_id');
            $table->index('komoditas_id');
        });

        if ($padiId) {
            DB::table('riwayat_deteksi')->whereNull('komoditas_id')->update([
                'komoditas_id' => $padiId,
                'nama_komoditas' => 'Padi',
            ]);
        }
    }

    public function down(): void
    {
        Schema::table('riwayat_deteksi', function (Blueprint $table) {
            $table->dropForeign(['komoditas_id']);
            $table->dropColumn(['komoditas_id', 'nama_komoditas']);
        });

        Schema::table('hama', function (Blueprint $table) {
            $table->dropUnique(['komoditas_id', 'kode_hama']);
            $table->dropForeign(['komoditas_id']);
            $table->dropColumn('komoditas_id');
            $table->unique('kode_hama');
        });

        Schema::table('penyakit', function (Blueprint $table) {
            $table->dropUnique(['komoditas_id', 'kode_penyakit']);
            $table->dropForeign(['komoditas_id']);
            $table->dropColumn('komoditas_id');
            $table->unique('kode_penyakit');
        });

        Schema::table('gejala', function (Blueprint $table) {
            $table->dropUnique(['komoditas_id', 'kode_gejala']);
            $table->dropForeign(['komoditas_id']);
            $table->dropColumn('komoditas_id');
            $table->unique('kode_gejala');
        });
    }
};
