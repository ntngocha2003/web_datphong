<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|string|email|unique:users|max:191',
            'name' => 'required|string',
            'password' => 'required|string:min:6',
            're_password'=> 'requered|string|same:password'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'=>'Bạn chưa nhập email.',
            'email.email'=>'Bạn chưa nhập đúng định dạng email. Ví dụ: abc@gmail.com',
            'email.unique'=>'Email đã tồn tại, bạn vui lòng chọn email khác.',
            'email.string'=>'Email phải ở dạng ký tự.',
            'email.max'=>'Độ dài tối đa của email là 191.',
            'name.required'=>'Bạn chưa nhập tên người dùng.',
            'name.string'=>'Tên người dùng phải ở dạng ký tự.',
            'password.required'=>'Bạn chưa nhập mật khẩu.',
            'password.min'=>'Mật khẩu phải gồm ít nhất 6 chữ số.',
            're_password.required'=>'Bạn chưa nhập lại mật khẩu.',
            're_passwordsame'=>'Mật khẩu không trùng khớp.'
        ];
    }
}
