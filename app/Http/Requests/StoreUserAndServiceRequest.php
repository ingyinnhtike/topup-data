<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserAndServiceRequest extends FormRequest
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
            'name' => 'required|max:191|min:2|unique:merchants',
            'merchant_phone' => 'required|digits_between:9,12',
            'email' => 'required|email|unique:users',
            'merchant_address' => 'required',
            'user_name' => 'required|max:191|min:6',
            'password' => 'required|min:6'
        ];
    }
}
