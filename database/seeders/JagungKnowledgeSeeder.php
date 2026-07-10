<?php

namespace Database\Seeders;

use App\Models\Komoditas;
use App\Models\Rule;
use App\Support\KnowledgeSeederHelper;
use Illuminate\Database\Seeder;

class JagungKnowledgeSeeder extends Seeder
{
    public function run(): void
    {
        $komoditas = Komoditas::where('slug', 'jagung')->firstOrFail();

        KnowledgeSeederHelper::seed(
            $komoditas,
            $this->gejala(),
            $this->penyakit(),
            $this->hama(),
            $this->rules(),
        );
    }

    private function gejala(): array
    {
        return [
            // P01 Bulai
            ['GJ01', 'Daun muda mengalami perubahan warna menjadi kuning pucat memanjang sejajar tulang daun'],
            ['GJ02', 'Permukaan daun terdapat lapisan putih seperti tepung terutama pagi hari'],
            ['GJ03', 'Pertumbuhan tanaman terhambat dan tanaman tampak kerdil'],
            ['GJ04', 'Daun menggulung dan terpuntir'],
            ['GJ05', 'Tongkol jagung tidak terbentuk secara normal'],
            // P02 Hawar Daun
            ['GJ06', 'Muncul bercak kecil oval seperti basah pada daun'],
            ['GJ07', 'Bercak berkembang menjadi memanjang berbentuk elips'],
            ['GJ08', 'Daun berubah warna menjadi coklat keabu-abuan seperti terbakar'],
            ['GJ09', 'Daun bagian bawah lebih dulu terserang'],
            ['GJ10', 'Tanaman cepat mengering pada serangan berat'],
            // P03 Karat Daun
            ['GJ11', 'Muncul titik-titik kecil berwarna coklat seperti karat pada daun tua'],
            ['GJ12', 'Terdapat serbuk berwarna kuning kecoklatan pada permukaan daun'],
            ['GJ13', 'Bercak menyebar hingga seludang daun'],
            ['GJ14', 'Daun menjadi kering pada fase lanjut'],
            // P04 Bercak Daun
            ['GJ15', 'Muncul bercak hijau kekuningan pada daun'],
            ['GJ16', 'Bercak berubah menjadi coklat kemerahan memanjang'],
            ['GJ17', 'Bercak awal terlihat basah kemudian mengering'],
            ['GJ18', 'Daun mengalami kerusakan luas pada serangan berat'],
            // P05 Virus Mosaik Kerdil
            ['GJ19', 'Daun tampak mosaik hijau kekuningan'],
            ['GJ20', 'Tanaman tumbuh kerdil'],
            ['GJ21', 'Warna daun tampak belang kuning hijau'],
            ['GJ22', 'Tidak ditemukan serbuk putih seperti penyakit bulai'],
            // H01 Ulat Grayak
            ['GJ23', 'Daun berlubang tidak beraturan'],
            ['GJ24', 'Terdapat serbuk seperti serbuk gergaji di pucuk daun'],
            ['GJ25', 'Larva atau ulat ditemukan pada tanaman'],
            ['GJ26', 'Titik tumbuh tanaman rusak'],
            ['GJ27', 'Daun muda habis dimakan ulat'],
            // H02 Penggerek Batang
            ['GJ28', 'Terdapat lubang gerekan pada batang jagung'],
            ['GJ29', 'Batang mudah patah akibat gerekan larva'],
            ['GJ30', 'Bunga jantan rusak atau patah'],
            ['GJ31', 'Tongkol mengalami kerusakan'],
            // H03 Penggerek Tongkol
            ['GJ32', 'Rambut tongkol jagung terpotong'],
            ['GJ33', 'Ujung tongkol terdapat bekas gerekan'],
            ['GJ34', 'Ditemukan larva di dalam tongkol'],
            ['GJ35', 'Tongkol jagung rusak dan membusuk'],
            // H04 Kutu Daun
            ['GJ36', 'Daun menggulung akibat cairan tanaman dihisap'],
            ['GJ37', 'Daun mengalami klorosis atau menguning'],
            ['GJ38', 'Permukaan daun tertutup embun jelaga hitam'],
            ['GJ39', 'Pertumbuhan tanaman terganggu'],
            ['GJ40', 'Koloni kutu terlihat pada daun dan batang'],
        ];
    }

    private function penyakit(): array
    {
        $img = fn (int $n) => KnowledgeSeederHelper::targetImage('jagung-p', $n);

        return [
            [
                'kode_penyakit' => 'JAGUNG-P01',
                'nama_penyakit' => 'Bulai',
                'deskripsi' => 'Penyakit jamur Peronosclerospora spp yang menyerang daun muda jagung. Ditandai daun kuning pucat memanjang dan lapisan putih seperti tepung.',
                'solusi' => "Cara Kimia: Penyakit ini sangat mematikan dan tidak bisa diobati setelah parah. Pencegahan wajib: campurkan benih jagung dengan fungisida Metalaksil (contoh: Ridomil) dosis 2–5 gram/kg benih sebelum ditanam. Untuk mencegah serangan meluas dapat menggunakan fungisida berbahan aktif Tembaga Oksida seperti Nordox.\n\nCara Hayati: Saat pengolahan lahan, campurkan pupuk kandang/kompos dengan agens pengendali hayati Trichoderma sp., dan aplikasikan di tanah secara langsung.\n\nAlternatif/Saran Praktis: Pilih varietas benih yang tahan bulai. Jika ada bibit jagung berumur 1-3 minggu yang daunnya kuning pucat sejajar, segera cabut paksa, bawa keluar sawah, dan timbun/bakar.",
                'gambar' => $img(1),
            ],
            [
                'kode_penyakit' => 'JAGUNG-P02',
                'nama_penyakit' => 'Hawar Daun',
                'deskripsi' => 'Penyakit jamur Helminthosporium sp dengan bercak oval memanjang elips hingga daun coklat keabu-abuan.',
                'solusi' => "Cara Kimia: Aplikasikan fungisida Mankozeb atau Propineb 2–3 gram/liter air saat muncul bercak memanjang mirip daun terbakar.\n\nCara Hayati: Sebelum terjadi serangan pengendalian dapat menggunakan agens hayati seperti Trichoderma sp.\n\nAlternatif/Saran Praktis: Perbanyak unsur hara Kalium (KCL) untuk mengeraskan dinding sel daun jagung. Singkirkan daun bagian bawah (daun tua) yang sudah rusak parah agar sirkulasi udara lebih baik.",
                'gambar' => $img(2),
            ],
            [
                'kode_penyakit' => 'JAGUNG-P03',
                'nama_penyakit' => 'Karat Daun',
                'deskripsi' => 'Penyakit jamur Puccinia polysora dengan bercak coklat karat dan serbuk kuning kecoklatan pada daun.',
                'solusi' => "Cara Kimia: Gunakan fungisida Tebuconazole (contoh: Folicur) dosis 1–2 ml/liter air.\n\nCara Hayati: Sebelum terjadi serangan pengendalian dapat menggunakan agens hayati seperti Trichoderma sp.\n\nAlternatif/Saran Praktis: Jangan menanam dengan jarak yang terlalu rapat (misal jarak ideal 70 x 20 cm). Lahan yang terlalu rimbun sangat disukai jamur karat daun.",
                'gambar' => $img(3),
            ],
            [
                'kode_penyakit' => 'JAGUNG-P04',
                'nama_penyakit' => 'Bercak Daun',
                'deskripsi' => 'Penyakit jamur Bipolaris maydis dengan bercak hijau kekuningan menjadi coklat kemerahan memanjang.',
                'solusi' => "Cara Kimia: Semprotkan Azoksistrobin dosis 1–2 ml/liter air.\n\nAlternatif/Saran Praktis: Lakukan pergiliran/rotasi tanaman dengan kacang-kacangan (kedelai, kacang hijau) untuk memutus siklus jamur yang tertinggal di tanah paska panen.",
                'gambar' => $img(4),
            ],
            [
                'kode_penyakit' => 'JAGUNG-P05',
                'nama_penyakit' => 'Virus Mosaik Kerdil',
                'deskripsi' => 'Penyakit virus Maize Dwarf Mosaic Virus (MDMV) dengan gejala mosaik kuning-hijau dan tanaman kerdil.',
                'solusi' => "Cara Kimia (Fokus Vektor): Virus tidak mempan racun kimia. Segera semprotkan Imidakloprid untuk membunuh serangga (kutu) yang merupakan vektor atau pembawa yang dapat menularkan virus dari satu jagung ke jagung lain.\n\nAlternatif/Saran Praktis: Cabut dan musnahkan tanaman jagung yang belang-belang kerdil. Jangan biarkan sisa tanaman ini menjadi sumber penularan. Bakar atau musnahkan sisa serangan tersebut.",
                'gambar' => $img(5),
            ],
        ];
    }

    private function hama(): array
    {
        $img = fn (int $n) => KnowledgeSeederHelper::targetImage('jagung-h', $n);

        return [
            [
                'kode_hama' => 'JAGUNG-H01',
                'nama_hama' => 'Ulat Grayak',
                'deskripsi' => 'Hama ulat Spodoptera frugiperda pemakan daun muda dan pucuk tanaman jagung.',
                'solusi' => "Cara Kimia: Aplikasikan pestisida pada pagi atau sore hari. Pestisida yang dapat digunakan antara lain pestisida berbahan aktif Emamektin benzoate, klorantraniliprol dan Klorpirifos. Fokuskan penyemprotan ke arah pucuk daun tempat ulat biasa makan.\n\nCara Hayati: Sebelum ambang batas pengendalian dapat menggunakan agens hayati seperti Bacillus thuringiensis dan Beauveria bassiana. Semprotkan secara merata ke seluruh permukaan daun.\n\nAlternatif/Saran Praktis: Taburkan sedikit abu sabut kelapa atau pasir bersih langsung ke dalam corong/pucuk daun jagung. Tekstur kasar ini membuat ulat tidak nyaman bersembunyi di sana.",
                'gambar' => $img(1),
            ],
            [
                'kode_hama' => 'JAGUNG-H02',
                'nama_hama' => 'Penggerek Batang',
                'deskripsi' => 'Hama ulat Ostrinia furnacalis yang menggerek batang jagung sehingga batang patah dan tongkol rusak.',
                'solusi' => "Cara Kimia: Taburkan sejumput kecil butiran Karbofuran (Furadan) langsung ke lubang pucuk jagung tempat daun muda tumbuh.\n\nCara Hayati: Sebelum terjadi serangan pengendalian dapat menggunakan agens hayati seperti Bacillus thuringiensis dan Beauveria bassiana.\n\nAlternatif/Saran Praktis: Terapkan penanaman serempak dalam satu kawasan luas (selisih waktu tanam antar petak maksimal 2 minggu) agar siklus hidup ngengat penggerek terputus.",
                'gambar' => $img(2),
            ],
            [
                'kode_hama' => 'JAGUNG-H03',
                'nama_hama' => 'Penggerek Tongkol',
                'deskripsi' => 'Hama ulat Helicoverpa armigera yang menyerang tongkol jagung dan merusak biji.',
                'solusi' => "Cara Kimia: Semprotkan Klorantraniliprol dosis 2 ml/liter air tepat ketika jagung mulai mengeluarkan rambut.\n\nCara Hayati: Sebelum terjadi serangan pengendalian dapat menggunakan agens hayati seperti Bacillus thuringiensis dan Beauveria bassiana.\n\nAlternatif/Saran Praktis: Amati secara manual. Saat rambut jagung mulai kecoklatan, raba ujung tongkolnya. Jika terasa lunak berongga atau ada serbuk bekas gerekan, buka sedikit ujungnya dan buang ulatnya secara manual.",
                'gambar' => $img(3),
            ],
            [
                'kode_hama' => 'JAGUNG-H04',
                'nama_hama' => 'Kutu Daun',
                'deskripsi' => 'Hama Aphis maydis pengisap cairan daun jagung, menyebabkan klorosis dan embun jelaga.',
                'solusi' => "Cara Kimia: Semprotkan Imidakloprid dosis 1 ml/liter air jika populasi kutu daun dan semut sudah menutupi pelepah atau daun.\n\nAlternatif/Saran Praktis: Hindari pemberian pupuk Nitrogen (seperti Urea) secara berlebihan. Tanaman yang terlalu subur dan hijau pekat sangat disukai kutu daun.",
                'gambar' => $img(4),
            ],
        ];
    }

    private function rules(): array
    {
        return [
            ['jenis' => Rule::JENIS_PENYAKIT, 'target_code' => 'JAGUNG-P01', 'gejala' => [['GJ01', 1.0], ['GJ02', 0.4], ['GJ03', 0.6], ['GJ04', 0.5], ['GJ05', 0.2]]],
            ['jenis' => Rule::JENIS_PENYAKIT, 'target_code' => 'JAGUNG-P02', 'gejala' => [['GJ06', 0.5], ['GJ07', 0.8], ['GJ08', 0.8], ['GJ09', 0.4], ['GJ10', 0.4]]],
            ['jenis' => Rule::JENIS_PENYAKIT, 'target_code' => 'JAGUNG-P03', 'gejala' => [['GJ11', 0.8], ['GJ12', 0.5], ['GJ13', 0.4], ['GJ14', 0.6]]],
            ['jenis' => Rule::JENIS_PENYAKIT, 'target_code' => 'JAGUNG-P04', 'gejala' => [['GJ15', 0.4], ['GJ16', 0.8], ['GJ17', 0.4], ['GJ18', 0.5]]],
            ['jenis' => Rule::JENIS_PENYAKIT, 'target_code' => 'JAGUNG-P05', 'gejala' => [['GJ19', 0.8], ['GJ20', 0.7], ['GJ21', 0.5], ['GJ22', 0.5]]],
            ['jenis' => Rule::JENIS_HAMA, 'target_code' => 'JAGUNG-H01', 'gejala' => [['GJ23', 0.8], ['GJ24', 0.5], ['GJ25', 1.0], ['GJ26', 0.4], ['GJ27', 0.6]]],
            ['jenis' => Rule::JENIS_HAMA, 'target_code' => 'JAGUNG-H02', 'gejala' => [['GJ28', 0.9], ['GJ29', 0.8], ['GJ30', 0.5], ['GJ31', 0.4]]],
            ['jenis' => Rule::JENIS_HAMA, 'target_code' => 'JAGUNG-H03', 'gejala' => [['GJ32', 0.6], ['GJ33', 0.8], ['GJ34', 0.9], ['GJ35', 0.4]]],
            ['jenis' => Rule::JENIS_HAMA, 'target_code' => 'JAGUNG-H04', 'gejala' => [['GJ36', 0.8], ['GJ37', 0.5], ['GJ38', 0.6], ['GJ39', 0.3], ['GJ40', 0.8]]],
        ];
    }
}
