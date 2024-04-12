<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchResultRequest extends FormRequest
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
            'page_heading' => 'required',
            'selected_season_heading' => 'required',
            'select_season_heading' => 'required',
            'total_player_heading' => 'required',
            'region_heading' => 'required',
            'players_total_win' => 'required',
            'players_total_loss' => 'required',

        ];
    }
    public function attributes()
    {
        return [
            'page_heading' => 'Page Heading',
            'selected_season_heading' => 'Selected Season Heading',
            'select_season_heading' => 'Select Season Heading',
            'total_player_heading' => 'Total Players Heading',
            'region_heading' => 'Region Heading' ,
            'players_total_win' => 'Players Total Win',
            'players_total_loss' => 'Players Toal Loss',

        ];
    }
}
