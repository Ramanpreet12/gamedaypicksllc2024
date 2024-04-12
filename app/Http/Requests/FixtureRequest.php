<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FixtureRequest extends FormRequest
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
            'season' => 'required' ,
            'first_team' => 'required' ,
            'second_team' => 'required|different:first_team' ,
            'date' => 'required' ,
            // 'time' => 'required' ,
            // 'time_zone' => 'required' ,

        ];

    }
    // public function messages(){
    //     return [
    //         'season.required' => 'The Season field is required',

    //     ];
    // }
}
