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
            'number'                => 'required|numeric|integer',
            'address'               => 'required|string',
            'transaction_total'     => 'required|numeric',
            'transaction_status'    => 'required|in:PENDING,SUCCESS,FAILED',
            'transaction_details'   => 'required|array',
            'transaction_details.*' => 'required|exists:products,id',
        ];
    }
}
