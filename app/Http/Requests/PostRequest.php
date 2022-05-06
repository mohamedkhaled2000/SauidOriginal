<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required',
            'image' => 'required',
            'short_title' => 'required',
            'content' => 'required',
            'type' => 'required',
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'هذا الحقل مطلوب',
            'image.required' => 'هذا الحقل مطلوب',
            'short_title.required' => 'هذا الحقل مطلوب',
            'content.required' => 'هذا الحقل مطلوب',
            'type.required' => 'هذا الحقل مطلوب',
            'status.required' => 'هذا الحقل مطلوب',
        ];
    }
}
