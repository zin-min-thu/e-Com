<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use Image;
use Session;
use App\ProductImage;

class ProductImageController extends Controller
{
    public function addImage(Request $request, Product $product)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            if($request->hasFile('images')) {
                $images = $request->file('images');
                foreach($images as $image) {
                    if($image->isValid()) {
                        $date = Carbon::now()->format('Y-m-d-H-i-s');
                        $image_tmp = Image::make($image);
                        $imageName = rand(1111, 999999).$date.".".$image->extension();
                        //Set images path
                        $large_image_path = "images/product_images/large/".$imageName;
                        $medium_image_path = "images/product_images/medium/".$imageName;
                        $small_image_path = "images/product_images/small/".$imageName;
                        //Upload large size image
                        Image::make($image_tmp)->save($large_image_path);
                        //Upload medium size image
                        Image::make($image_tmp)->resize(520,600)->save($medium_image_path);
                        //Upload small size image
                        Image::make($image_tmp)->resize(260,300)->save($small_image_path);
                        $product->images()->create([
                            'product_id' => $product->id,
                            'image' => $imageName,
                            'status' => 1
                        ]);
                    }
                }
                session::flash('success_message', 'Product images has been uploaded successful.');
                return redirect()->back();
            } else {
                session::flash('error_message', "Please upload product image");
                return redirect()->back();
            }
        }
        return view('admin.product.add_images', compact('product'));
    }

    public function updateStatus(Request $request)
    {
        $data = $request->all();
        if($data['status'] == "Active") {
            $status = 0;
        } else {
            $status = 1;
        }

        ProductImage::where('id', $data['image_id'])->update(['status' => $status]);
        return response()->json(['status' => $status, 'image_id' => $data['image_id']]);
    }

    public function deleteImages($id)
    {
        $product_image = Productimage::findOrFail($id);

        $large_file_path = "images/product_images/large/";
        $medium_file_path = "images/product_images/medium/";
        $small_file_path = "images/product_images/small/";

        if(file_exists($large_file_path.$product_image->image)) {
            unlink($large_file_path.$product_image->image);
            unlink($medium_file_path.$product_image->image);
            unlink($small_file_path.$product_image->image);
        }

        $product_image->delete();

        session::flash('success_message', 'Product image deleted successful.');
        return redirect()->back();
    }
}
