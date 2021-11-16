<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;



class StoreCoursesRequest extends FormRequest
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


    // TODO: add uniqe validation for title, sku, and slug
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
            'published_at' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:3000',
        ];
    }


}
