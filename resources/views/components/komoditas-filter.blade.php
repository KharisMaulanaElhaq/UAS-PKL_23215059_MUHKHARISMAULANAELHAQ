@props([
    'komoditasList' => [],
    'komoditasId' => null,
    'action' => null,
])

<form method="GET" action="{{ $action ?? url()->current() }}" class="row g-2 align-items-center mb-0">
    <div class="col-md-4 col-12">
        <select name="komoditas_id" class="form-select" onchange="this.form.submit()">
            <option value="">Semua Komoditas</option>
            @foreach ($komoditasList as $item)
                <option value="{{ $item->id }}" @selected((int) $komoditasId === $item->id)>
                    {{ $item->nama }}
                </option>
            @endforeach
        </select>
    </div>
    @foreach (request()->except(['komoditas_id', 'page']) as $key => $value)
        @if (is_string($value) || is_numeric($value))
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endif
    @endforeach
</form>
