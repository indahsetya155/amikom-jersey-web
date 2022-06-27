<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductGalleryRequest extends FormRequest
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
            'products_id' => 'required|uuid',
            'photo' => 'required|image',
            'is_default' => 'integer',
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
            'products_id.required'      => 'Produk Nama wajib diisi',
            'products_id.uuid'          => 'ID Produk hanya berupa UUID',
            'photo.required'            => 'Foto wajib diisi',
            'photo.image'               => 'Foto hanya berupa berextensi gambar',
            'is_default.integer'        => 'default hanya berupa integer',
        ];
    }
}
