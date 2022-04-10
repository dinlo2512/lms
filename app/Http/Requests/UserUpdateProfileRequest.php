<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateProfileRequest extends FormRequest
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
            'avatar' => 'image',
            'name' => 'required',
            'date_of_birth' => 'required',
            'phone_number' => 'required|digits:10|numeric',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '* Tên không được để trống',
            'date_of_birth.required' => '* Ngày sinh không được để trống',
            'phone_number.required' => '* Số điện thoại không được để trống',
            'phone_number.digits' => '* Số điện thoại phải có 10 ký tự',
            'phone_number.numeric' => '* Số điện thoại không hợp lệ',
            'address.required' => '* Địa chỉ không được để trống',
            'avatar.image' => '* Ảnh không đúng định dạng',
        ];
    }
}
