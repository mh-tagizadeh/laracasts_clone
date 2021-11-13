<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|unique:users|max:55',          
            'email' => 'required|unique:users|email',          
            'password' => 'required|confirmed',
            'image' => 'mimes:jpeg,jpg,png',          
        ];
    }



       /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'نام خالی است.',
            'name.unique' => 'این نام قبلا استفاده شده است.',
            'name.max' => 'شما مجاز هستید حداکثر از ۲۵۰ کاراکتر استفاده کنید.',
            // 'image.required' => 'عکس را وارد نکردید',
            'image.mimes' => 'فایل انتخاب شده عکس نیس.',
            'image.max' => 'فایل انتخاب شده بیش از حد مجاز است.',
            'email.required' => 'ایمیل خالی است.',
            'email.unique' => 'این ایمیل قبلا استفاده شده است.',
            'email.email' => 'لطفا ایمیل را درست وارد کنید.',
            'password.required' => 'پسورد خالی است.',
            'password.confirmed' => 'پسورد ها یکی نیست.',
        ];
    }
 
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }


}
