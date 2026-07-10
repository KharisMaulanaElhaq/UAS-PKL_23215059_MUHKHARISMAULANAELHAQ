@extends('layouts.landing')

@section('title', 'Cara Kerja')

@section('content')
    <section class="about-hero lp-photo-soft">
        <div class="container text-center">
            <span class="section-tag animate-on-scroll"><i class="ti ti-book me-1"></i> Panduan</span>
            <h1 class="section-title animate-on-scroll"><i class="ti ti-route me-2 text-warning"></i>Cara Kerja SIPATAN</h1>
            <p class="text-muted mx-auto animate-on-scroll" style="max-width:640px">
                Panduan singkat menggunakan Sistem Pakar Diagnosa Penyakit &amp; Hama Tanaman
                untuk tanaman jagung — berbasis backward chaining dan Certainty Factor.
            </p>
        </div>
    </section>

    <section class="pb-5">
        <div class="container">
            <div class="text-center mb-4">
                <span class="section-tag"><i class="ti ti-list-numbers me-1"></i> Langkah-langkah</span>
                <h2 class="section-title h4 fw-bold">Alur Deteksi SIPATAN</h2>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4 col-xl">
                    <div class="step-card animate-on-scroll h-100">
                        <div class="step-icon"><i class="ti ti-plant"></i></div>
                        <div class="step-number">1</div>
                        <h5 class="fw-bold mb-2"><i class="ti ti-plant-2 me-1 text-warning"></i>Pilih Komoditas</h5>
                        <p class="text-muted small mb-0">Sistem secara otomatis menggunakan basis pengetahuan <strong>tanaman jagung</strong> untuk proses diagnosa.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl">
                    <div class="step-card animate-on-scroll h-100">
                        <div class="step-icon"><i class="ti ti-click"></i></div>
                        <div class="step-number">2</div>
                        <h5 class="fw-bold mb-2"><i class="ti ti-bug me-1 text-warning"></i>Pilih Penyakit/Hama</h5>
                        <p class="text-muted small mb-0">Pilih target diagnosa yang Anda curigai — ditampilkan dalam kartu beserta foto, kode, dan deskripsi singkat.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl">
                    <div class="step-card animate-on-scroll h-100">
                        <div class="step-icon"><i class="ti ti-list-check"></i></div>
                        <div class="step-number">3</div>
                        <h5 class="fw-bold mb-2"><i class="ti ti-leaf me-1 text-warning"></i>Centang Gejala</h5>
                        <p class="text-muted small mb-0">Sistem menampilkan gejala-gejala yang terkait dengan penyakit/hama target. Centang gejala yang Anda amati pada tanaman.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl">
                    <div class="step-card animate-on-scroll h-100">
                        <div class="step-icon"><i class="ti ti-adjustments"></i></div>
                        <div class="step-number">4</div>
                        <h5 class="fw-bold mb-2"><i class="ti ti-mood-smile me-1 text-warning"></i>Atur Keyakinan</h5>
                        <p class="text-muted small mb-0">Untuk setiap gejala, pilih tingkat keyakinan: Tidak (0), Tidak Yakin (0,2), Kurang Yakin (0,4), Cukup Yakin (0,6), Yakin (0,8), atau Sangat Yakin (1).</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl">
                    <div class="step-card animate-on-scroll h-100">
                        <div class="step-icon"><i class="ti ti-report-analytics"></i></div>
                        <div class="step-number">5</div>
                        <h5 class="fw-bold mb-2"><i class="ti ti-check me-1 text-warning"></i>Lihat Hasil CF</h5>
                        <p class="text-muted small mb-0">Dapatkan persentase Certainty Factor, konfirmasi diagnosa, rekomendasi solusi pengendalian, dan opsi simpan riwayat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 order-lg-2 animate-on-scroll">
                    <x-landing-picture src="assets/images/landing/feature-deteksi.png" alt="Alur deteksi SIPATAN" class="img-fluid rounded-4 shadow-sm" loading="lazy" width="800" height="533" />
                    <p class="text-muted small text-center mt-3 mb-0">Alur deteksi SIPATAN — pilih komoditas, target, gejala, dan lihat hasil CF</p>
                </div>
                <div class="col-lg-6 order-lg-1 animate-on-scroll">
                    <span class="section-tag"><i class="ti ti-arrows-shuffle me-1"></i> Backward Chaining</span>
                    <h2 class="section-title"><i class="ti ti-brain me-2 text-warning"></i>Alur Backward Chaining</h2>
                    <p class="text-muted">
                        SIPATAN menggunakan <strong>backward chaining</strong> — mulai dari hipotesis penyakit/hama,
                        lalu verifikasi dengan gejala yang diamati pengguna:
                    </p>
                    <ul class="list-unstyled">
                        <li class="d-flex gap-3 mb-3">
                            <span class="list-icon"><i class="ti ti-plant"></i></span>
                            <div>
                                <strong>Pilih komoditas</strong> — sistem menggunakan basis pengetahuan tanaman jagung untuk rule CF yang akurat.
                            </div>
                        </li>
                        <li class="d-flex gap-3 mb-3">
                            <span class="list-icon"><i class="ti ti-photo"></i></span>
                            <div>
                                <strong>Pilih target</strong> — penyakit atau hama ditampilkan dalam kartu beserta foto dan deskripsi singkat.
                            </div>
                        </li>
                        <li class="d-flex gap-3 mb-3">
                            <span class="list-icon"><i class="ti ti-list-check"></i></span>
                            <div>
                                <strong>Gejala target</strong> — setelah memilih target, sistem menampilkan gejala terkait dari basis pengetahuan komoditas tersebut.
                            </div>
                        </li>
                        <li class="d-flex gap-3 mb-3">
                            <span class="list-icon"><i class="ti ti-adjustments"></i></span>
                            <div>
                                <strong>Tingkat keyakinan</strong> — pengguna memilih salah satu dari 6 tingkat: Tidak (0), Tidak Yakin (0,2), Kurang Yakin (0,4), Cukup Yakin (0,6), Yakin (0,8), Sangat Yakin (1).
                            </div>
                        </li>
                        <li class="d-flex gap-3 mb-3">
                            <span class="list-icon"><i class="ti ti-calculator"></i></span>
                            <div>
                                <strong>Hitung CF</strong> — CF<sub>gejala</sub> = CF<sub>pakar</sub> × CF<sub>user</sub>, lalu digabung untuk menghasilkan persentase diagnosa target.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" style="background: #FFFBEB;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-tag"><i class="ti ti-users me-1"></i> Login vs Tamu</span>
                <h2 class="section-title"><i class="ti ti-login me-2 text-warning"></i>Dua Mode Akses</h2>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-5">
                    <div class="about-card animate-on-scroll">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="feature-icon mb-0"><i class="ti ti-user"></i></div>
                            <h5 class="fw-bold mb-0">Dengan Login (Pengguna)</h5>
                        </div>
                        <p class="text-muted small mb-0">Daftar akun pengguna untuk deteksi tanaman jagung. Riwayat deteksi tersimpan dan dapat dilihat di menu Riwayat.</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="about-card animate-on-scroll">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="feature-icon mb-0"><i class="ti ti-users"></i></div>
                            <h5 class="fw-bold mb-0">Tanpa Login (Tamu)</h5>
                        </div>
                        <p class="text-muted small mb-0">Deteksi tetap bisa dilakukan tanpa akun. Riwayat disimpan sebagai tamu dan tetap masuk ke grafik dashboard admin DPKP Brebes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section pb-5">
        <div class="container">
            <div class="cta-box text-center animate-on-scroll">
                <h3 class="fw-bold mb-3"><i class="ti ti-rocket me-2"></i>Sudah Paham? Yuk Coba SIPATAN!</h3>
                <p class="mb-4 opacity-75 mx-auto" style="max-width:480px">Diagnosa penyakit &amp; hama tanaman jagung — gratis, dengan atau tanpa akun.</p>
                <a href="{{ route('deteksi') }}" class="btn btn-light btn-lg rounded-pill px-5 fw-semibold">
                    <i class="ti ti-arrow-right me-2"></i>Mulai Deteksi
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
