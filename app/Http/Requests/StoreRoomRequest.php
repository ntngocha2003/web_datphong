<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
            'nameRoom' => 'required|string',
            'description' => 'required',
            'price' => 'required|numeric',
            // 're_price'=> 'requered|string|same:price'
        ];
    }
    public function messages(): array
    {
        return [
            'nameRoom.required'=>'Bạn chưa nhập tên phòng.',
            'nameRoom.string'=>'Tên phòng dùng phải ở dạng ký tự.',
            'description.required'=>'Bạn chưa nhập mô tả.',
            'price.required'=>'Bạn chưa nhập giá phòng.',
            'price.numeric'=>'Gía phòng nhập vào phải là số.',
        ];
    }
}
