<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactPageRequest extends FormRequest
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
        if (request()->ismethod('put')) {
           $rules = [
            'heading' => 'required',

             'content' => 'required',
           ];
        }
        return $rules;
    }

    public function attributes()
    {
       return [
        'heading' => 'Heading',

        'content' => 'Content',
       ];
    }
}
