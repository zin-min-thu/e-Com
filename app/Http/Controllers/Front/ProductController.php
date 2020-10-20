<?php

namespace App\Http\Controllers\Front;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    public function listing(Request $request)
    {
        Paginator::useBootstrap();

        if($request->ajax()) {

            $data = $request->all();
            $url = $data['url'];
            $categoryCount = Category::where(['url' => $url, 'status' => 1])->count();

            if($categoryCount > 0) {

                $categoryDetails = Category::getCategoryDetails($url);

                $productLists = Product::whereIn('category_id', $categoryDetails['catIds'])
                                ->with('brand')
                                ->where('status', 1);

                //Filter if slected fabric
                if(isset($data['fabric']) && !empty($data['fabric'])) {
                    $productLists = $productLists->whereIn('fabric',$data['fabric']);
                }

                //Filter if slected sleeve
                if(isset($data['sleeve']) && !empty($data['sleeve'])) {
                    $productLists = $productLists->whereIn('sleeve',$data['sleeve']);
                }

                //Filter if slected pattern
                if(isset($data['pattern']) && !empty($data['pattern'])) {
                    $productLists = $productLists->whereIn('pattern',$data['pattern']);
                }

                //Filter if slected fit
                if(isset($data['fit']) && !empty($data['fit'])) {
                    $productLists = $productLists->whereIn('fit',$data['fit']);
                }

                //Filter if slected occasion
                if(isset($data['occasion']) && !empty($data['occasion'])) {
                    $productLists = $productLists->whereIn('occasion',$data['occasion']);
                }

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

            $url = Route::getFacadeRoot()->current()->uri();

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

            $listing = "listing";
            $data = Product::collectFilterProducts();

            return view('front.product.listing', compact('categoryDetails','productLists','url','data','listing'));
        }

    }
}
