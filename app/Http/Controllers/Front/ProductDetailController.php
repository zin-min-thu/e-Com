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
        $productDetail = Product::with(['category','brand','attributes','images'])->where('id', $id)->first()->toArray();

        $total_stock = collect($productDetail['attributes'])->sum('stock');

        $relatedProducts = Product::where('category_id', $productDetail['category']['id'])
                                ->where('id','!=',$productDetail['id'])
                                ->inRandomOrder()
                                ->limit(3)
                                ->get()->toArray();

        return view('front.product.detail', compact('productDetail','total_stock','relatedProducts'));
    }

    public function changePrice(Request $request)
    {
        $data = $request->all();
        $getAttribute = ProductAttribute::where(['product_id' => $data['product_id'], 'size' => $data['size']])->first();
        return $getAttribute->price;
    }
}
