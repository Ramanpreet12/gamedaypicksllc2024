<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class General extends Model

{

    use HasFactory;

    protected $table = 'generals';

    protected $fillable = ['header_announcement_bar_bg_color' ,'header_announcement_bar_text_color' ,  'prize_banner_video','selected_option','youtubelink','name','email','announcement_bar', 'homepage_title','homepage_subtitle' , 'logo' , 'favicon' , 'footer_contact' ,'footer_contact2' , 'footer_address' , 'footer_content','footer_affliated_text','footer_affliated_link' , 'prize_banner','email_color','footer_contact_color','other_contact_color','footer_add_color','footer_content_color','footer_afilated_color','footer_bar' ,'copyright_color','privacy_policy','privacy_policy_color', 'santa_game_store','santa_game_store_color', 'santa_game_store_link' ,'footer_content_head'];

}

