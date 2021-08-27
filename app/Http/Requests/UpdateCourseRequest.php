<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'title' => 'required|max:55',
            'slug' => 'required',
            'description' => 'required',
            'category' => 'required|numeric',
            'teacher' => 'required|numeric',
            'price' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:3000',
        ];
    }
}
