<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            
            'email'    => 'required|string|email',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            
            'email.required'    => 'البريد الإلكتروني مطلوب',
            'email.email'       => 'يجب إدخال بريد إلكتروني صحيح',
            
            'password.required' => 'كلمة المرور مطلوبة',
            
            'password.confirmed'=> 'تأكيد كلمة المرور غير متطابق',
        ];
    }
}
