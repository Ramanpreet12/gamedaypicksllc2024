<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductSizeRequest;
use App\Models\ProductSize;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_product_Sizes = ProductSize::orderBy('id' , 'desc')->get();
        return view('backend.product_sizes.index', compact('get_product_Sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product_sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductSizeRequest $request)
    {
         // check if size already exists
         $count_size = ProductSize::where(['product_size' => $request->product_size,])->count();

         if ($count_size>0) {
            return redirect()->back()->with('message_error','Size already exists! Please try another size.');
         }

        ProductSize::create([

            'product_size' => $request->product_size,
            'status' => $request->status
        ]);
        return redirect()->route('product-sizes.index')->with('success' , 'Product Size added successfully');
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
        $product_size = ProductSize::find($id);

        return view('backend.product_sizes.edit', compact('product_size' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductSizeRequest $request, $id)
    {
        ProductSize::where('id' , $id)->update([

            'product_size' => $request->product_size,
            'status' => $request->status
        ]);
        return redirect()->route('product-sizes.index')->with('success' , 'Product Size updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteProductSize($id)
    {
        $product_size =  ProductSize::find($id)->delete();
        if($product_size){
            return redirect()->route('product-sizes.index')->with('success' , 'Product sizes deleted successfully');
        }else{
         return redirect()->route('product-sizes.index')->with('message_error', 'Something went wrong');
        }

    }
}
