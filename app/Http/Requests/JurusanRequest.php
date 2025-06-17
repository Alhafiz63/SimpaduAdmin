<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JurusanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'nama_jurusan' => 'required|string|max:255',
            'kode_jurusan' => 'required|string|max:10|unique:jurusan,kode_jurusan,' . $this->route('jurusan'),
            'fakultas_id' => 'required|exists:fakultas,id',
        ];
    }
}
