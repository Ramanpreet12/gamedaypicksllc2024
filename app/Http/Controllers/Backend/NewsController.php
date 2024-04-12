<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\News;
use App\Http\Requests\NewsRequest;
use App\Models\SectionHeading;
use Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function section_heading(Request $request)
     {
         if ($request->isMethod('post')) {
            $request->validate(['section_heading'=> 'required']);
             SectionHeading::where('name' , 'News')->update([
                         'value' => $request->section_heading,
                     ]);
         return redirect('admin/news')->with('message_success' , 'News Title updated successfully');
         }
     }


    public function index(Request $request)
    {
        $query_array = $request->query();
        //$section=$query_array["section"];
        $NewsHeading = SectionHeading::where('name' , 'News')->first();
        $get_news = News::get();
        return view('backend.site_setting.news.index' , compact('NewsHeading' , 'get_news'));
    }

    public function news_data(){
        $news_data = News::where('type',"news")->paginate(6);

        return response()->json($news_data, 200);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.site_setting.news.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        try{
           //print_r($request->all());exit;

                $data = array();
                 if($request->hasfile('image')){
                        $file = $request->image;
                        // $destinationPath = public_path(). '/homeSetting/';

                        $filename =  'news'.time() . '.' .$file->getClientOriginalName();
                        // $file->move($destinationPath, $filename);
                        $file->storeAs('public/images/news/' , $filename);

                        //$image_path = $request->file('image')->store('image', 'public');
                        $data['image'] = $filename;
                    }
                    $data["title"]=$request->title;
                    $data["header"] = $request->header;
                    $data["type"]='news';
                    $data["description"]=$request->description;
                     $data["status"]=$request->status;
                    $result=News::create($data);

                    if($result){
                        return redirect()->route('news.index')->with('message_success','News Added Successfully');
                    }else{
                        return redirect()->route('news.index')->with('message_error','Something went wrong');
                    }
               }

               catch(\Exception $e){
         $e->getMessage();
    }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $news = News::find($id);
        return view('backend.site_setting.news.edit',compact('news'));
    }

    public function update(NewsRequest $request, $id)
    {
        try{
            //print_r($request->all());exit;

                 $data = array();
                  if($request->hasfile('image')){
                         $file = $request->image;
                        //  $destinationPath = public_path(). '/homeSetting/';
                        $filename =  'news'.time() . '.' .$file->getClientOriginalName();
                        //  $file->move($destinationPath, $filename);
                        $file->storeAs('public/images/news/' , $filename);

                         $data['image'] = $filename;
                     } else{
                        return back()->withError('Could not upload Banner');
                        // unset($data['image'] );
                     }
                     $data["title"]=$request->title;
                     $data["header"] = $request->header;
                     $data["type"]='news';
                     $data["description"]=$request->description;
                     $data["status"]=$request->status;
                     $result=News::where('id',$id)->update($data);

                     if($result){
                         return redirect()->route('news.index')->with('message_success','News Updated Successfully');
                     }else{
                         return redirect()->route('news.index')->with('message_error','Something went wrong');
                     }



      }catch(\Exception $e){
          $e->getMessage();
     }
    }

    public function destroy($id)
    {
        // $del = News::find($id)->delete();
        // if($del){
        //     return redirect()->route('news.index')->with('message_success','News Deleted Successfully');
        // }else{
        //     return redirect()->route('news.index')->with('message_error','Something went wrong');
        // }
    }

    public function deleteNews($id)
    {
        try {
            //get Image
         $news_image = News::whereId($id)->first();

         $Images_path = storage_path('app/public/images/news/');

          //delete image from folder
            unlink_image_video_from_db($Images_path , $news_image->image);

            $news =  News::find($id)->delete();
            if($news){
                return redirect()->route('news.index')->with('success' , 'News deleted successfully');
            }else{
            return redirect()->route('news.index')->with('message_error', 'Something went wrong!');
            }
        } catch (\Exception $e) {
            if (!empty($e)) {
            return redirect()->back()->with('message_error' , 'Something went wrong!');
            }
        }

    }

}
