<?php

namespace App\Http\Controllers\Front;

use App\Product;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listing($url)
    {
        $categoryCount = Category::where(['url' => $url, 'status' => 1])->count();

        if($categoryCount > 0) {
            $categoryDetails = Category::getCategoryDetails($url);
            $productLists = Product::whereIn('category_id', $categoryDetails['catIds'])
                            ->where('status', 1)       
                            ->get();
        } else {
            abort(404);
        }

        return view('front.product.listing', compact('categoryDetails','productLists'));
    }
}
