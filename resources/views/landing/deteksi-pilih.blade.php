@extends('layouts.landing')

@section('title', 'Pilih Komoditas')

@section('content')
    <section class="deteksi-section lp-photo-soft">
        <div class="container">
            <div class="text-center mb-5 pt-4">
                <span class="section-tag"><i class="ti ti-plant me-1"></i> Pilih Komoditas</span>
                <h1 class="section-title">Deteksi Penyakit & Hama</h1>
                <p class="text-muted mx-auto" style="max-width:560px">
                    Pilih tanaman yang ingin Anda periksa. Sistem SIPATAN akan memandu diagnosa dengan metode backward chaining dan Certainty Factor.
                </p>
            </div>

            <div class="row g-4 justify-content-center pb-5">
                @foreach ($komoditasList as $item)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('deteksi.komoditas', $item) }}" class="komoditas-card text-decoration-none">
                            <div class="komoditas-card-img">
                                <img src="{{ $item->gambar_url }}" alt="{{ $item->nama }}" loading="lazy">
                            </div>
                            <div class="komoditas-card-body">
                                <span class="komoditas-code">{{ $item->kode }}</span>
                                <h3 class="komoditas-name">{{ $item->nama }}</h3>
                                <p class="komoditas-desc">{{ $item->deskripsi }}</p>
                                <span class="komoditas-cta">
                                    <i class="ti ti-stethoscope me-1"></i> Mulai Deteksi
                                    <i class="ti ti-arrow-right ms-1"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
