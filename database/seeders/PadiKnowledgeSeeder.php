<?php

namespace Database\Seeders;

use App\Models\Komoditas;
use App\Models\Rule;
use App\Support\KnowledgeSeederHelper;
use Illuminate\Database\Seeder;

class PadiKnowledgeSeeder extends Seeder
{
    public function run(): void
    {
        $komoditas = Komoditas::where('slug', 'padi')->firstOrFail();

        KnowledgeSeederHelper::seed(
            $komoditas,
            $this->gejala(),
            $this->penyakit(),
            $this->hama(),
            $this->rules()
        );
    }

    private function gejala(): array
    {
        return [
            ['GP01', 'Terdapat garis atau luka berair pada bagian tepi daun yang terlihat seperti basah'],
            ['GP02', 'Muncul bercak berwarna kuning yang lama-kelamaan berubah menjadi putih dan menyebar dari ujung atau tepi daun'],
            ['GP03', 'Daun menjadi kering, menggulung, dan akhirnya mati (gejala kresek)'],
            ['GP04', 'Pada pagi hari terlihat cairan seperti embun berwarna kekuningan pada permukaan daun'],
            ['GP05', 'Bibit padi di persemaian terlihat kering dan tidak tumbuh normal'],
            ['GP06', 'Terdapat bercak pada daun berbentuk seperti belah ketupat (ujung runcing di kedua sisi)'],
            ['GP07', 'Bagian tengah bercak berwarna abu-abu atau pucat, sedangkan pinggirnya berwarna coklat gelap'],
            ['GP08', 'Pangkal leher malai berubah warna menjadi kehitaman dan tampak busuk'],
            ['GP09', 'Leher malai mudah patah ketika disentuh'],
            ['GP10', 'Malai padi tidak berisi (hampa) atau gagal menghasilkan gabah'],
            ['GP11', 'Pertumbuhan tanaman padi terhambat sehingga terlihat lebih pendek dari tanaman normal'],
            ['GP12', 'Jumlah anakan (cabang padi) jauh lebih sedikit dari biasanya'],
            ['GP13', 'Warna daun berubah dari hijau menjadi kuning hingga oranye secara merata'],
            ['GP14', 'Ditemukan banyak serangga wereng hijau di sekitar tanaman'],
            ['GP15', 'Malai padi kecil, tidak keluar sempurna, atau tidak menghasilkan gabah'],
            ['GP16', 'Terdapat bercak berwarna coklat berbentuk bulat atau oval pada daun (tidak meruncing)'],
            ['GP17', 'Bercak tersebar secara acak di seluruh permukaan daun'],
            ['GP18', 'Pada bulir padi (gabah) terdapat bercak berwarna coklat tua atau hitam'],
            ['GP19', 'Terdapat bercak berwarna kehitaman pada bagian luar pelepah daun'],
            ['GP20', 'Bercak biasanya muncul di bagian bawah batang dekat permukaan air'],
            ['GP21', 'Batang menjadi lunak, membusuk, dan mudah hancur jika ditekan'],
            ['GP22', 'Tanaman padi roboh atau rebah karena pangkal batang rusak'],
            ['GP23', 'Tanaman padi tumbuh kerdil tetapi warna daun tetap hijau'],
            ['GP24', 'Tepi daun tampak bergerigi atau seperti sobek-sobek pada fase muda'],
            ['GP25', 'Daun bagian atas (daun bendera) melintir, bentuknya tidak normal, dan lebih pendek'],
            ['GP26', 'Daun yang rusak terlihat menguning kecoklatan (klorotik)'],
            ['GP27', 'Muncul garis-garis sempit memanjang berwarna hijau gelap di antara tulang daun'],
            ['GP28', 'Garis tersebut membesar dan berubah warna menjadi coklat transparen'],
            ['GP29', 'Pada serangan berat, seluruh area sawah terlihat berwarna kuning hingga oranye'],
            ['GP30', 'Pucuk tanaman atau anakan muda mati dan mudah dicabut dari batang (disebut sundep)'],
            ['GP31', 'Pada fase berbuah, malai padi berwarna putih, kosong, dan berdiri tegak (disebut beluk)'],
            ['GP32', 'Terdapat lubang kecil pada batang akibat gerekan hama'],
            ['GP33', 'Jika batang dibelah, ditemukan ulat atau larva di dalamnya'],
            ['GP34', 'Tanaman berubah warna menjadi kuning dengan cepat'],
            ['GP35', 'Tanaman mengering seperti terbakar (hopperburn)'],
            ['GP36', 'Kerusakan terlihat mengumpul di satu titik lalu menyebar'],
            ['GP37', 'Terdapat banyak serangga kecil berwarna coklat di bagian pangkal batang'],
            ['GP38', 'Bulir padi tidak terisi penuh (hampa atau setengah isi)'],
            ['GP39', 'Ujung beras berubah warna menjadi coklat atau kehitaman'],
            ['GP40', 'Beras menjadi rapuh dan mudah hancur'],
            ['GP41', 'Tercium bau menyengat khas di area persawahan'],
            ['GP42', 'Terdapat bercak coklat kemerahan di sekitar bekas tusukan/hisapan pada daun atau batang'],
            ['GP43', 'Daun menjadi kering dan menggulung memanjang'],
            ['GP44', 'Ditemukan serangga berwarna hitam kecoklatan dengan bau menyengat di pangkal batang dekat air'],
            ['GP45', 'Daun tanaman habis dimakan mulai dari bagian tepi'],
            ['GP46', 'Pada serangan berat, daun tinggal tulang saja'],
            ['GP47', 'Malai padi terpotong di bagian leher (bukan karena busuk)'],
            ['GP48', 'Kerusakan terjadi sangat cepat, biasanya pada malam hari'],
            ['GP49', 'Tanaman muda tiba-tiba mati tanpa gejala awal yang jelas'],
            ['GP50', 'Pangkal batang di dalam tanah terpotong atau rusak'],
            ['GP51', 'Muncul area kosong (tanpa tanaman) di beberapa bagian sawah, terutama yang tidak tergenang air merata'],
            ['GP52', 'Bibit padi hilang secara tidak beraturan di petak sawah'],
            ['GP53', 'Terlihat potongan batang dan daun mengambang di permukaan air'],
            ['GP54', 'Ditemukan telur berwarna merah muda cerah menempel pada batang atau pematang'],
        ];
    }

    private function penyakit(): array
    {
        $img = fn (int $n) => KnowledgeSeederHelper::targetImage('penyakit-p', $n);

        return [
            ['kode_penyakit' => 'PADI-P01', 'nama_penyakit' => 'Hawar Daun Bakteri (Kresek)', 'deskripsi' => 'Penyakit bakteri Xanthomonas oryzae.', 'solusi' => "Cara Kimia: Penyakit ini disebabkan bakteri, bukan jamur. Gunakan bakterisida Streptomisin sulfat (contoh: Agrept) dosis 1–2 gram/liter air, atau bakterisida berbahan aktif Tembaga Oksida seperti Nordox.\n\nCara Hayati: Sebelum terjadi serangan pengendalian dapat menggunakan agens hayati seperti Trichoderma sp.\n\nAlternatif/Saran Praktis: Hentikan pemakaian pupuk Urea sama sekali saat serangan terjadi. Terapkan pengairan berselang (intermiten), genangi lahan beberapa hari, lalu keringkan beberapa hari secara bergantian.", 'gambar' => $img(1)],
            ['kode_penyakit' => 'PADI-P02', 'nama_penyakit' => 'Blas (Rice Blast)', 'deskripsi' => 'Penyakit jamur Pyricularia oryzae.', 'solusi' => "Cara Kimia: Segera semprotkan fungisida jika melihat bercak belah ketupat di daun. Bahan aktif yang dapat digunakan diantaranya Trisiklazol, Tembaga oksida, atau Metil Tiofanat. Semprot dua kali (saat bunting dan saat malai mulai keluar) untuk mencegah blas leher/patah leher.\n\nCara Hayati: Sebelum terjadi serangan pengendalian dapat menggunakan agens hayati seperti Trichoderma sp.\n\nAlternatif/Saran Praktis: Jaga keseimbangan pemupukan. Tanaman yang diberi urea berlebih akan empuk dan manis, sangat disukai jamur blas. Gunakan benih bersertifikat tahan blas.", 'gambar' => $img(2)],
            ['kode_penyakit' => 'PADI-P03', 'nama_penyakit' => 'Tungro', 'deskripsi' => 'Penyakit virus ditularkan wereng hijau.', 'solusi' => "Cara Kimia (Fokus Vektor): Sama seperti virus lainnya, obati sawah dari serangganya. Semprotkan insektisida untuk membasmi Wereng Hijau menggunakan BPMC atau Imidakloprid.\n\nAlternatif/Saran Praktis: Padi yang terlanjur kerdil dan berwarna oranye harus dicabut dan dibenamkan ke lumpur dalam-dalam. Atur waktu tanam agar tidak bertepatan dengan puncak populasi wereng hijau di daerah Anda.", 'gambar' => $img(3)],
            ['kode_penyakit' => 'PADI-P04', 'nama_penyakit' => 'Bercak Coklat (Brown Spot)', 'deskripsi' => 'Penyakit jamur Helminthosporium oryzae.', 'solusi' => "Cara Kimia: Semprot Difenokonazol (contoh: Score) 1,5 ml/liter air.\n\nAlternatif/Saran Praktis: Penyakit ini adalah \"penyakit kekurangan gizi\". Muncul pada tanah sawah yang kurus atau keracunan belerang/besi. Perbaiki kesuburan tanah dengan pupuk organik/kompos, perbaiki tata air, dan tambah pupuk makro berimbang (NPK).", 'gambar' => $img(4)],
            ['kode_penyakit' => 'PADI-P05', 'nama_penyakit' => 'Busuk Batang (Stem Rot)', 'deskripsi' => 'Penyakit jamur Sclerotium oryzae.', 'solusi' => "Cara Kimia: Semprotkan Heksakonazol (contoh: Anvil) 1–2 ml/liter air pada pangkal batang (di atas batas air).\n\nAlternatif/Saran Praktis: Buang jerami yang sakit setelah panen, jangan ditumpuk dan dijadikan pupuk kembali di lahan yang sama. Keringkan sawah sejenak jika penyakit mulai muncul agar pangkal batang tidak selalu lembap.", 'gambar' => $img(5)],
            ['kode_penyakit' => 'PADI-P06', 'nama_penyakit' => 'Kerdil Hampa (Ragged Stunt)', 'deskripsi' => 'Penyakit virus RRSV.', 'solusi' => "Cara Kimia (Fokus Vektor): Basmi Wereng Cokelat sebagai penular utamanya dengan insektisida sistemik seperti Pimetrozin.\n\nAlternatif/Saran Praktis: Cabut bibit yang berdaun melintir dan bergerigi sejak masa persemaian hingga vegetatif. Gunakan jaring pencegah hama di atas lahan persemaian untuk melindungi bibit muda dari gigitan wereng cokelat penular virus.", 'gambar' => $img(6)],
            ['kode_penyakit' => 'PADI-P07', 'nama_penyakit' => 'Bakteri Daun Bergaris', 'deskripsi' => 'Penyakit bakteri daun bergaris.', 'solusi' => "Cara Kimia: Gunakan bakterisida Streptomisin sulfat (contoh: Agrept) 1-2 gram/liter.\n\nAlternatif/Saran Praktis: Jangan menabur pupuk atau masuk menyemprot sawah di pagi buta ketika embun masih menempel parah di daun. Gesekan antar daun padi dan tubuh petani saat embun basah akan membuka pori-pori daun dan mempercepat penularan bakteri.", 'gambar' => $img(7)],
        ];
    }

    private function hama(): array
    {
        $img = fn (int $n) => KnowledgeSeederHelper::targetImage('hama-h', $n);

        return [
            ['kode_hama' => 'PADI-H01', 'nama_hama' => 'Penggerek Batang (Sundep/Beluk)', 'deskripsi' => 'Ulat penggerek batang padi yang menyebabkan sundep dan beluk.', 'solusi' => "Cara Kimia: Aplikasikan pestisida pada pagi atau sore hari. Pestisida yang dapat digunakan antara lain pestisida berbahan aktif Klorantraniliprol, Plinazolin, Fipronil, dan Dimehipo.\n\nCara Hayati: Sebelum terjadi serangan pengendalian dapat menggunakan agens hayati seperti Bacillus thuringiensis dan Beauveria bassiana.\n\nAlternatif/Saran Praktis: Saat memanen padi sebelumnya, potong jerami serendah mungkin (mepet tanah) agar ngengat tidak punya tempat bertelur. Kumpulkan dan hancurkan kelompok telur ngengat di persemaian sebelum bibit pindah tanam.", 'gambar' => $img(1)],
            ['kode_hama' => 'PADI-H02', 'nama_hama' => 'Wereng Batang Cokelat', 'deskripsi' => 'Nilaparvata lugens.', 'solusi' => "Cara Kimia: Gunakan bahan aktif spesifik wereng seperti Pimetrozin, BPMC, Nitenpyram, Dinotefuran, atau Flonicamid. Penting: Buka tajuk tanaman, arahkan semprotan ke pangkal batang (dekat air), bukan ke daun.\n\nCara Hayati: Sebelum ambang batas pengendalian dapat menggunakan agens hayati seperti Bacillus thuringiensis dan Beauveria bassiana.\n\nAlternatif/Saran Praktis: Gunakan jarak tanam Jajar Legowo (2:1 atau 4:1) agar sinar matahari masuk ke sela-sela pangkal batang. Wereng cokelat tidak suka tempat yang terang dan berangin.", 'gambar' => $img(2)],
            ['kode_hama' => 'PADI-H03', 'nama_hama' => 'Walang Sangit', 'deskripsi' => 'Hama Leptocorisa pada bulir padi.', 'solusi' => "Cara Kimia: Semprotkan BPMC (contoh: Bassa) atau Metomil dosis 2 ml/liter air. Lakukan pada pagi buta atau sore hari menjelang magrib saat walang sangit naik ke bulir padi.\n\nCara Hayati: Sebelum ambang batas pengendalian dapat menggunakan agens hayati seperti Bacillus thuringiensis dan Beauveria bassiana.\n\nAlternatif/Saran Praktis: Pasang umpan berbau menyengat seperti bangkai keong mas yang digeprek, terasi, atau ikan busuk yang diikat pada lidi bambu di beberapa titik sawah. Walang sangit akan berkumpul di sana sehingga mudah dibasmi.", 'gambar' => $img(3)],
            ['kode_hama' => 'PADI-H04', 'nama_hama' => 'Kepinding Tanah (Black Bug)', 'deskripsi' => 'Hama hitam kecoklatan di pangkal batang.', 'solusi' => "Cara Kimia: Gunakan Karbaril (contoh: Sevin) 2 gram/liter air, semprotkan pada area pangkal batang dekat permukaan tanah.\n\nAlternatif/Saran Praktis: Keringkan air sawah selama beberapa hari sampai tanah sedikit retak. Kepinding tanah tidak menyukai kondisi kering dan akan pergi mencari lahan lain yang tergenang.", 'gambar' => $img(4)],
            ['kode_hama' => 'PADI-H05', 'nama_hama' => 'Ulat Grayak / Tentara', 'deskripsi' => 'Ulat pemakan daun dan malai.', 'solusi' => "Cara Kimia: Semprot Klorpirifos (contoh: Dursban) 2 ml/liter air. Wajib disemprot malam hari karena ulat ini bersembunyi di dalam tanah berair pada siang hari dan naik merusak daun pada malam hari.\n\nAlternatif/Saran Praktis: Jika saluran irigasi memadai, genangi sawah dengan air setinggi mungkin secara tiba-tiba untuk menenggelamkan ulat yang bersembunyi di pangkal tanaman.", 'gambar' => $img(5)],
            ['kode_hama' => 'PADI-H06', 'nama_hama' => 'Orong-orong', 'deskripsi' => 'Hama Gryllotalpa sp. yang memotong pangkal batang tanaman padi.', 'solusi' => "Cara Kimia: Taburkan Karbofuran 3% secukupnya saat persiapan lahan.\n\nAlternatif/Saran Praktis: Ratakan bedengan sawah sebaik mungkin. Orong-orong menyukai gundukan tanah sawah yang tidak rata dan tidak tergenang air. Penggenangan air merata akan menekan populasi hama ini.", 'gambar' => $img(6)],
            ['kode_hama' => 'PADI-H07', 'nama_hama' => 'Keong Mas', 'deskripsi' => 'Keong Pomacea pemakan bibit.', 'solusi' => "Cara Kimia: Semprot/tabur racun keong (Moluskisida) berbahan Fentin asetat (contoh: Brestan) dosis 1–2 gram/liter air.\n\nAlternatif/Saran Praktis: Buat parit kecil keliling di dalam petak sawah. Saat air dikeringkan, keong akan mengumpul di parit tersebut dan mudah diambil. Tancapkan ajir bambu, keong akan naik bertelur di sana, lalu ambil dan hancurkan telur berwarna pink cerah.", 'gambar' => $img(7)],
        ];
    }

    private function rules(): array
    {
        return [
            ['jenis' => Rule::JENIS_PENYAKIT, 'target_code' => 'PADI-P01', 'gejala' => [['GP01', 0.5], ['GP02', 0.8], ['GP03', 0.4], ['GP04', 0.3], ['GP05', 0.4]]],
            ['jenis' => Rule::JENIS_PENYAKIT, 'target_code' => 'PADI-P02', 'gejala' => [['GP06', 0.9], ['GP07', 0.6], ['GP08', 0.8], ['GP09', 0.5], ['GP10', 0.8]]],
            ['jenis' => Rule::JENIS_PENYAKIT, 'target_code' => 'PADI-P03', 'gejala' => [['GP11', 0.8], ['GP12', 0.2], ['GP13', 0.4], ['GP14', 0.8], ['GP15', 0.4]]],
            ['jenis' => Rule::JENIS_PENYAKIT, 'target_code' => 'PADI-P04', 'gejala' => [['GP16', 0.8], ['GP17', 0.4], ['GP18', 0.4]]],
            ['jenis' => Rule::JENIS_PENYAKIT, 'target_code' => 'PADI-P05', 'gejala' => [['GP19', 0.7], ['GP20', 0.6], ['GP21', 0.8], ['GP22', 0.4]]],
            ['jenis' => Rule::JENIS_PENYAKIT, 'target_code' => 'PADI-P06', 'gejala' => [['GP23', 0.8], ['GP24', 0.5], ['GP25', 0.7], ['GP26', 0.4]]],
            ['jenis' => Rule::JENIS_PENYAKIT, 'target_code' => 'PADI-P07', 'gejala' => [['GP27', 0.8], ['GP28', 0.6], ['GP29', 0.4]]],
            ['jenis' => Rule::JENIS_HAMA, 'target_code' => 'PADI-H01', 'gejala' => [['GP30', 0.9], ['GP31', 0.9], ['GP32', 0.7], ['GP33', 0.8]]],
            ['jenis' => Rule::JENIS_HAMA, 'target_code' => 'PADI-H02', 'gejala' => [['GP34', 0.8], ['GP35', 0.8], ['GP36', 0.6], ['GP37', 0.7]]],
            ['jenis' => Rule::JENIS_HAMA, 'target_code' => 'PADI-H03', 'gejala' => [['GP38', 0.8], ['GP39', 0.5], ['GP40', 0.4], ['GP41', 0.7]]],
            ['jenis' => Rule::JENIS_HAMA, 'target_code' => 'PADI-H04', 'gejala' => [['GP42', 0.7], ['GP43', 0.5], ['GP44', 0.8]]],
            ['jenis' => Rule::JENIS_HAMA, 'target_code' => 'PADI-H05', 'gejala' => [['GP45', 0.8], ['GP46', 0.5], ['GP47', 0.5], ['GP48', 0.6]]],
            ['jenis' => Rule::JENIS_HAMA, 'target_code' => 'PADI-H06', 'gejala' => [['GP49', 0.6], ['GP50', 0.8], ['GP51', 0.7]]],
            ['jenis' => Rule::JENIS_HAMA, 'target_code' => 'PADI-H07', 'gejala' => [['GP52', 0.7], ['GP53', 0.6], ['GP54', 0.9]]],
        ];
    }
}
