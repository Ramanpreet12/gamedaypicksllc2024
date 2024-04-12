<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reviews;
use App\Models\SectionHeading;

class ReviewsController extends Controller
{

     public function section_heading(Request $request)
    {
        if ($request->isMethod('post')) {
                    $request->validate(['section_heading'=> 'required']);
                    if ($request->section_heading) {
                        SectionHeading::where('name' , 'Reviews')->update([
                            'value' => $request->section_heading,
                        ]);
                    }
                    else{
                        SectionHeading::where('name' , 'Reviews')->update([
                            'value' => 'Reviews'
                        ]);
                    }

        return redirect('admin/reviews')->with('success_msg' , 'Reviews Title updated successfully');
        }
    }

    public function index()
    {
        $get_reviews = Reviews::get();
        // dd($get_reviews);
        $reviewsHeading = SectionHeading::where('name' , 'Reviews')->first();
        return view('backend.reviews.index' , compact('get_reviews' ,'reviewsHeading'));
    }


    public function create()
    {
       //


    }

    public function store(Request $request)
    {
         //

         dd("hello1");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $review = Reviews::where('id' , $id)->first();
        return view('backend.reviews.edit' , compact('review'));
    }

    public function update(Request $request , $id)
    {
        if ($request->isMethod('put')) {

                $review =Reviews::where('id',$id)->update(['status' => $request->status]);
                return redirect()->route('reviews.index')->with('success_msg' , 'Reviews status updated successfully');;
            }
    }
    public function destroy($id)
    {

    }


    public function deleteReviews($id)
    {
        $review =  Reviews::find($id)->delete();
        if($review){
         return redirect()->route('reviews.index')->with('success_msg', 'Reviews deleted successfully');
        }else{
         return redirect()->route('reviews.index')->with('error_msg', 'Something went wrong');
        }
    }



}
