<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Section;
use App\Brand;
use App\Category;
use Carbon\Carbon;
use Image;
use App\ProductAttribute;

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

        $data = $this->collectData();

        $categories = Section::with(['categories'])->get();

        $brands = Brand::where('status', 1)->get();

        return view('admin.product.create', compact('data', 'categories', 'brands'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $product = null;
        $productData = $this->recordProduct($data, $request, $product);

        Product::create($productData);

        session::flash('success_message','Created New Product successful.');
        return redirect('admin/products');
    }

    public function edit(Product $product)
    {
        $data = $this->collectData();

        $categories = Section::with(['categories'])->get();

        $brands = Brand::where('status', 1)->get();

        return view('admin.product.edit', compact('product', 'data','categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();

        $productData = $this->recordProduct($data, $request, $product);

        $product->update($productData);

        session::flash('success_message', 'Product Updated successful.');
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

    public function deleteProductImage(Product $product)
    {
        $large_file_path = "images/product_images/large/";
        $medium_file_path = "images/product_images/medium/";
        $small_file_path = "images/product_images/small/";

        if(file_exists($large_file_path.$product->image)) {
            unlink($large_file_path.$product->image);
            unlink($medium_file_path.$product->image);
            unlink($small_file_path.$product->image);
        }

        $product->update([
            'image' => null,
        ]);

        session::flash('success_message', 'Product image deleted successful.');
        return redirect()->back();
    }

    public function deleteProductVideo(Product $product)
    {
        $file_path = "videos/product_videos/";

        if(file_exists($file_path.$product->video)) {
            unlink($file_path.$product->video);
        }

        $product->update([
            'video' => null
        ]);

        session::flash('success_message', 'Product video deleted successful.');
        return redirect('admin/products');
    }

    public function recordProduct($data, $request, $product)
    {
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'code' => 'required',
            'price' => 'required',
            'color' => 'required',
        ]);

        // Setting upload image
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
                Image::make($image)->resize(250,250)->save($small_image_path);
            }
        }
        else if (isset($product->image)) {
            $imageName = $product->image;
        }else {
            $imageName = "";
        }

        // Setting upload video
        if($request->hasFile('video')) {
            $video = $request->file('video');
            if($video->isValid()) {
                $date = Carbon::now()->format('Y-m-d-H-i-s');
                $videoName = $date.'.'.$video->getClientOriginalExtension();
                $video_path = "videos/product_videos/";
                $video->move(public_path($video_path), $videoName);
            }
        }
        else if (isset($product->video)) {
            $videoName = $product->video;
        }
        else {
            $videoName = "";
        }

        if(isset($data['is_featured'])) {
            $is_featured = "Yes";
        } else {
            $is_featured = "No";
        }

        $category = Category::findOrFail($data['category_id']);

        $productData = [
            'category_id' => $category->id,
            'section_id' => $category->section_id,
            'brand_id' => $data['brand_id'],
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
        ];

        return $productData;
    }

    public function addProductAttribute(Request $request, Product $product)
    {
        if($request->isMethod('post')) {

            $data = $request->all();

            foreach($data['sku'] as $key => $value) {

                $countSku = $product->attributes->where('sku', $value)->count();
                if($countSku > 0) {
                    session::flash('error_message', 'Product '.$value.' already exitsts, please choose another value.');
                    return redirect()->back();
                }

                $countSize = $product->attributes->where('size', $data['size'][$key])->count();
                if($countSize > 0) {
                    session::flash('error_message', 'Product '.$data['size'][$key]. ' already exitsts,please choose another value');
                    return redirect()->back();
                }

                ProductAttribute::create([
                    'product_id' => $data['product_id'],
                    'size' => $data['size'][$key],
                    'price' => $data['price'][$key],
                    'stock' => $data['stock'][$key],
                    'sku' => $data['sku'][$key],
                    'status' => 1,
                ]);
            }

            session::flash('success_message', 'Product Attribute has been added.');
            return redirect()->back();
        }

        return view('admin.product.add_product_attribute', compact('product'));
    }

    public function updateProductAttribute(Request $request)
    {
        $data = $request->all();

        foreach($data['attribute_id'] as $key => $value) {
            ProductAttribute::where('id', $value)->update([
                'price' => $data['price'][$key],
                'stock' => $data['stock'][$key]
            ]);
        }

        session::flash('success_message', 'Product attribute has been updated successful.');
        return redirect()->back();
    }

    public function deleteProductAttribute($id)
    {
        $prduct_attribute = ProductAttribute::findOrFail($id);
        $prduct_attribute->delete();
        session::flash('success_message', 'Product attribute has been deleted successful.');
        return redirect()->back();
    }

    public function updateStatusAttribute(Request $request)
    {
        $data = $request->all();
        if($data['status'] == "Active") {
            $status = 0;
        } else {
            $status = 1;
        }
        ProductAttribute::where('id', $data['attribute_id'])->update(['status' => $status]);
        return response()->json(['status' => $status, 'attribute_id' => $data['attribute_id']]);
    }

    public function collectData()
    {
        $data = [
            'fabricArray' => ['Cotton','Polyester','Wool'],
            'sleeveArray' => ['Full Sleeve', ' Half Sleeve', 'Short Sleeve', 'Sleeveless'],
            'patternArray' => ['Checked', 'Plain','Printed', 'Self', 'Solid'],
            'fitArray' => ['Regular', 'Slim'],
            'occasionArray' => ['Casual','Formal']
        ];

        return $data;
    }
}
