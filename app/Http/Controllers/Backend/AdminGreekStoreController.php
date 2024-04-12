<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GreekStoreImage;
use App\Models\GreekStore;
use App\Models\GreekStoreVariation;
use App\Models\ProductSize;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Http\Requests\ProductRequest;

// use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bootstrap\HandleExceptions;
use App\Exceptions\Handler;

use App\Http\Requests\GreekStoreRequest;
use App\Rules\WholeNumber;

class AdminGreekStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_products = Product::with('product_images')->where('store_type' , 'greek-store')->orderBy('id', 'DESC')->get();

        return view("backend.admin_greek_store.index", compact('get_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.admin_greek_store.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // $url = URL::current();
        $firstSegment = $request->segment(3);
        if( $firstSegment == 'greek-store'){

            $store_type = 'greek-store';
        }else{
            $store_type = '';
        }

        DB::beginTransaction();

        try {
            $product = Product::create([
                'store_type' => $store_type,
                'product_name' => $request->product_name,
                'product_url' => $request->product_url,
                'product_type' => $request->product_type,
                // 'price' =>  $request->product_price,
                'description' => $request->description,
                'product_details' => $request->product_details,
                'product_color' => $request->product_color,
                'university_sale_text' => $request->university_sale_text,
                'sale_goes_back_to_university' => $request->sale_goes_back_to_university,
                'status' => 'inactive',
            ]);

            // Extensions to check
            $allowedfileExtension = ['jpeg', 'jpg', 'png', 'gif', 'webp', 'svg'];

            if ($request->hasFile('product_image')) {
                $product_images = $request->file('product_image');

                foreach ($product_images as $key => $product_image) {
                    $extension = $product_image->getClientOriginalExtension();
                    $check = in_array($extension, $allowedfileExtension);
                    // Checking the image extension
                    if (!$check) {
                        DB::rollback();
                        return redirect()->back()->with('message_error', 'Images must be jpeg, jpg, png, gif, webp, svg!');
                    }

                    $product_image_name = rand(1111, 9999) . '-' . $product_image->getClientOriginalName();
                    $product_image_file_name = str_replace(" ", "-", $product_image_name);
                    $product_image->storeAs('public/images/products/', $product_image_file_name);

                    if ($key == 0) {
                        $sortvalue = '1';
                    } else {
                        $sortvalue = '0';
                    }
                    // Insert images in product images table
                    $create_product_image = ProductImage::create([
                        'product_id' => $product->id,
                        'image_name' => $product_image_file_name,
                        'image_sort' => $sortvalue,
                        // 'status' =>'active'
                    ]);

                     // update the product table with primary image (selected image with sort value = 1)
                     $getProductImage = ProductImage::where(['image_sort' => '1' , 'product_id' => $product->id])->first();

                     Product::where('id' , $product->id)->update(['product_image' => $getProductImage->image_name]);
                }
            }

            if ($create_product_image->id > 0) {
                DB::commit();
            } else {
                DB::rollback();
            }
            return redirect('admin/products/greek-store/add-variants/' . $product->id)->with('success', 'Product added successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('message_error', "Something went wrong!");
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
        $product = Product::with('product_images')->where('store_type' , 'greek-store')->find($id);
        $get_product_variations = ProductVariation::where('product_id', $id)->with('productSize')->orderBy('id', 'desc')->get();
        $get_variation_count = ProductVariation::where('product_id', $id)->get()->count();
        return view('backend.admin_greek_store.edit', compact('product', 'get_product_variations', 'get_variation_count'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

        $firstSegment = $request->segment(3);

        if( $firstSegment == 'greek-store'){

            $store_type = 'greek-store';
        }else{
            $store_type = '';
        }

        try {

            $product = Product::where('id', $id)->update([
                'store_type' => $store_type,
                'product_name' => $request->product_name,
                'product_url' => $request->product_url,
                'product_type' => $request->product_type,
                // 'price' =>  $request->product_price,
                'description' => $request->description,
                'product_details' => $request->product_details,
                'product_color' => $request->product_color,
                'university_sale_text' => $request->university_sale_text,
                'sale_goes_back_to_university' => $request->sale_goes_back_to_university,
                'status' => $request->status,
            ]);
            // Extensions to check
            $allowedfileExtension = ['jpeg', 'jpg', 'png', 'gif', 'webp', 'svg'];


            if ($request->hasFile('product_image')) {
                $product_images = $request->file('product_image');
                foreach ($product_images as $key => $product_image) {
                    $extension = $product_image->getClientOriginalExtension();
                    $check = in_array($extension, $allowedfileExtension);
                    // Checking the image extension
                    if (!$check) {
                        return redirect()->back()->with('message_error', 'Images must be jpeg, jpg, png, gif, webp, svg!');
                    }

                    $product_image_name = rand(1111, 9999) . '-' . $product_image->getClientOriginalName();
                    $product_image_file_name = str_replace(" ", "-", $product_image_name);
                    $product_image->storeAs('public/images/products/', $product_image_file_name);


                    // get the number of images coming in request (array count)
                    if (count($product_images) == 1) {
                        $sortvalue = '1';
                        ProductImage::where('product_id', '=', $id)->update([
                            'image_sort' => '0'
                        ]);
                        ProductImage::where('id', $request->product_images)->update([
                            'image_sort' => '1'
                        ]);

                    } elseif (count($product_images) > 1) {
                        if ($key == 0) {
                            ProductImage::where('product_id', '=', $id)->update([
                                'image_sort' => '0'
                            ]);
                            $sortvalue = '1';
                        } else {
                            $sortvalue = '0';
                        }
                    }

                    // Insert images in product images table
                    $create_product_image = ProductImage::create([
                        'product_id' => $id,
                        'image_name' => $product_image_file_name,
                        'image_sort' => $sortvalue,
                        // 'status' =>'active'
                    ]);
                }

                return redirect()->back()->with('success', 'Product Images updated successfully');
            }

            // select image
            ProductImage::where('product_id', '=', $id)->update([
                'image_sort' => '0'
            ]);

            ProductImage::where('id', $request->image_check)->update([
                'image_sort' => '1'
            ]);

             // update the products table with primary image (selected image with sort value = 1)
             $getProductImage = ProductImage::where(['image_sort' => '1' , 'product_id' => $id])->first();

             Product::where('id' , $id)->update(['product_image' => $getProductImage->image_name]);


            return redirect()->route('greek-store.index')->with('success', 'Product updated successfully');


        } catch (\ErrorException $e) {

            return redirect()->back()->with('message_error', $e->getMessage());
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
        //
    }

    public function deleteGreekStoreProduct($id)
    {
        $product = Product::find($id);

        if ($product) {
            $delete_product = $product->delete();
            if ($delete_product) {
                $get_images = ProductImage::where('product_id', '=', $product->id)->delete();
                $get_product_variation = ProductVariation::where('product_id', '=', $product->id)->delete();

                return redirect()->route('greek-store.index')->with('success', 'Product deleted successfully');
            }
        } else {
            return redirect()->route('greek-store.index')->with('message_error', 'Something went wrong');
        }
    }



    public function deleteGreekStoreProductImage($id)
    {

        //get Image
        $product_image = ProductImage::whereId($id)->first();

        // check if user is trying to delete the selected image with image_Sort value 1 (front image)

        if ($product_image->image_sort == 1) {
            return redirect()->back()->with('message_error', "Can't delete the Index image ! First make another image as index image then delete it.");
        }

        $Images_path = storage_path('app/public/images/products/');

        // // delete image folder
        unlink_image_video_from_db($Images_path, $product_image->image_name);

        // delete from db
        ProductImage::whereId($id)->delete();
        return redirect()->back()->with('success', 'Product Image deleted successfully');
    }


    // add variants
    public function addGreekVariant(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'size_id' => 'required',
                'product_price' => ['required'],
                'product_quantity' => 'required|numeric|min:1',
            ]);
            $count_size = ProductVariation::where(['product_id' => $id, 'size_id' => $request->size_id,])->count();

            if ($count_size > 0) {
                return back()->withErrors(['size_id' => 'Size already exists! Please try another size.'])->withInput();
            }
            $product_variation = ProductVariation::create([
                'product_id' => $id,
                'size_id' => $request->size_id,
                'product_price' => $request->product_price,
                'product_quantity' => $request->product_quantity,
                'status' => $request->status
            ]);
            if ($product_variation->id > 0) {
                // update product status
                Product::where('id', $id)->update(['status' => 'active']);
            }
            return redirect()->back()->with('success', 'Product Variations Added Successfully');
        } else {

            $get_product = Product::find($id);
            $get_sizes = ProductSize::orderBy('id', 'desc')->get();
            $get_variation_count = ProductVariation::where('product_id', $id)->get()->count();

            return view('backend.admin_greek_store.add_greek_variants', compact('get_product', 'get_sizes', 'id', 'get_variation_count'));
        }
    }

    public function editGreekVariant(Request $request, $product_id, $variant_id)
    {

        if ($request->isMethod('put')) {
            $productVariation = ProductVariation::findOrFail($variant_id);
            
            if ($request->size_id != $productVariation->size_id) {
                // Check if the new size_id is unique among all products
                $existingProduct = ProductVariation::where('size_id', $request->size_id)
                                          ->where('product_id', '!=', $product_id)
                                          ->exists();
        
                // If the size_id belongs to another product, return an error
                if ($existingProduct) {
                    return redirect()->back()->withErrors(['size_id' => 'This size is already assigned to this product! Please try another size.']);
                }
            }

            $validated = $request->validate([
                'size_id' => 'required',
                'product_price' => ['required'],
                'product_quantity' => 'required|numeric|min:1',
            ]);
            ProductVariation::where(['product_id' => $product_id, 'id' => $variant_id])->update([
                'product_id' => $product_id,
                'size_id' => $request->size_id,
                'product_price' => $request->product_price,
                'product_quantity' => $request->product_quantity,
                'status' => $request->status
            ]);
            return redirect()->route('greek-store.edit' ,$product_id )->with('success', 'Product Variations updated Successfully');

        } else {
            $get_product_variant = ProductVariation::where('product_id', $product_id)->find($variant_id);
            $get_sizes = ProductSize::orderBy('id', 'desc')->get();
            return view('backend.admin_greek_store.edit_greek_variants', compact('get_product_variant', 'get_sizes', 'product_id', 'variant_id' ));
        }
    }


    public function deleteGreekProductVariant($variant_id)
    {
        $product_variation = ProductVariation::find($variant_id);
        $get_variation_count = ProductVariation::where('product_id', $product_variation->product_id, )->get()->count();

        if ($get_variation_count == 1) {
            $product_variation->delete();
            // update product status
            Product::where('id', $product_variation->product_id)->update(['status' => 'inactive']);
            return redirect()->back()->with('message_error', 'This Product has been deactivated as there is no variation ! Please add at least one variation.');
        } else {
            $product_variation->delete();
        }

        // dd($product_variation);
        if ($product_variation) {
            return redirect()->back()->with('success', 'Product Variation deleted successfully');
        } else {
            return redirect()->back()->with('message_error', 'Something went wrong');
        }
    }
}
