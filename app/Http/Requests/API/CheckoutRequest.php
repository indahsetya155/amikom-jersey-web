<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name'                  => 'required|string|max:191',
            'email'                 => 'required|email',
            'province'                 => 'required|numeric',
            'city'                 => 'required|numeric',
            'kurir'                 => 'required|string',
            'ongkir'                 => 'required|string',
            'note'                 => 'nullable|string',
            'file'                 => 'nullable|file|mimes:png,jpg,jpeg,gif|max:2048',
            'number'                => 'required|numeric',
            'address'               => 'required|string',
            'transaction_total'     => 'required|numeric',
        ];
    }
}
