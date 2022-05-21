<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'fullName' => 'required',
            'email' => 'required',
            'phone' => 'required|digits:10|numeric',
        ];
    }

    public function message()
    {
        return[
            'fullName.required' => 'Hãy nhập tên của bạn',
            'email.required' => 'Hãy nhập email của bạn',
            'phone.required' => '* Số điện thoại không được để trống',
            'phone.digits' => '* Số điện thoại phải có 10 ký tự',
            'phone.numeric' => '* Số điện thoại không hợp lệ',
        ];
    }
}
