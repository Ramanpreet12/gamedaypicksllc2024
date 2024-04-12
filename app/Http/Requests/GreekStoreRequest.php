<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GreekStoreRequest extends FormRequest
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
             'product_name' => 'required',
             'greek_product_image' => 'required',
             'product_url' => 'required',
             'product_type' => 'required',

            ];
         }
         elseif(request()->isMethod('put')){
             $rules = [
                 'product_name' => 'required',
                 'product_url' => 'required',
                 'product_type' => 'required',

                ];
         }
         return $rules;
    }
}
