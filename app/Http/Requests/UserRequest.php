<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'full_name'=> 'required',
            'avatar'=> 'required',
            'birthday'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Nhập tên của bạn',
            'email.required'=>'Nhập email của bạn',
            'full_name.required'=>'Nhập họ và tên của bạn',
            'avatar.required'=>'Nhập avatar của bạn',
            'birthday.required'=>'Nhập ngày sinh của bạn',
        ];
    }
}
