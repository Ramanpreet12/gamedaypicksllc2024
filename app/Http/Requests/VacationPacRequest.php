<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacationPacRequest extends FormRequest
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

             'status' => 'required',
             'serial' => 'required',
             'image_video' => 'required|Mimes:jpeg,jpg,gif,png,webp,svg,avi,mpeg,mp4',
            ];
         }
         elseif(request()->isMethod('put')){
             $rules = [
                 'title' => 'required',
                 'status' => 'required',
                 'serial' => 'required',
                 'image_video' => 'Mimes:jpeg,jpg,gif,png,webp,svg,avi,mpeg,mp4',
                ];
         }
         return $rules;
    }
    public function attributes()
    {
       return [
        'title' => 'Title',
        'image' => 'Image or Video',
        'status' => 'Status',
        'serial' => 'Serial'
       ];

    }

    public function messages()
    {
       return [
        'image_video.Mimes' => 'Invalid file type!',
        // 'image_video.dimensions' => 'Minimum width should be 1000px and height should be 800px',
        'image.Mimes' => 'Image with jpeg, jpg, gif, png, webp, svg & Video with avi, mpeg, mp4 extension is acceptable',

       ];

    }
}
