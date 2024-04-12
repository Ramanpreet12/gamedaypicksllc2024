<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminJersey;
use App\Models\AdminJerseyImage;
use App\Http\Requests\JerseyRequest;

class AdminJerseyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $admin_jersey =  AdminJersey::with('jersey_images')->orderBy('id' , 'DESC')->get();
    //    dd($admin_jersey);
        return view('backend.jerseys.index' , compact('admin_jersey'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.jerseys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JerseyRequest $request)
    {


            $admin_jersey =  AdminJersey::create([
                'jersey_name' =>  $request->jersey_name,
                'jersey_url' =>  $request->jersey_url,
                'jersey_type' =>  $request->jersey_type,
                'price' =>  $request->jersey_price,
                'description' =>  $request->description,
                'jersey_details' =>  $request->jersey_details,
                'jersey_color' =>  $request->jersey_color,
                'status' =>  $request->status,
            ]);


            if ($request->hasFile('jersey_image')) {
                $jersey_images = $request->file('jersey_image');


                foreach ($jersey_images as $key => $jersey_image) {
                  $jersey_image_name = rand(1111, 9999).'-'.$jersey_image->getClientOriginalName();
                  $jersey_image_file_name = str_replace( " ", "-", $jersey_image_name );
                  $jersey_image->storeAs('public/images/jerseys/' , $jersey_image_file_name);


                    // Insert images in product images table
                  $create_jerseys_image=  AdminJerseyImage::create([
                        'admin_jersey_id' => $admin_jersey->id,
                        'image_name' => $jersey_image_file_name,
                        // 'status' =>'active'
                    ]);
                }
            }

            return redirect()->route('jerseys.index')->with('success' , 'Jersey added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin_jersey = AdminJersey::with('jersey_images')->find($id);
        // dd($admin_jersey);
        return view('backend.jerseys.edit', compact('admin_jersey'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JerseyRequest $request, $id)
    {
        // $image     =   $request->file('image');
        // if ($image) {
        //     // $extension =   $image->getClientOriginalExtension();
        //     // $filename  =   'teamimage_'.time() . '.' . $extension;
        //     $filename = $image->getClientOriginalName();
        //     $image_file_name = str_replace( " ", "-", $filename );
        //     $success = $image->storeAs('public/images/jerseys/' , $image_file_name);
        //     if (!isset($success)) {
        //         return back()->withError('Could not upload image');
        //     }
        //     $data["image"]=$image_file_name;
        // }
        // $data["name"]=$request->name;
        // $data["jersey_url"]=$request->jersey_url;
        // $data["jersey_type"]=$request->jersey_type;
        // // $data["image"]=$image_file_name;
        // $data["price"]=$request->price;
        // $data["description"]=$request->description;
        // $data["status"]=$request->status;
        // $result=AdminJersey::where('id',$id)->update($data);

        $admin_jersey =  AdminJersey::where('id',$id)->update([
            'jersey_name' =>  $request->jersey_name,
            'jersey_url' =>  $request->jersey_url,
            'jersey_type' =>  $request->jersey_type,
            'price' =>  $request->jersey_price,
            'description' =>  $request->description,
            'jersey_details' =>  $request->jersey_details,
            'jersey_color' =>  $request->jersey_color,
            'status' =>  $request->status,
        ]);


        if ($request->hasFile('jersey_image')) {
            $jersey_images = $request->file('jersey_image');

            foreach ($jersey_images as $key => $jersey_image) {
              $jersey_image_name = rand(1111, 9999).'-'.$jersey_image->getClientOriginalName();
              $jersey_image_file_name = str_replace( " ", "-", $jersey_image_name );
              $jersey_image->storeAs('public/images/jerseys/' , $jersey_image_file_name);


                // Insert images in product images table
              $create_jerseys_image=  AdminJerseyImage::create([
                    'admin_jersey_id' => $id,
                    'image_name' => $jersey_image_file_name,
                    // 'status' =>'active'
                ]);
            }
        }

        return redirect()->route('jerseys.index')->with('success' , 'Jersey updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function deleteJersey($id)
    {
        $admin_jersey =  AdminJersey::find($id)->delete();
        if($admin_jersey){
            return redirect()->route('jerseys.index')->with('success' , 'Jersey deleted successfully');
        }else{
         return redirect()->route('team.index')->with('error_msg', 'Something went wrong');
        }

    }




    public function deleteJerseyImage($id){
        //get Image
        $jersey_image = AdminJerseyImage::whereId($id)->first();


        $Images_path = storage_path('app/public/images/jerseys/');


        // // delete image folder
        unlink_image_video_from_db($Images_path , $jersey_image->image_name);

         // delete from db
         AdminJerseyImage::whereId($id)->delete();
         return redirect()->back()->with('success' , 'Jersey Image deleted successfully');
    }
}
