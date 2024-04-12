<?php



namespace App\Http\Controllers\Backend;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\GeneralRequest;

use App\Models\General;

use App\Models\GeneralSetting;

use Validator;

use Illuminate\Support\Str;

use Storage;



class GeneralController extends Controller

{

    public function general()

    {

        $general = General::first();

        $get_social_links = GeneralSetting::where('type', 'social_links')->get()->toArray();

        $social_links = key_value('name', 'value', $get_social_links);



            return view('backend.site_setting.general' , compact('general' ,'social_links'));

    }

    public function general_update(GeneralRequest $request)

    {

    //   dd($request);die();

        // try {



                $general = General::First();

                $updateDetails = [

                    'name' => $request->get('name'),

                    'email' => $request->get('email'),
                    'announcement_bar' => $request->get('announcement_bar'),
                    'header_announcement_bar_bg_color' => $request->get('header_announcement_bar_bg_color'),
                    'header_announcement_bar_text_color' => $request->get('header_announcement_bar_text_color'),
                    'homepage_title' => $request->get('homepage_title'),

                    'homepage_subtitle' => $request->get('homepage_subtitle'),

                    'footer_contact' => $request->get('footer_contact'),

                    'footer_contact2' => $request->get('footer_contact2'),

                    'footer_address' => $request->get('footer_address'),

                    'footer_content' => $request->get('footer_content'),

                    'email_color' => $request->get('Emailtext_color'),

                    'footer_contact_color' => $request->get('FooterContact_color'),

                    'other_contact_color' => $request->get('otherContact_color'),

                    'footer_add_color' => $request->get('Footeraddress_color'),

                    'footer_content_color' => $request->get('FooterContent_color'),

                    'footer_affliated_text' => $request->get('footer_affliated_text'),

                    'footer_afilated_color' => $request->get('FooterAffliated_color'),

                    'privacy_policy' => $request->get('privacy_policy'),

                    'privacy_policy_color' => $request->get('privacy_policy_color'),

                    'santa_game_store' => $request->get('santa_game_store'),

                    'santa_game_store_color' => $request->get('santa_game_store_color'),

                    'santa_game_store_link' => $request->get('santa_game_store_link'),

                    'footer_bar' => $request->get('footer_bar'),

                    'copyright_color' => $request->get('copyright_color'),

                    'footer_content_head' => $request->get('footer_content_head'),

                ];

                if($request->has('logo')){

                   $logo_filename =  general_images($request->logo);

                    $updateDetails['logo'] = $logo_filename;

                }

                if($request->has('favicon')){

                    $favicon_filename =  general_images($request->favicon);

                    $updateDetails['favicon'] = $favicon_filename;

                }

              $update_query =   $general->update($updateDetails);



                //social links update

                GeneralSetting::where(['name' => 'Facebook'])->update(['value' => $request->facebook]);

                GeneralSetting::where(['name' => 'Twitter'])->update(['value' => $request->twitter]);

                GeneralSetting::where(['name' => 'Instagram'])->update(['value' => $request->instagram]);

                GeneralSetting::where(['name' => 'Google Plus'])->update(['value' => $request->google_plus]);

                GeneralSetting::where(['name' => 'Youtube'])->update(['value' => $request->youtube]);

                GeneralSetting::where(['name' => 'Pinterest'])->update(['value' => $request->pinterest]);

                GeneralSetting::where(['name' => 'Linkedin'])->update(['value' => $request->linkedin]);



              if ($update_query) {

                return redirect()->back()->with('success' , 'General setting updated successfully');

              } else {

                return redirect()->back()->with('message_error' , 'Something went wrong');

              }



            // } catch (\Exception $e) {

            //         $e->getMessage();

            //         }



                }



                public function prize_banner(Request $request) {

                  $general = General::First();
                  $update_prize_banner = array();
                  $update_prize_banner['selected_option'] = $request->prize_banner_option;

                  if($request->has('prize_banner_video')){
                      $video = $request->file('prize_banner_video');
                      $video_filename = $video->getClientOriginalName();
                      $video_ext = '.'.$video->getClientOriginalExtension();
                      if($video_ext == '.mp4'){
                        $update_prize_banner['prize_banner_video'] = $video_filename;
                        $video->storeAs('public/videos/prizeVideo/' , $video_filename);
                      }else{
                        return redirect()->back()->with('error_msg' , 'please upload mp4 video');
                      }
                  }
                  if($request->has('prize_banner')){
                      $prize_banner_filename =  general_images($request->prize_banner);
                      $update_prize_banner['prize_banner'] = $prize_banner_filename;
                  }
                  if($request->has('youtube_link')){
                    $update_prize_banner['youtubelink'] = $request->youtube_link;
                }
                  $update_query =  $general->update($update_prize_banner);
                  return redirect()->back()->with('success_msg' , 'Prize Banner updated successfully');

              }

}

