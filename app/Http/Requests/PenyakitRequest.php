<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PenyakitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null && $this->user()->isStaff();
    }

    public function rules(): array
    {
        $penyakitId = $this->route('penyakit')?->id;

        return [
            'komoditas_id' => ['required', 'exists:komoditas,id'],
            'kode_penyakit' => [
                'required',
                'string',
                'max:20',
                Rule::unique('penyakit', 'kode_penyakit')
                    ->where('komoditas_id', $this->input('komoditas_id'))
                    ->ignore($penyakitId),
            ],
            'nama_penyakit' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'solusi' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ];
    }

    public function attributes(): array
    {
        return [
            'komoditas_id' => 'komoditas',
            'kode_penyakit' => 'kode penyakit',
            'nama_penyakit' => 'nama penyakit',
        ];
    }
}
