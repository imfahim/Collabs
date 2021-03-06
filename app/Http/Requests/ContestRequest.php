<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Session;

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
            'title' => 'bail|required|max:100|unique:contests,title',
            'description' => 'bail|required|max:500',
            'start_date' => 'bail|required|date_format:"d/m/Y"|before:end_date',
            'end_date' => 'bail|required|date_format:"d/m/Y"|after:start_date',
            'status' => ''
        ];
    }
}
