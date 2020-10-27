<?php

namespace App\Http\Controllers\Front;

use App\Product;
use App\ProductAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function detail($id)
    {
        $product = Product::with(['brand','attributes','images'])->where('id', $id)->first()->toArray();

        $total_stock = collect($product['attributes'])->sum('stock');

        return view('front.product.detail', compact('product','total_stock'));
    }

    public function changePrice(Request $request)
    {
        $data = $request->all();
        $getAttribute = ProductAttribute::where(['product_id' => $data['product_id'], 'size' => $data['size']])->first();
        return $getAttribute->price;
    }
}
