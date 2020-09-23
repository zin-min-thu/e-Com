<?php

namespace App\Http\Controllers\Front;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        // Get Featured Products
        $getProducts = Product::where(['is_featured' => 'Yes', 'status' => 1])->get();
        $featuredCount = $getProducts->count();
        $featureItemsChunk = array_chunk($getProducts->toArray(), 4);

        // Get Latest Products
        $latestProducts = Product::orderBy('id', 'Desc')->where('status', 1)->limit(6)->get()->toArray();

        $page_name = "index";

        return view('front.index', compact('page_name','featureItemsChunk','featuredCount','latestProducts'));
    }
}
