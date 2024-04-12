<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Product;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $productId = $this->product ? $this->product->id : null;
        if (request()->ismethod('post')) {
            $rules = [
                'product_name' => 'required',
                'product_image' => 'required',
                //   'product_image.*' => 'required|image|Mimes:jpeg,jpg,gif,png,webp,svg',
                //  'status' => 'required',
                //  'product_price' => 'required',
                'product_url' => 'required|unique:products,product_url',
                'product_type' => 'required',
                //  'product_type' => 'required',
            ];
        } elseif (request()->isMethod('put')) {
            $rules = [
                'product_name' => 'required',
                //  'product_image.*' =>  'image|Mimes:jpeg,jpg,gif,png,webp,svg',
                //  'status' => 'required',
                //  'product_price' => 'required',
                // 'product_url' => 'required',
                // 'product_url' => 'required|unique:products,product_url',
                'product_url' => [
                    'required',
                    Rule::unique('products', 'product_url')->ignore($productId),
                ],
                'product_type' => 'required',
                //  'image_check' => 'required',
            ];
        }
        return $rules;
    }

    public function prepareForValidation()
    {
        $productId = null;
        if ($this->product) {
            $productId = $this->product->id;
        }
        $this->merge([
            'product_url' => $this->generateUniqueProductUrl($this->product_name, $productId),
        ]);
    }

    protected function generateUniqueProductUrl($productName, $productId)
    {
        // Format the product name to create a unique URL
        $url = Str::slug($productName);

        // Check if the URL is unique, if not, append a number to make it unique
        $count = Product::where('product_url', $url)->where('id', '!=', $productId)->count();
        if ($count > 0) {
            $url = $url . '-' . (strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5))); // Append a number to make it unique
            // $url = $url . '-' . ($count + 1); // Append a number to make it unique
        }

        return $url;
    }


    // public function messages()
    // {
    //    return [
    //     'product_image.*.Mimes' => 'Images with jpeg, jpg, gif, png, webp, svg extensions are acceptable',
    //    ];

    // }
}
