<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
// use Illuminate\Validation\Rule;
use Validator;

class GeneralSettingController extends Controller
{
    public function contactPage(Request $request) {
        if ($request->isMethod('put')) {
            $rules = array(
                'contact_section_heading'      => 'required',
                'contact_location_heading'     => 'required',
                'contact_page_content'         => 'required',
                'contact_form_heading'         => 'required',
                'contact_social_links_heading' => 'required',
                'contact_page_image'           => 'image|Mimes:jpeg,jpg,gif,png,webp,svg',
            );

            $fieldNames = array(
                'contact_section_heading'       => 'Page Heading',
                'contact_location_heading'      => 'Location Heading',
                'contact_page_content'          => 'Content',
                'contact_form_heading'          => 'Enquiry Form Heading',
                'contact_social_links_heading'  => 'Social Links Heading',
                // 'contact_page_image.Mimes'           =>  'Image with jpeg, jpg, gif, png, webp, svg extension is acceptable',
             );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }else{
            $image_file     =   $request->file('contact_page_image');
            if ($image_file) {
                $image_filename = $image_file->getClientOriginalName();
                $success = $image_file->storeAs('public/images/static_page/' , $image_filename);
                if (!isset($success)) {
                    return back()->withError('Could not upload logo');
                }
                // $data["contact_page_image"]=$image_filename;
                GeneralSetting::where(['name' => 'contact_page_image'])->update(['value' => $image_filename]);
            }
            GeneralSetting::where(['name' => 'contact_section_heading'])->update(['value' => $request->contact_section_heading]);
            GeneralSetting::where(['name' => 'contact_location_heading'])->update(['value' => $request->contact_location_heading]);
            GeneralSetting::where(['name' => 'contact_page_content'])->update(['value' => $request->contact_page_content]);
            GeneralSetting::where(['name' => 'contact_form_heading'])->update(['value' => $request->contact_form_heading]);
            GeneralSetting::where(['name' => 'contact_social_links_heading'])->update(['value' => $request->contact_social_links_heading]);
                return redirect()->back()->with('success' , 'Contact Page updated successfully');
            }
        }
        else {
            $get_contact_details = GeneralSetting::where('type', 'contactPage')->get()->toArray();
            $contact_details = key_value('name', 'value', $get_contact_details);

            return view('backend.site_setting.contactPage' ,compact('contact_details'));
        }
    }


    public function aboutPage(Request $request) {
        if ($request->isMethod('put')) {
            $rules = array(
                'heading'      => 'required',
                'content'      => 'required',
                'image'        => 'image|Mimes:jpeg,jpg,gif,png,webp,svg',
            );

            $fieldNames = array(
                'heading'       => 'Page Heading',
                'content'       => 'Content',
             );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }else{
            $image_file     =   $request->file('about_page_image');
            if ($image_file) {
                $image_filename = $image_file->getClientOriginalName();
                $success = $image_file->storeAs('public/images/static_page/' , $image_filename);
                if (!isset($success)) {
                    return back()->withError('Could not upload logo');
                }
                GeneralSetting::where(['name' => 'about_page_image'])->update(['value' => $image_filename]);
            }
            GeneralSetting::where(['name' => 'about_page_heading'])->update(['value' => $request->heading]);
            GeneralSetting::where(['name' => 'about_page_sub_heading'])->update(['value' => $request->sub_heading]);
            GeneralSetting::where(['name' => 'about_page_content'])->update(['value' => $request->content]);
            GeneralSetting::where(['name' => 'about_page_status'])->update(['value' => $request->status]);

                return redirect()->back()->with('success' , 'About Page updated successfully');
            }
        }
        else {
            $get_about_details = GeneralSetting::where('type', 'aboutPage')->get()->toArray();

            $about_page_details = key_value('name', 'value', $get_about_details);

            return view('backend.site_setting.aboutPage' , compact('about_page_details') );
        }
    }


    public function privacyPage(Request $request) {
        if ($request->isMethod('put')) {
            $rules = array(
                'heading'      => 'required',
                'content'      => 'required',
                // 'image'        => 'image|Mimes:jpeg,jpg,gif,png,webp,svg',
            );

            $fieldNames = array(
                'heading'       => 'Page Heading',
                'content'       => 'Content',
             );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }else{

            GeneralSetting::where(['name' => 'privacy_page_heading'])->update(['value' => $request->heading]);
            GeneralSetting::where(['name' => 'privacy_page_content'])->update(['value' => $request->content]);
                return redirect()->back()->with('success' , 'Privacy Page updated successfully');
            }
        }
        else {
            $get_privacy_details = GeneralSetting::where('type', 'privacyPage')->get()->toArray();

            $privacy_page_details = key_value('name', 'value', $get_privacy_details);

            return view('backend.site_setting.privacyPage' , compact('privacy_page_details'));
        }
    }



    public function match_fixture(Request $request) {

            $get_match_fixture_details = GeneralSetting::where('type', 'matchFixture')->get()->toArray();
            $match_fixture_details = key_value('name', 'value', $get_match_fixture_details);

            return view('backend.site_setting.matchFixture' , compact('match_fixture_details') );

    }

    public function match_fixture_edit(Request $request) {


            $rules = array(
                'match_fixture_section_heading'         => 'required',
                'match_fixture_selected_season_heading' => 'required',
                'match_fixture_select_season_heading'   => 'required',
                'match_fixture_selected_week_heading'   => 'required',
                'match_fixture_select_week_heading'     => 'required',
            );

            $fieldNames = array(
                'match_fixture_section_heading'         => 'Page Heading',
                'match_fixture_selected_season_heading' => 'Selected Season Heading',
                'match_fixture_select_season_heading'   => 'Select Season',
                'match_fixture_selected_week_heading'   => 'Selected Week',
                'match_fixture_select_week_heading'     => 'Select Week',
             );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }else{
            GeneralSetting::where(['name' => 'match_fixture_section_heading' , 'type' => 'matchFixture'])->update(['value' => $request->match_fixture_section_heading]);
            GeneralSetting::where(['name' => 'match_fixture_selected_season_heading' , 'type' => 'matchFixture'])->update(['value' => $request->match_fixture_selected_season_heading]);
            GeneralSetting::where(['name' => 'match_fixture_select_season_heading' , 'type' => 'matchFixture'])->update(['value' => $request->match_fixture_select_season_heading]);
            GeneralSetting::where(['name' => 'match_fixture_selected_week_heading' , 'type' => 'matchFixture'])->update(['value' => $request->match_fixture_selected_week_heading]);
            GeneralSetting::where(['name' => 'match_fixture_select_week_heading' , 'type' => 'matchFixture'])->update(['value' => $request->match_fixture_select_week_heading]);
                return redirect()->back()->with('success' , 'Match Fixture updated successfully');
            }

    }

    public function landing_count(Request $request) {
        if ($request->isMethod('put')) {
            $rules = array(
                'google_count'      => 'required',
                'facebook_count'      => 'required',

            );

        $fieldNames = array(
                'google_count'       => 'Google Count',
                'facebook_count'      => 'Facebook Count',

             );

        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($fieldNames);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{

            GeneralSetting::where(['name' => 'google_count' , 'type' => 'landing_count'])->update(['value' => $request->google_count]);
            GeneralSetting::where(['name' => 'facebook_count' , 'type' => 'landing_count'])->update(['value' => $request->facebook_count]);
            return redirect()->back()->with('success' , 'Landing counts updated successfully');
        }
        }
        else{
            $get_landing_counts = GeneralSetting::where('type', 'landing_count')->get()->toArray();
            $landing_counts = key_value('name', 'value', $get_landing_counts);
            return view('backend.site_setting.landing_count' , compact('landing_counts'));
        }


    }


    public  function editPonyExpressFlagFootball(Request $request) {
        if ($request->isMethod('put')) {

            $rules = array(
                // 'pony_page_image'      => 'required',
                'pony_page_zipcode_heading'     => 'required',
                'pony_page_button_text'         => 'required',
            );

            $fieldNames = array(
                // 'pony_page_image'       => 'Pony Page Image',
                'pony_page_zipcode_heading'      => 'zipcode heading',
                'pony_page_button_text'          => 'button',

             );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }else{
            $image_file     =   $request->file('pony_page_image');

            if ($image_file) {
                $image_filename = $image_file->getClientOriginalName();
                $success = $image_file->storeAs('public/images/general/' , $image_filename);
                if (!isset($success)) {
                    return back()->withError('Could not upload logo');
                }
                GeneralSetting::where(['name' => 'pony_page_image'])->update(['value' => $image_filename]);
            }

            GeneralSetting::where(['name' => 'pony_page_heading'])->update(['value' => $request->pony_page_heading]);
            GeneralSetting::where(['name' => 'pony_page_zipcode_heading'])->update(['value' => $request->pony_page_zipcode_heading]);
            GeneralSetting::where(['name' => 'pony_page_button_text'])->update(['value' => $request->pony_page_button_text]);
                return redirect()->back()->with('success' , 'Contact Page updated successfully');
            }
        }
        else {
            $get_pony_page_details = GeneralSetting::where('type', 'pony_page')->get()->toArray();
            $pony_page_details = key_value('name', 'value', $get_pony_page_details);

            return view('backend.pony_flag_football_backend' , compact('pony_page_details'));
        }


    }


}

