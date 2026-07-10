<?php

namespace App\Support;

use App\Models\Komoditas;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait FiltersKomoditas
{
    protected function komoditasFilterId(Request $request): ?int
    {
        $id = $request->query('komoditas_id');

        return $id !== null && $id !== '' ? (int) $id : null;
    }

    protected function applyKomoditasFilter(Builder $query, Request $request): Builder
    {
        $komoditasId = $this->komoditasFilterId($request);

        return $query->when($komoditasId, fn (Builder $q) => $q->where('komoditas_id', $komoditasId));
    }

    /** @return array<string, mixed> */
    protected function komoditasViewData(Request $request): array
    {
        return [
            'komoditasList' => Komoditas::orderBy('nama')->get(),
            'komoditasId' => $this->komoditasFilterId($request),
        ];
    }
}
