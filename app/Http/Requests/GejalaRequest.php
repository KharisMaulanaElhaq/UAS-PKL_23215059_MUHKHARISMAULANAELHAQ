<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GejalaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        $gejalaId = $this->route('gejala')?->id;

        return [
            'komoditas_id' => ['required', 'exists:komoditas,id'],
            'kode_gejala' => [
                'required',
                'string',
                'max:20',
                Rule::unique('gejala', 'kode_gejala')
                    ->where('komoditas_id', $this->input('komoditas_id'))
                    ->ignore($gejalaId),
            ],
            'nama_gejala' => ['required', 'string', 'max:255'],
        ];
    }

    public function attributes(): array
    {
        return [
            'komoditas_id' => 'komoditas',
            'kode_gejala' => 'kode gejala',
            'nama_gejala' => 'nama gejala',
        ];
    }
}
