<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'الاسم مطلوب',
            'email.required'    => 'البريد الإلكتروني مطلوب',
            'email.email'       => 'يجب إدخال بريد إلكتروني صحيح',
            'email.unique'      => 'هذا البريد الإلكتروني مسجل بالفعل',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min'      => 'يجب أن تحتوي كلمة المرور على 6 أحرف على الأقل',
            'password.confirmed'=> 'تأكيد كلمة المرور غير متطابق',
        ];
    }
}
