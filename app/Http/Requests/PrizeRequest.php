<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrizeRequest extends FormRequest
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
            'name' => 'required',
             'season_id' => 'required',
            'image' => 'required|image|Mimes:jpeg,jpg,gif,png,webp,svg',
           ];
        }
        elseif(request()->isMethod('put')){
            $rules = [
                'name' => 'required',
                'season_id' => 'required',
                'image' => 'image|Mimes:jpeg,jpg,gif,png,webp,svg',
               ];
        }
        return $rules;
    }


    public function attributes()
    {
        return [
            'name' => 'Name',
            'season_id' => 'Season',
            'image' => 'Image',
        ];
    }
    public function messages()
    {
       return [
        'image.Mimes' => 'Image with jpeg, jpg, gif, png, webp, svg extension is acceptable',

       ];

    }


}
