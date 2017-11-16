<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Session::has('is_company') || Session::get('is_company') === true){
          return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city'=>'required',
            'contactNo'=>'bail|required',
            'website'=>'bail|nullable|url',
            'about'=>'bail|nullable|max:255'
        ];
    }
}
