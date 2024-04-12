<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query_array = $request->query();
        //$section=$query_array["section"];
        return view('backend.home_setting.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.home_setting.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\ResponseResult
     */
    public function store(Request $request)
    {
        try{
           //print_r($request->all());exit;
            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(), [
                    'title' => 'required',
                    'header' => 'required',
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }else{
                $data = array(); 
                 if($request->hasfile('image')){
                        $file = $request->image;
                        $destinationPath = public_path(). '/homeSetting/';
                        $filename = date('YmdHis') . "." .$file->getClientOriginalName();
                        $file->move($destinationPath, $filename);
                        //$image_path = $request->file('image')->store('image', 'public');
                        $data['image'] = $filename;
                    }    
                    $data["title"]=$request->title;
                    $data["header"] = $request->header;
                    $data["type"]='news';
                    $data["description"]=$request->description;
                     $data["status"]=$request->status;
                    $result=HomeSetting::create($data);

                    if($result){
                        return redirect()->route('homeSetting.index')->with('message_success','New Record Added Successfully');
                    }else{
                        return redirect()->route('homeSetting.index')->with('message_error','Something went wrong');
                    }
               }

                }else {
                    return view('backend.home_setting.index');
            }
     }catch(\Exception $e){
         $e->getMessage();
    }
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
        $homeSetting = HomeSetting::find($id);
        return view('backend.home_setting.edit',compact('homeSetting'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            //print_r($request->all());exit;
             if ($request->isMethod('put')) {
                 $validator = Validator::make($request->all(), [
                     'title' => 'required',
                     'header' => 'required',
                     //'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                 ]);
                 if ($validator->fails()) {
                     return redirect()->back()->withErrors($validator)->withInput();
                 }else{
                 $data = array(); 
                  if($request->hasfile('image')){
                         $file = $request->image;
                         $destinationPath = public_path(). '/homeSetting/';
                         $filename = date('YmdHis') . "." .$file->getClientOriginalName();
                         $file->move($destinationPath, $filename);
                         $data['image'] = $filename;
                     } else{
                        unset($data['image'] );
                     }   
                     $data["title"]=$request->title;
                     $data["header"] = $request->header;
                     $data["type"]='news';
                     $data["description"]=$request->description;
                     $data["status"]=$request->status;
                     $result=HomeSetting::where('id',$id)->update($data);
 
                     if($result){
                         return redirect()->route('homeSetting.index')->with('message_success','New Record Added Successfully');
                     }else{
                         return redirect()->route('homeSetting.index')->with('message_error','Something went wrong');
                     }
                }
 
                 }else {
                     return view('backend.home_setting.index');
             }
      }catch(\Exception $e){
          $e->getMessage();
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = HomeSetting::find($id)->delete();
        if($del){
            return redirect()->route('homeSetting.index')->with('message_success','Reocrd Deleted Successfully'); 
        }else{
            return redirect()->route('homeSetting.index')->with('message_error','Something went wrong'); 
        }
    }


    public function homeSettingList(){
        $result = HomeSetting::where('type',"news")->paginate(6);        
        return response()->json($result, 200); 
    }
}
