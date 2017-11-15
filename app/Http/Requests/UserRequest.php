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
          'dOB' => 'required',
          'city'=>'required',
          'gender'=> 'required',
          'contactNo'=>'required|numeric',
          'occupation'=>'required',
          'website'=>'url',
          'aboutMe'=>'nullable|max:255',
          'pastExperience'=>'nullable|max:1000',
          'education'=>'nullable|max:1000',
          'programmingExperience'=>'nullable|max:1000',
          'project'=>'nullable|max:1000'
        ];
    }
}
