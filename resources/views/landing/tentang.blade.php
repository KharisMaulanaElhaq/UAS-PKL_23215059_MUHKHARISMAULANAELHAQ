@extends('layouts.landing')

@section('title', 'Tentang')

@section('content')
    <section class="about-hero lp-photo-soft">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5 animate-on-scroll">
                    <span class="section-tag"><i class="ti ti-info-circle me-1"></i> Tentang Kami</span>
                    <h1 class="section-title"><i class="ti ti-leaf me-2 text-warning"></i>SIPATAN</h1>
                    <p class="text-muted mb-2" style="font-size:0.95rem">
                        <strong>Sistem Pakar Hama dan Penyakit Tanaman</strong>
                    </p>
                    <p class="text-muted lead" style="font-size:1.05rem">
                        Aplikasi berbasis web untuk mendiagnosis penyakit dan hama pada
                        <strong>tanaman jagung</strong> menggunakan metode
                        <strong>backward chaining</strong> dan <strong>Certainty Factor (CF)</strong>.
                    </p>
                    <p class="text-muted">
                        Dikembangkan oleh <strong>DPKP Kabupaten Brebes</strong> untuk membantu petani,
                        mahasiswa, dan penyuluh pertanian mengidentifikasi masalah tanaman secara cepat
                        dan akurat — tanpa harus menunggu konsultasi langsung dengan pakar.
                    </p>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <span class="badge rounded-pill bg-warning-subtle text-warning px-3 py-2">
                            <i class="ti ti-plant me-1"></i> Komoditas Jagung
                        </span>
                        <span class="badge rounded-pill bg-warning-subtle text-warning px-3 py-2">
                            <i class="ti ti-brain me-1"></i> Certainty Factor
                        </span>
                        <span class="badge rounded-pill bg-warning-subtle text-warning px-3 py-2">
                            <i class="ti ti-binary-tree me-1"></i> Backward Chaining
                        </span>
                    </div>
                </div>
                <div class="col-lg-6 animate-on-scroll">
                    <div class="about-card d-flex flex-column align-items-center justify-content-center text-center" style="padding: 2rem 2.5rem;">
                        <x-brand-logos size="lg" class="mb-4 justify-content-center" />
                        <div class="d-flex justify-content-center w-100" style="max-width: 280px;">
                            @foreach ($komoditasList as $item)
                                <div class="about-komoditas-thumb">
                                    <img src="{{ $item->gambar_url }}" alt="{{ $item->nama }}" class="img-fluid rounded-3" style="height: 180px; width: 100%; object-fit: cover;">
                                    <span class="about-komoditas-label">{{ $item->nama }}</span>
                                </div>
                            @endforeach
                        </div>
                        <p class="text-muted small mb-0 mt-3">
                            {{ $stats['penyakit'] }} penyakit · {{ $stats['hama'] }} hama · {{ $stats['gejala'] }} gejala terdata
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="background: linear-gradient(180deg, #FFFBEB 0%, rgba(255,251,235,0.4) 60%, #FFFFFF 100%); padding: 5rem 0;">
        <div class="container py-4">
            <div class="text-center mb-5">
                <span class="section-tag"><i class="ti ti-plant me-1"></i> RUANG LINGKUP</span>
                <h2 class="section-title">Fokus Objek Sistem Pakar</h2>
                <p class="text-muted mx-auto" style="max-width:620px">
                    Sistem ini dikembangkan secara spesifik untuk mendiagnosis anomali pada tanaman jagung berdasarkan basis pengetahuan gejala, bobot CF, penyakit, dan hama secara akurat.
                </p>
            </div>
            <div class="row g-4 align-items-stretch">
                {{-- Kolom Kiri: Card Jagung --}}
                <div class="col-lg-6">
                    @foreach ($komoditasList as $item)
                        <div class="about-card animate-on-scroll h-100 d-flex flex-column">
                            <img src="{{ $item->gambar_url }}" alt="{{ $item->nama }}" class="img-fluid rounded-3 mb-3" style="height:220px;width:100%;object-fit:cover">
                            <span class="komoditas-code">{{ $item->kode }}</span>
                            <h5 class="fw-bold mt-2 mb-2">{{ $item->nama }}</h5>
                            <p class="text-muted small mb-0">{{ $item->deskripsi }}</p>
                        </div>
                    @endforeach
                </div>

                {{-- Kolom Kanan: 3 Mini-Card Informasi Data --}}
                <div class="col-lg-6 d-flex flex-column gap-3">
                    <div class="about-card animate-on-scroll d-flex align-items-start gap-3" style="border-left: 3px solid #f59e0b;">
                        <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-3" style="width:48px;height:48px;background:rgba(245,158,11,0.12);">
                            <i class="ti ti-virus" style="font-size:1.4rem;color:#d97706;"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1" style="color:#92400e;">5+ Jenis Penyakit</h6>
                            <p class="text-muted small mb-0">Mendiagnosis berbagai penyakit utama tanaman jagung seperti Bulai, Bercak Daun, Karat Daun, Hawar Daun, dan Virus Mozaik Kerdil.</p>
                        </div>
                    </div>

                    <div class="about-card animate-on-scroll d-flex align-items-start gap-3" style="border-left: 3px solid #f59e0b;">
                        <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-3" style="width:48px;height:48px;background:rgba(245,158,11,0.12);">
                            <i class="ti ti-bug" style="font-size:1.4rem;color:#d97706;"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1" style="color:#92400e;">4+ Jenis Hama</h6>
                            <p class="text-muted small mb-0">Mengidentifikasi serangan hama perusak komoditas jagung termasuk Ulat Grayak, Penggerek Batang, Penggerek Tongkol, dan Kutu Daun.</p>
                        </div>
                    </div>

                    <div class="about-card animate-on-scroll d-flex align-items-start gap-3" style="border-left: 3px solid #f59e0b;">
                        <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-3" style="width:48px;height:48px;background:rgba(245,158,11,0.12);">
                            <i class="ti ti-stethoscope" style="font-size:1.4rem;color:#d97706;"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1" style="color:#92400e;">40+ Gejala Klinis</h6>
                            <p class="text-muted small mb-0">Basis pengetahuan mendalam yang mencakup anomali dan gejala fisik pada daun, batang, hingga tongkol buah jagung.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="text-center mb-5">
                <span class="section-tag"><i class="ti ti-target me-1"></i> Visi & Misi</span>
                <h2 class="section-title"><i class="ti ti-flag me-2 text-warning"></i>Tujuan Sistem</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="about-card text-center animate-on-scroll">
                        <div class="feature-icon mx-auto"><i class="ti ti-target"></i></div>
                        <h5 class="fw-bold">Diagnosis Cepat</h5>
                        <p class="text-muted small">Memberikan hasil diagnosa dalam hitungan detik berdasarkan gejala yang diamati pada tanaman jagung.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-card text-center animate-on-scroll">
                        <div class="feature-icon mx-auto"><i class="ti ti-book"></i></div>
                        <h5 class="fw-bold">Edukasi Petani</h5>
                        <p class="text-muted small">Menyediakan deskripsi, foto, dan solusi pengendalian untuk deteksi tanaman jagung.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-card text-center animate-on-scroll">
                        <div class="feature-icon mx-auto"><i class="ti ti-chart-line"></i></div>
                        <h5 class="fw-bold">Data Terpusat</h5>
                        <p class="text-muted small">Riwayat deteksi tersimpan per komoditas untuk analisis tren di dashboard admin DPKP Brebes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background: linear-gradient(180deg, #FFFBEB, #FFFFFF);">
        <div class="container py-4">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 animate-on-scroll">
                    <span class="section-tag"><i class="ti ti-brain me-1"></i> Metode</span>
                    <h2 class="section-title"><i class="ti ti-calculator me-2 text-warning"></i>Backward Chaining &amp; CF</h2>
                    <p class="text-muted">
                        SIPATAN menggunakan <strong>backward chaining</strong>: pengguna memilih penyakit atau hama
                        yang dicurigai, lalu sistem menampilkan gejala terkait untuk dikonfirmasi.
                        <strong>Certainty Factor</strong> menggabungkan bobot pakar dan tingkat keyakinan pengguna
                        untuk menghasilkan persentase diagnosa.
                    </p>
                    <div class="timeline-item mt-4">
                        <div class="timeline-dot"><i class="ti ti-plant"></i></div>
                        <h6 class="fw-bold"><i class="ti ti-plant me-1 text-warning"></i> Pilih komoditas</h6>
                        <p class="text-muted small mb-0">Sistem secara otomatis menggunakan basis pengetahuan tanaman jagung.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"><i class="ti ti-click"></i></div>
                        <h6 class="fw-bold"><i class="ti ti-click me-1 text-warning"></i> Pilih penyakit/hama &amp; gejala</h6>
                        <p class="text-muted small mb-0">Pilih target diagnosa beserta fotonya, lalu centang gejala yang diamati beserta tingkat keyakinannya.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"><i class="ti ti-binary-tree"></i></div>
                        <h6 class="fw-bold"><i class="ti ti-sitemap me-1 text-warning"></i> Sistem hitung CF</h6>
                        <p class="text-muted small mb-0">Gejala dicocokkan dengan rule CF masing-masing penyakit/hama pada komoditas terpilih.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"><i class="ti ti-math"></i></div>
                        <h6 class="fw-bold"><i class="ti ti-calculator me-1 text-warning"></i> Perhitungan CF gabungan</h6>
                        <p class="text-muted small mb-0">CF<sub>gejala</sub> = CF<sub>pakar</sub> × CF<sub>user</sub>, lalu CF<sub>combine</sub> = CF<sub>old</sub> + CF<sub>new</sub> × (1 − CF<sub>old</sub>)</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"><i class="ti ti-check"></i></div>
                        <h6 class="fw-bold"><i class="ti ti-report-analytics me-1 text-warning"></i> Hasil &amp; solusi</h6>
                        <p class="text-muted small mb-0">Penyakit/hama dengan CF tertinggi ditampilkan beserta rekomendasi solusi pengendalian.</p>
                    </div>
                </div>
                <div class="col-lg-6 animate-on-scroll">
                    <div class="about-card">
                        <x-landing-picture src="assets/images/landing/feature-deteksi.png" alt="Alur deteksi SIPATAN" class="img-fluid rounded-3" loading="lazy" width="800" height="533" />
                        <p class="text-muted small text-center mt-3 mb-0">Alur deteksi interaktif SIPATAN — pilih komoditas, target, gejala, dan lihat hasil CF</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section pb-5">
        <div class="container">
            <div class="cta-box text-center animate-on-scroll">
                <h3 class="fw-bold mb-3"><i class="ti ti-stethoscope me-2"></i>Coba Deteksi Sekarang</h3>
                <p class="mb-4 opacity-75">Diagnosa tanaman jagung — gratis, dengan atau tanpa akun.</p>
                <a href="{{ route('deteksi') }}" class="btn btn-light rounded-pill px-4 fw-semibold">
                    <i class="ti ti-stethoscope me-2"></i>Mulai Deteksi
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) entry.target.classList.add('visible');
                });
            }, { threshold: 0.15 });
            document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
        });
    </script>
@endpush
