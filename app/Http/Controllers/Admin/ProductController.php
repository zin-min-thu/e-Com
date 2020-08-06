<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
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
