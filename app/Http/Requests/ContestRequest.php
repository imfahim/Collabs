<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContestRequest extends FormRequest
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
            'title' => 'bail|required|max:100',
            'description' => 'bail|required|max:500',
            'start_year' => 'bail|required',
            'start_month' => 'bail|required',
            'start_day' => 'bail|required',
            'end_year' => 'bail|required',
            'end_month' => 'bail|required',
            'end_day' => 'bail|required',
            'status' => 'bail|boolean'

        ];
    }
}
