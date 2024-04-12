<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Prize;

use App\Models\Season;

use App\Http\Requests\PrizeRequest;

use Illuminate\Support\Str;

use App\Models\General;

use App\Models\SectionHeading;

class PrizeController extends Controller

{

    public function section_heading(Request $request) {

        if ($request->isMethod('post')) {
                    $request->validate(['section_heading'=> 'required']);

            if ($request->section_heading) {

                SectionHeading::where('name' , 'Prize')->update([

                    'value' => $request->section_heading,

                ]);
            }
            else{
                SectionHeading::where('name' , 'Prize')->update([
                    'value' => 'Prize'
                ]);

            }
                    return redirect()->route('prize.index')->with('success_msg' , 'Prize Heading updated successfully');
        }
     }


    public function index(){

        $prizes = Prize::with('season')->get();

        $get_prize_banner = General::select('prize_banner','selected_option','youtubelink')->first();

        $prizeHeading = SectionHeading::where('name' , 'Prize')->first();

        return view('backend.prize.index' , compact('prizes' , 'get_prize_banner' , 'prizeHeading'));

    }


    public function create(){

        $seasons = Season::get();

        return view('backend.prize.create' , compact('seasons'));

    }

    public function store(PrizeRequest $request){
        // try{
           if ($request->isMethod('post')) {

               $input = $request->all();

               if ($request->hasFile('image')) {

                    $image_file = $request->file('image');

                    $image_filename =  'prize'.rand(1111, 9999).'-'.time() . '-' .$image_file->getClientOriginalName();
                    $formatted_image_filename = str_replace( " ", "-", $image_filename );
                    // $image_filename = $image_file->getClientOriginalName();

                    $image_file->storeAs('public/images/prize/' , $formatted_image_filename);

                    $input['image'] = $formatted_image_filename;

                }
               $prize = Prize::create($input);

               if($prize){
                   return redirect()->route('prize.index')->with('success_msg', 'Prize created successfully');
               }
               else{
                   return redirect()->route('prize.index')->with('error_msg', 'Something went wrong');
               }



           }

    //    }catch(\Exception $e){

    //        $e->getMessage();

    //    }

   }

    public function edit($id){

        $seasons = Season::get();

        $prize = Prize::find($id);

        return view('backend.prize.edit', compact('seasons' , 'prize'));

    }

    public function show($id){

    }

    public function update(PrizeRequest $request, $id){

        // try{

            if ($request->isMethod('put')) {

                $data = array();
                    $image_file     =   $request->file('image');

                    if ($image_file) {

                        $image_filename =  'prize'.rand(1111, 9999).'-'.time() . '-' .$image_file->getClientOriginalName();
                        $formatted_image_filename = str_replace( " ", "-", $image_filename );

                        // $image_filename = $image_file->getClientOriginalName();

                        $success = $image_file->storeAs('public/images/prize/' , $formatted_image_filename);

                        if (!isset($success)) {
                            return back()->withError('Could not upload logo');
                        }

                        $data["image"]=$formatted_image_filename;

                    }

                    $data["season_id"]=$request->season_id;

                    $data["name"]=$request->name;

                    $data["amount"]=$request->amount;

                    $data["content"]=$request->content;
                    $data["prize_date"]=$request->prize_date;
                    $data["status"]=$request->status;
                    $prize=Prize::where('id',$id)->update($data);

                    if($prize){
                        return redirect()->route('prize.index')->with('success_msg', 'Prize updated successfully');
                    }
                    else{
                        return redirect()->route('prize.index')->with('error_msg', 'Something went wrong');
                    }

                }

            // }catch(\Exception $e){

            //     $e->getMessage();

            // }

    }

    public function destroy($id){

        // $prize =  Prize::find($id)->delete();
        // if($prize){
        //  return redirect()->route('prize.index')->with('success_msg', 'Prize deleted successfully');
        // }else{
        //  return redirect()->route('prize.index')->with('error_msg', 'Something went wrong');
        // }
     }


     public function deletePrize($id)
    {
        try {
            //get Image
         $prize_image = Prize::whereId($id)->first();
         $Images_path = storage_path('app/public/images/prize/');
        if ($prize_image->image == '' || $prize_image->image == null) {
            $prize =  Prize::find($id)->delete();

            if($prize){
                return redirect()->route('prize.index')->with('success' , 'Prize deleted successfully');
            }else{
            return redirect()->route('prize.index')->with('message_error', 'Something went wrong!');
            }

        } else {
              //delete image from folder
              unlink_image_video_from_db($Images_path , $prize_image->image);
            $prize =  Prize::find($id)->delete();

            if($prize){
                return redirect()->route('prize.index')->with('success' , 'Prize deleted successfully');
            }else{
            return redirect()->route('prize.index')->with('message_error', 'Something went wrong!');
            }
        }




        } catch (\Exception $e) {

            if (!empty($e)) {
            return redirect()->back()->with('message_error' , 'Something went wrong!');
            }
        }

    }


}

