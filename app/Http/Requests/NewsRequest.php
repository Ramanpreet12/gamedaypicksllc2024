<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
             'title' => 'required',
             'image' => 'required|image|Mimes:jpeg,jpg,gif,png,webp,svg|dimensions:width=360,height=495',
            //  'image' => 'required|image|Mimes:jpeg,jpg,gif,png,webp,svg|dimensions:width=360,height=495',
             'status' => 'required',
             'header' => 'required'
            ];
         }
         elseif(request()->isMethod('put')){
             $rules = [
                 'title' => 'required',
                 'image' => 'image|Mimes:jpeg,jpg,gif,png,webp,svg|dimensions:width=360,height=495',
                 'status' => 'required',
                 'header' => 'required'
                ];
         }
         return $rules;
    }
    public function attributes()
    {
       return [
        'title' => 'Title',
        'image' => 'Image',
        'status' => 'Status',
        'header' => 'Header'
       ];
    }

    public function messages()
    {
       return [
        'image.dimensions' => 'width and height of image should be 360 × 495',
        'image.Mimes' => 'Image with jpeg, jpg, gif, png, webp, svg extension is acceptable',
       ];

    }

    }
