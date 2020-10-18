<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
