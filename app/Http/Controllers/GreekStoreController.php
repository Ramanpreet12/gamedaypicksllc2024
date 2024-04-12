<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GreekStore;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\GreekStoreVariation;
use App\Models\GreekOrder;
use App\Models\GreekOrderItem;
use App\Models\PaymentForGreekProduct;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Bootstrap\HandleExceptions;
use GuzzleHttp\Client;

use App\Mail\GreekStoreMail;
use Illuminate\Support\Facades\Mail;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class GreekStoreController extends Controller
{
    public function list()
    {
        return view('front.greek_store.greek_products_list');
    }

    public function listProductType(Request $request)
    {

        $parameter = $request->input('contentType');
        // $get_product = Product::with('greek_store_image', 'greek_store_variations')->where(['status' => 'active', 'product_type' => $parameter , 'store_type' => 'greek-store'])->orderBy('id', 'DESC')->get();
        $get_product = Product::with('product_images', 'product_variations')->where(['status' => 'active', 'product_type' => $parameter , 'store_type' => 'greek-store'])->orderBy('id', 'DESC')->get();

        // $get_product = Product::with(['product_images' => function($query) {
        //     $query->where('image_sort', 1); // Condition for the image_sort column
        // }, 'product_variations'])
        // ->where(['status' => 'active', 'product_type' => $parameter, 'store_type' => 'greek-store'])
        // ->orderBy('id', 'DESC')
        // ->get();
        // dd($get_product);

        
        return response()->json($get_product);
    }



    public function showGreekProduct($productUrl)
    {

        // Session::forget('buy_now_session');
        // Session::forget('shoppingCart');
        // $product = GreekStore::with('greek_store_image', 'greek_store_variations')->where('id', $id)->first();
        $product = Product::with('product_images', 'product_variations')->where(['product_url' => $productUrl , 'store_type' => 'greek-store'] )->first();

        if ($product != null) {
            $get_sizes = ProductVariation::with('productSize')->where(['product_id' => $product->id, 'status' => '1'])->orderBy('id', 'ASC')->get();

            // $get_sizes = GreekStoreVariation::with('productSize')->where(['greek_store_id' => $id, 'status' => '1'])->orderBy('id', 'ASC')->get();
        }
        else {
            return redirect()->route('no-product-found');
        }

        // get all the products to show in slider at the bottom
        $get_product = Product::with('product_images', 'product_variations')->where(['status' => 'active', 'store_type' => 'greek-store'])->get();

        // $get_product = GreekStore::with('greek_store_image', 'greek_store_variations')->where(['status' => 'active'])->get();
        return view('front.greek_store.show_greek_product', compact('get_product', 'product', 'get_sizes'));
    }

    public function getGreekProductPrice(Request $request)
    {
        // $product = GreekStoreVariation::where(['greek_store_id' => $request->input('product_id'), 'size_id' => $request->input('size_id')])->first();
        $product = ProductVariation::where(['product_id' => $request->input('product_id'), 'size_id' => $request->input('size_id')])->first();
        return response()->json(['product' => $product]);
    }


}
