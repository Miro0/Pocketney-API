<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email'),
            ],
            'password' => [
                'required'
            ],
            'device_name' => [
                'required'
            ],
            'device_os' => [
                'string',
                'nullable'
            ],
        ];
    }
}
