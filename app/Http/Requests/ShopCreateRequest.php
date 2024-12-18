<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ShopCreateRequest extends FormRequest
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
            'name' => 'required|max:200',
            'description' => 'required',
            'address' => 'required',
            'phone' => 'required|digits:9'
        ];
    }

    public function attributes()
    {
        return [
            'name' => "do'kon nomi",
            'description' => "do'kon haqida ma'lumot",
            'address' => "manzil",
            'phone' => "do'kon aloqa reqami"
        ];
    }

    public function messages()
    {
        return [
            "required" => ":attribute ni to'ldiring",
            'phone.digits' => "telefon 9 raqamli bo'lsin",
        ];
    }
}
