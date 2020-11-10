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

        $featureItemsChunk = $getProducts->chunk(4);

        $latestProducts = Product::orderBy('id', 'Desc')->where('status', 1)->limit(6)->get();

        $page_name = "index";

        return view('front.index', compact('page_name','featureItemsChunk','featuredCount','latestProducts'));
    }
}
