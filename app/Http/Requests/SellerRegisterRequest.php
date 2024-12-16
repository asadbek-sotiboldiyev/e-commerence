<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SellerRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone' => "required|digits:9"
        ];
    }

    public function attributes()
    {
        return [
            'phone' => 'telefon raqam',
        ];
    }

    public function messages()
    {
        return [
            'required' => ":attribute ni to'ldiring",
            'phone.digits' => "telefon 9 raqamli bo'lsin",
        ];
    }
}
