<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'  => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $this->route('id'),
            'password' => 'nullable|string|min:6|confirmed',
        ];
    }

    public function messages()
{
    return [
        'name.string' => 'يجب أن يكون الاسم نصًا.',
        'name.max' => 'يجب ألا يتجاوز الاسم 255 حرفًا.',

        'email.email' => 'يجب أن يكون البريد الإلكتروني عنوانًا صالحًا.',
        'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل.',

        'password.min' => 'يجب أن تكون كلمة المرور على الأقل 6 أحرف.',
        'password.confirmed' => 'تأكيد كلمة المرور غير متطابق.',
    ];
}

}
