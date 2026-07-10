@props([
    'gejala' => null,
    'komoditasList' => [],
])

@php
    $selectedKomoditasId = (int) old('komoditas_id', $gejala?->komoditas_id);
    $defaultPrefix = $komoditasList->firstWhere('id', $selectedKomoditasId)?->gejalaKodePrefix() ?? 'GP';
@endphp

<div class="row g-3">
    <div class="col-md-4">
        <label class="form-label">Komoditas <span class="text-danger">*</span></label>
        <select name="komoditas_id" id="komoditasGejalaSelect"
            class="form-select @error('komoditas_id') is-invalid @enderror" required>
            <option value="" data-gejala-prefix="GP">— Pilih komoditas —</option>
            @foreach ($komoditasList as $item)
                <option value="{{ $item->id }}"
                    data-gejala-prefix="{{ $item->gejalaKodePrefix() }}"
                    @selected($selectedKomoditasId === $item->id)>
                    {{ $item->nama }}
                </option>
            @endforeach
        </select>
        @error('komoditas_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <label class="form-label">Kode Gejala <span class="text-danger">*</span></label>
        <input type="text" name="kode_gejala" id="kodeGejalaInput"
            class="form-control @error('kode_gejala') is-invalid @enderror"
            value="{{ old('kode_gejala', $gejala?->kode_gejala) }}"
            placeholder="contoh: {{ $defaultPrefix }}01" required>
        <div class="form-text">Format: {{ $defaultPrefix }}01 — huruf J (Jagung) setelah G</div>
        @error('kode_gejala') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-8">
        <label class="form-label">Nama Gejala <span class="text-danger">*</span></label>
        <input type="text" name="nama_gejala"
            class="form-control @error('nama_gejala') is-invalid @enderror"
            value="{{ old('nama_gejala', $gejala?->nama_gejala) }}"
            placeholder="contoh: Daun menguning di tepi" required>
        @error('nama_gejala') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

@push('scripts')
    <script>
        (function () {
            const komoditasSelect = document.getElementById('komoditasGejalaSelect');
            const kodeInput = document.getElementById('kodeGejalaInput');
            if (!komoditasSelect || !kodeInput) return;

            function updatePrefix() {
                const opt = komoditasSelect.selectedOptions[0];
                const prefix = opt?.dataset.gejalaPrefix || 'GP';
                kodeInput.placeholder = 'contoh: ' + prefix + '01';
            }

            komoditasSelect.addEventListener('change', updatePrefix);
            updatePrefix();
        })();
    </script>
@endpush
