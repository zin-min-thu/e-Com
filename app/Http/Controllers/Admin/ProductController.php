<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Section;
use App\Category;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with([
            'section' => function($query) {
                $query->select('id','name');
            },
            'category' => function($query) {
                $query->select('id','name');
            }])->get();

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $data = [
            'fabricArray' => ['Cotton','Polyester','Wool'],
            'sleeveArray' => ['Full Sleeve', ' Half Sleeve', 'Short Sleeve', 'Sleeveless'],
            'patternArray' => ['Checked', 'Plain','Printed', 'Self', 'Solid'],
            'fitArray' => ['Regular', 'Slim'],
            'occasionArray' => ['Casual','Formal']
        ];

        $categories = Section::with(['categories'])->get();

        return view('admin.product.create', compact('data','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'code' => 'required',
            'price' => 'required',
            'color' => 'required',
        ]);

        $data = $request->all();

        if($request->hasFile('image')) {
            $image = $request->file('image');
            if($image->isValid()) {
                $date = Carbon::now()->format('Y-m-d-H-i-s');
                $imageName = $date.".".$image->extension();
                $large_image_path = "images/product_images/large/".$imageName;
                $medium_image_path = "images/product_images/medium/".$imageName;
                $small_image_path = "images/product_images/small/".$imageName;
                //Upload large size image
                Image::make($image)->save($large_image_path);
                //Upload medium size image
                Image::make($image)->resize(520,600)->save($medium_image_path);
                //Upload small size image
                Image::make($image)->resize(260,300)->save($small_image_path);
            }
        } else {
            $imageName = "";
        }

        if($request->hasFile('video')) {
            $video = $request->file('video');
            if($video->isValid()) {
                $date = Carbon::now()->format('Y-m-d-H-i-s');
                $videoName = $date.'.'.$video->getClientOriginalExtension();
                $video_path = "videos/product_videos/";
                $video->move(public_path($video_path), $videoName);
            }
        } else {
            $videoName = "";
        }

        if(isset($data['is_featured'])) {
            $is_featured = "Yes";
        } else {
            $is_featured = "No";
        }

        $category = Category::findOrFail($data['category_id']);

        Product::create([
            'category_id' => $category->id,
            'section_id' => $category->section_id,
            'code' => $data['code'],
            'name' => $data['name'],
            'color' => $data['color'],
            'price' => $data['price'],
            'weight' => $data['weight'],
            'discount' => $data['discount'],
            'image' => $imageName,
            'video' => $videoName,
            'fabric' => $data['fabric'],
            'sleeve' => $data['sleeve'],
            'fit' => $data['fit'],
            'pattern' => $data['pattern'],
            'occasion' => $data['occasion'],
            'description' => $data['description'],
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
            'wash_care' => $data['wash_care'],
            'is_featured' => $is_featured,
            'status' => 1
        ]);

        session::flash('success_message','Created New Product successful.');
        return redirect('admin/products');
    }

    public function updateProductStatus(Request $request)
    {
        $data = $request->all();
        if($data['status'] == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        Product::where('id', $data['product_id'])->update(['status' => $status]);
        session::flash('success_message', 'Product status has been updated.');
        return redirect ('admin/products');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        session::flash('success_message', 'Product has been deleted.');
        return redirect('admin/products');
    }
}
