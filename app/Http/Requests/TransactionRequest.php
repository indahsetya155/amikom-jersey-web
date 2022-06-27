<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'kode'                  => 'required|sometimes|max:191',
            'name'                  => 'required|sometimes|string|max:191',
            'email'                 => 'required|sometimes|email',
            'number'                => 'required|sometimes|numeric|integer',
            'address'               => 'required|sometimes|string',
            'transaction_total'     => 'required|sometimes|numeric',
            'transaction_status'    => 'required|sometimes|in:PENDING,SUCCESS,FAILED',
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
            'name.required'                 => 'Kolom Nama wajib diisi',
            'kode.required'                 => 'Kolom Kode wajib diisi',
            'email.required'                => 'Kolom Email wajib diisi',
            'number.required'               => 'Kolom Nomer wajib diisi',
            'address.required'              => 'Kolom Alamat wajib diisi',
            'transaction_total.required'    => 'Kolom Harga wajib diisi',
            'transaction_status.required'   => 'Kolom Status wajib diisi',

            'email.email'                   => 'Kolom Email hanya berupa format email',
            'number.numeric'                => 'Kolom Nomer hanya berupa angka',
            'number.integer'                => 'Kolom Nomer hanya berupa bilangan bulat',
            'transaction_total.numeric'     => 'Kolom Total hanya berupa angka',
        ];
    }
}
