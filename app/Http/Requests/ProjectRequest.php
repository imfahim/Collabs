<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Session::has('is_user') || Session::get('is_user') === true){
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
          'name' => 'bail|required|max:255',
          'details'=> 'bail|required|max:500',
          'github'=> 'bail|required|url',
          'youtube'=> 'nullable|url',
          'team' => 'required'
        ];
    }
}
