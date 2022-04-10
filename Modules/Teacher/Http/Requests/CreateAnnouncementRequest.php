<?php


namespace Modules\Teacher\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAnnouncementRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required',
            'title' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => '* Nội dung không được để trống',
            'title.required' => '* Tiêu đề không được để trống',
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

