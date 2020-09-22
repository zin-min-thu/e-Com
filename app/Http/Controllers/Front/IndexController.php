<?php

namespace App\Http\Controllers\Front;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $getProducts = Product::where('is_featured', 'Yes')->get()->toArray();
        $featuredCount = count($getProducts);
        $featureItemsChunk = array_chunk($getProducts, 4);

        return view('front.index', [
            'page_name' => "index",
            'featureItemsChunk' => $featureItemsChunk,
            'featuredCount' => $featuredCount,
        ]);
    }
}
