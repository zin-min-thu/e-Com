<?php

namespace App\Http\Controllers\Front;

use App\Product;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listing($url, Request $request)
    {
        if($request->ajax()) {

            $data = $request->all();
            $url = $data['url'];

            $categoryCount = Category::where(['url' => $url, 'status' => 1])->count();
            if($categoryCount > 0) {

                $categoryDetails = Category::getCategoryDetails($url);

                $productLists = Product::whereIn('category_id', $categoryDetails['catIds'])
                                ->with('brand')
                                ->where('status', 1);

                if(!empty($data['sort'])) {
                    switch ($data['sort']) {
                        case 'latest' :
                            $productLists->orderBy('id', 'Desc');
                            break;
                        case 'name_a_z' :
                            $productLists->orderBy('name', 'Asc');
                            break;
                        case 'name_z_a' :
                            $productLists->orderBy('name', 'Desc');
                            break;
                        case 'lowest_price' :
                            $productLists->orderBy('price', 'Asc');
                            break;
                        case 'higest_price' :
                            $productLists->orderBy('price', 'Desc');
                            break;
                        default:
                            $productLists->orderBy('id', 'Desc');
                    }
                } else {
                    $productLists->orderBy('id', 'Desc');
                }

                $productLists = $productLists->paginate(6);

                return view('front.product._products_listing', compact('categoryDetails','productLists','url'));

            } else {
                abort(404);
            }
        } else {

            $categoryCount = Category::where(['url' => $url, 'status' => 1])->count();

            if($categoryCount > 0) {
                $categoryDetails = Category::getCategoryDetails($url);
                $productLists = Product::whereIn('category_id', $categoryDetails['catIds'])
                                ->with('brand')
                                ->where('status', 1);

                $productLists = $productLists->paginate(6);

            } else {
                abort(404);
            }

            return view('front.product.listing', compact('categoryDetails','productLists','url'));
        }

    }
}
