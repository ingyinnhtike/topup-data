<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataPackRequest extends FormRequest
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
            'keyword' => 'required',
            'service_name' => 'required',
            'to' => 'required',
            'id' => 'required',
        ];
    }

    public function checkBalanceRules()
    {
        return [
            'keyword' => 'required',
            'email' => 'required'
        ];
    }
}
