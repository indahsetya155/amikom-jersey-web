<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:191',
            'type' => 'required|max:191',
            'description' => 'required',
            'price' => 'required|integer',
            'quantity' => 'required|integer'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'         => 'Kolom Nama wajib diisi',
            'type.required'         => 'Kolom Tipe wajib diisi',
            'description.required'  => 'Kolom Deskripsi wajib diisi',
            'price.required'        => 'Kolom Harga wajib diisi',
            'price.integer'         => 'Kolom Harga hanya berupa bilangan bulat',
            'quantity.required'     => 'Kolom Kuantitas wajib diisi',
            'quantity.integer'      => 'Kolom Kuantitas hanya berupa bilangan bulat',
        ];
    }
}
