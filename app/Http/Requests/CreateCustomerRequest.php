<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Customer;

class CreateCustomerRequest extends FormRequest
{

//    /**
//     * Determine if the user is authorized to make this request.
//     *
//     * @return bool
//     */
//    public function authorize()
//    {
//        return false;
//    }
//
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|max:191|unique:customers',
            'email'                => 'required|max:191|unique:customers',
            'password'             => 'required|string|min:6',
        ];
    }
}
