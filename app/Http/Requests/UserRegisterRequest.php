<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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

            'fname'            => 'required' ,
            'email'            => 'required' ,
            // 'email'            => 'required|unique:users' ,
            // 'password'         =>'required|confirmed' ,
            'phone'            => 'required' ,
            'birthday'         => 'required|before:'.\Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
            'password'         => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            // 'password'         => 'required|string|min:6|regex:/[a-z]/',
            'password_confirmation' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zipcode' => 'required|regex:/\b\d{5}\b/',
            'country' => 'required',
            'id_proof' => 'required',
            'id_proof_number' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'fname' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'phone' => 'Phone' ,
            'birthday' => 'Birthday',
            'password_confirmation' => 'Confirm Password',
            'address' => 'Address',
            'city' => 'City',
            'zipcode' => 'Zipcode',
            'country' => 'Country',
            'id_proof' => 'ID Proof',
            'id_proof_number' => 'ID Proof Number'
        ];
    }

    public function messages()
    {
        return
        [
        'password.regex' => 'Password must contain at least one digit , one uppercase and one lowercase letter and  a special character',
        'password.min:6' => 'Password must be at least 6 characters in length' ,
        'birthday.before' => 'You must be 18 years above' ,
        'zipcode.regex' => 'Zip Code should be 5 digits',

        ];

    }

}
