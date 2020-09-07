<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'username' => 'required|max:6',
            'password' => [
                'required',
                'min:6',
                'confirmed',
                // 'regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
            ],
            'role' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Username is required',
            'username.max' => 'Username can be max six',
            'role.required' => 'You must select a type',
        ];
    }
}