<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class uploadFile extends FormRequest
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
            'file'                 => 'nullable|file|mimes:png,jpg,jpeg,gif|max:2048',
            'bukti'                => 'nullable|file|mimes:png,jpg,jpeg,gif|max:2048',
        ];
    }
}
