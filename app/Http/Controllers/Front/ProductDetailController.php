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
        $productDetail = Product::with(['category','brand','attributes' => function($query) {
                                $query->where('status',1);
                            },'images'])
                            ->where('id', $id)->first();

        $total_stock = collect($productDetail['attributes'])->sum('stock');

        $relatedProducts = Product::where('category_id', $productDetail['category']['id'])
                                ->where('id','!=',$productDetail['id'])
                                ->inRandomOrder()
                                ->limit(3)
                                ->get()->toArray();

        return view('front.products.detail', compact('productDetail','total_stock','relatedProducts'));
    }

    public function changePrice(Request $request)
    {
        $data = $request->all();
        $getAttribute = Product::getAttrDiscountedPrice($data['product_id'],$data['size']);

        return $getAttribute;
    }
}
