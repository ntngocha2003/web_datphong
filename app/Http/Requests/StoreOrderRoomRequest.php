<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRoomRequest extends FormRequest
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
            'name' => 'required|string',
            'phone' => 'required',
            'address' => 'required',
            'checkIn'=>'required|date|after_or_equal:tomorrow',
            'checkOut'=>'required|date|after:checkIn',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Bạn chưa nhập tên.',
            'phone.required'=>'Bạn chưa nhập số điện thoại.',
            'address.required'=>'Bạn chưa nhập địa chỉ.',
            'checkIn.required'=>'Bạn chưa nhập ngày nhận phòng.',
            'checkIn.after_or_equal:tomorrow'=>'Ngày nhận phòng phải sau hoặc là ngày đặt phòng.',
            'checkOut.required'=>'Bạn chưa nhập ngày trả phòng.',
            'checkOut.after:checkIn'=>'Ngày trả phòng phải sau ngày nhận phòng.'
        ];
    }
}