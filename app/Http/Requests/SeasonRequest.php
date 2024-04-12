<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeasonRequest extends FormRequest
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
            'season_name' => 'required',
            'starting' => 'required',
            'ending' => 'required',
            'season_amount' => 'required',
            'status' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'season_name' => 'Name',
            'starting' => 'Start Date',
            'ending' => 'End Date',
            'season_amount' => 'Amount',
            'status' => 'Status',
        ];
    }
}
