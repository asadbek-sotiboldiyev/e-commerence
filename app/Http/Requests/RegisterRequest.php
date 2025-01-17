<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|max:100',
            'password' => 'required',
            'password2' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            "required" => ":attribute ni to'ldiring",

            "email.unique" => "Email band",
            "password2.same" => "Parolni to'g'ri takrorlang",
        ];
    }

    public function attributes(): array
    {
        return [
            "password" => "parol",
            "password2" => "takroriy parol",
            "name" => "ism",
        ];
    }
}
