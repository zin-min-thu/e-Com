<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Session;
use App\Section;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with(['section','parent_category'])->get();

        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        $sections = Section::all();
        return view('admin.category.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'section_id' => 'required',
            'url' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if($request->hasFile('image')) {
            $image = $data['image'];
            if($image->isValid()) {
                $date = Carbon::now()->format('Y-m-d-H:i:s');
                $imageName = $date.$image->extension();
                $path = "/images/admin_images/category_images";
                $image->move(public_path($path), $imageName);
            } 
        }else {
            $imageName = "";
        }

        Category::create([
            'name' => $data['name'],
            'parent_id' => $data['parent_id'],
            'section_id' => $data['section_id'],
            'discount' => $data['discount'],
            'url' => $data['url'],
            'description' => $data['description'],
            'image' => $imageName,
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
        ]);
        
        session::flash('success_message', 'Created New Category.');
        return redirect('admin/categories');
    }

    public function updateCategoryStatus(Request $request)
    {
        $data = $request->all();
        if($data['status'] == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        Category::where('id', $data['category_id'])->update(['status' => $status]);
        session::flash('success_message', 'Update Category status');
        return redirect()->back();
    }

    public function appendCategoryLevel(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $categories = Category::with('subcategories')->where(['section_id' => $data['section_id'], 'parent_id' => 0, 'status' => 1])->get();
            return view('admin.category._append_level', compact('categories'));
        }
    }
}
