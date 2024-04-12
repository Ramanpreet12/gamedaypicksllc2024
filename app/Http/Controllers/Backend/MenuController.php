<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_menus = Menu::get();
        // dd($get_menus);
        return view('backend.site_setting.menus.index' ,compact('get_menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentMenu = Menu::where('parent_id','0')->get();
        return view('backend.site_setting.menus.add',compact('parentMenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try{
            //print_r($request->all());exit;
             if ($request->isMethod('post')) {
                 $validator = Validator::make($request->all(), [
                     'title' => 'required',
                 ]);
                 if ($validator->fails()) {
                     return redirect()->back()->withErrors($validator)->withInput();
                 }else{
                 $data = array();
                     $data["title"]=$request->title;
                     $data["parent_id"] = empty($request->parent_id)? '0':$request->parent_id;
                    $data["status"]=$request->status;
                    $data["url"]=$request->url;
                    $data["type"]='menu';
                     $result=Menu::create($data);

                     if($result){
                         return redirect()->route('menu.index')->with('message_success','Menu Added Successfully');
                     }else{
                         return redirect()->route('menu.index')->with('message_error','Something went wrong');
                     }
                }

                 }else {
                     return view('backend.site_setting.menus.index');
             }
    //   }catch(\Exception $e){
    //       $e->getMessage();
    //  }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result =Menu::find($id);
        $parentMenu = Menu::where('parent_id','0')->get();
        return view('backend.site_setting.menus.edit', compact('result','parentMenu'));
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
                 ]);
                 if ($validator->fails()) {
                     return redirect()->back()->withErrors($validator)->withInput();
                 }else{
                 $data = array();

                     $data["title"]=$request->title;
                     $data["type"]='menu';
                     $data["parent_id"]=empty($request->parent_id)?'0':$request->parent_id;
                     $data["url"]=$request->url;
                     $data["status"]=$request->status;
                     $result=Menu::where('id',$id)->update($data);

                     if($result){
                         return redirect()->route('menu.index')->with('message_success','Menu Updated Successfully');
                     }else{
                         return redirect()->route('menu.index')->with('message_error','Something went wrong');
                     }
                }

                 }else {
                     return view('backend.site_setting.menus.index');
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
        // $del = Menu::find($id)->delete();
        // if($del){
        //     return redirect()->route('menu.index')->with('message_success','Menu Deleted Successfully');
        // }else{
        //     return redirect()->route('menu.index')->with('message_error','Something went wrong');
        // }
    }

    public function deleteMenu($id)
    {
        try {

            $menu =  Menu::find($id)->delete();
            if($menu){
                return redirect()->route('menu.index')->with('message_success','Menu Deleted Successfully');
            }else{
            return redirect()->route('banner.index')->with('message_error', 'Something went wrong!');
            }
        } catch (\Exception $e) {
            if (!empty($e)) {
            return redirect()->back()->with('message_error' , 'Something went wrong!');
            }
        }

    }




}
