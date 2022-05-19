<?php

namespace App\Http\Requests\Credential;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'password' => 'required|confirmed|min:8',
            'email' => 'required|email',
            'nik' => 'required|digits:16',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'foto' => 'required|max:1024|mimes:jpg,jpeg,png',
            'telepon' => 'required',
        ];
    }
}
