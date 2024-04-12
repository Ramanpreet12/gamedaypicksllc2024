<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Http\Requests\ProductVariationRequest;

class ProductVariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_product_variations = ProductVariation::with('product')->orderBy("created_at","desc")->get();
        return view("backend.product-variation.index" , compact("get_product_variations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $get_products = Product::orderBy("id","desc")->get();
        return view("backend.product-variation.create" ,compact("get_products"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductVariationRequest $request)
    {
        // check if size already exists
        $count_size = ProductVariation::where(['product_id' => $request->product_id,'product_size' => $request->product_size,])->count();

        if ($count_size>0) {
           return redirect()->back()->with('message_error','Size already exists! Please try another size.');
        }
        ProductVariation::create([
            'product_id' => $request->product_id,
            'product_size' => $request->product_size,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'status' => $request->status
        ]);
        return redirect()->route('product-variations.index')->with('success' , 'Product Variations Added Successfully');
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
        $product_variation = ProductVariation::with('product')->find($id);
        $get_products = Product::orderBy("id","desc")->get();
        // dd($product);
        return view('backend.product-variation.edit', compact('product_variation' ,'get_products' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductVariationRequest $request, $id)
    {
        ProductVariation::where('id' ,$id)->update([
            'product_id' => $request->product_id,
            'product_size' => $request->product_size,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'status' => $request->status
        ]);
        return redirect()->route('product-variations.index')->with('success' , 'Product Variations updated Successfully');
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

    public function deleteProductVariation($id)
    {
        $product_variation =  ProductVariation::find($id)->delete();
        if($product_variation){
            return redirect()->route('product-variations.index')->with('success' , 'Product Variation deleted successfully');
        }else{
         return redirect()->route('product-variations.index')->with('message_error', 'Something went wrong');
        }

    }

}
