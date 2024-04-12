<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JerseyRequest extends FormRequest
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
        if (request()->ismethod('post')) {
            $rules = [
             'jersey_name' => 'required',
              'jersey_image' => 'required',
             'status' => 'required',
             'jersey_price' => 'required',
             'jersey_url' => 'required',
             'jersey_type' => 'required',
            //  'jersey_type' => 'required',
            ];
         }
         elseif(request()->isMethod('put')){
             $rules = [
                 'jersey_name' => 'required',
                 'status' => 'required',
                 'jersey_price' => 'required',
                 'jersey_url' => 'required',
                 'jersey_type' => 'required',
                ];
         }
         return $rules;
    }
}
