<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'bail|required|max:100',
            'email'=>'bail|required|email|max:100|unique:users,email',
            'password'=> 'bail|required|min:6',
            'repassword'=>'bail|required|same:password',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
