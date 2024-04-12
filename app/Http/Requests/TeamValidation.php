<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamValidation extends FormRequest
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
        // return [
        //     'name'=>'required',

        //     'win'=>'required',
        //     'loss'=>'required',
        //     'status'=>'required',
        //     // 'logo'=>'required'
        // ];

        if (request()->ismethod('post')) {
            $rules = [
             'region_id' => 'required',
              'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp',
             'status' => 'required',
             'name' => 'required'
            ];
         }
         elseif(request()->isMethod('put')){
             $rules = [
                 'region_id' => 'required',
                 'status' => 'required',
                 'name' => 'required',

                ];
         }
         return $rules;
    }

    public function attributes()
    {
       return [
        'region_id' => 'Region ',
        'logo' => 'Team Logo',
        'status' => 'Status',
        'name' => 'Team Name'
       ];

    }


}
