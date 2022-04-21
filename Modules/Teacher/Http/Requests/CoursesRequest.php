<?php


namespace Modules\Teacher\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min: 5',
            'subject' => 'required| min:3',
            'description' => 'required',
            'open_date' => 'required|before:close_date',
            'close_date'=> 'required',
            'teacher' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'teacher.required' => 'Must pick one Teacher',
        ];
    }

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

