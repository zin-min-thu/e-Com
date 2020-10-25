<?php

namespace App\Http\Controllers\Front;

use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function detail($id)
    {
        $product = Product::with(['brand','attributes','images'])->where('id', $id)->first()->toArray();

        return view('front.product.detail', compact('product'));
    }
}
