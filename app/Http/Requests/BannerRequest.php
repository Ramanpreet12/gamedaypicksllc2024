<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'heading' => 'required',
            // min_width: Images narrower than this pixel width will be rejected
            // max_width: Images wider than this pixel width will be rejected
            // min_height: Images shorter than this pixel height will be rejected
            // max_height: Images taller than this pixel height will be rejected
            // width: Images not exactly this pixel width will be rejected
            // height: Images not exactly this pixel height will be rejected
            'image' => 'required|image|Mimes:jpeg,jpg,gif,png,webp,svg|dimensions:min_width=1500,min_height=500',
            'status' => 'required',
            'serial' => 'required'
           ];
        }
        elseif(request()->isMethod('put')){
            $rules = [
                'heading' => 'required',
                'status' => 'required',
                'serial' => 'required',
                'image' => 'image|Mimes:jpeg,jpg,gif,png,webp,svg|dimensions:min_width=1500,min_height=500',
                // 'image' => 'image|max:500kb|Mimes:jpeg,jpg,gif,png,webp,svg|dimensions:min_width=1000,min_height=500',

               ];
        }
        return $rules;
    }

    public function attributes()
    {
       return [
        'heading' => 'Heading',
        'image' => 'Image',
        'status' => 'Status',
        'serial' => 'Serial'
       ];

    }

    public function messages()
    {
       return [

        'image.dimensions' => 'Minimum width and height of image should be 1500 × 500',
        'image.Mimes' => 'Image with jpeg, jpg, gif, png, webp, svg extension is acceptable',
       ];

    }

}
