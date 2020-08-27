<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Session;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Brand::create(['name' => $request->name, 'status' => 1]);
        session::flash('success_message', 'Brand has been created successful.');
        return redirect('admin/brands');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $brand->update([
            'name' => $request->name,
        ]);
        session::flash('success_message', 'Brand has been updated successful.');
        return redirect('admin/brands');
    }

    public function deleteBrand(Brand $brand)
    {
        $brand->delete();
        session::flash('success_message', 'Brand has been deleted successful.');
        return redirect('admin/brands');
    }

    public function updateStatusBrand(Request $request)
    {
        $data = $request->all();
        if($data['status'] == "Active") {
            $status = 0;
        } else {
            $status = 1;
        }

        Brand::where('id', $data['brand_id'])->update(['status' => $status]);
        return response()->json(['status' => $status, 'brand_id' => $data['brand_id']]);
    }
}
