<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsensiStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'jumlah_kegiatan' => 'required|integer|min:0',
            'status' => 'required|in:Hadir,Izin,Sakit,Cuti',
            'bukti_foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
