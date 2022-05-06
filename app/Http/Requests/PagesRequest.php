<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagesRequest extends FormRequest
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
            'content' => 'required|min:100',
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'هذا الحقل مطلوب',
            'image.required' => 'الصورة مطلوبة',
            'content.required' => 'هذا الحقل مطلوب',
            'content.min' => 'يجب الا يقل الكلمات عن 100 كلمة',
        ];
    }
}
