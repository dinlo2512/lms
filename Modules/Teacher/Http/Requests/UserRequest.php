<?php


namespace Modules\Teacher\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'date_of_birth' => [
                'required',
                'date_format:Y-m-d',
                'before:' . Carbon::now()->subYears(18)->format('Y-m-d')
            ],
            'username' => 'required',
            'email' => 'required|unique:users,email',
            'phone_number' => 'required|digits:10|numeric',
            'address' => 'required',
        ];
    }

//    public function messages()
//    {
//        return [
//
//        ];
//    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}

