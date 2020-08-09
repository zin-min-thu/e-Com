<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Section;

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
