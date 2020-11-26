<?php

namespace App\Http\Controllers\Admin;

use Image;
use Session;
use App\Bunner;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BunnerController extends Controller
{
    public function index()
    {
        return view('admin.bunners.index', [
            'bunners' => Bunner::all(),
        ]);
    }

    public function create()
    {
        return view('admin.bunners.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('image')) {
            $image = $request->file('image');
            if($image->isValid()) {
                $date = Carbon::now()->format('Y-m-d-H-i-s');
                $imageName = $date.".".$image->extension();
                $path = "images/bunner_images/".$imageName;
                Image::make($image)->save($path);
            }
        } else {
            $imageName = null;
        }

        Bunner::create([
            'image' => $imageName,
            'link' => $data['link'],
            'title' => $data['title'],
            'alt' => $data['alt'],
            'status' => 1
        ]);

        session::flash('success_message', 'Bunner created successfully.');
        return redirect('admin/bunners');
    }

    public function edit(Bunner $bunner)
    {
        return view('admin.bunners.edit', compact('bunner'));
    }

    public function update(Request $request, Bunner $bunner)
    {
        $data = $request->all();
        if($request->hasFile('image')) {
            $image = $request->file('image');
            if($image->isValid()) {
                $date = Carbon::now()->format('Y-m-d-H-i-s');
                $imageName = $date.".".$image->extension();
                $path = "images/bunner_images/".$imageName;
                Image::make($image)->save($path);
                if(isset($bunner->image) && file_exists("images/bunner_images/".$bunner->image)) {
                    unlink("images/bunner_images/".$bunner->image);
                }
            }
        }else if(isset($bunner->image)) {
            $imageName = $bunner->image;
        } else {
            $imageName = null;
        }

        $bunner->update([
            'image' => $imageName,
            'link' => $data['link'],
            'title' => $data['title'],
            'alt' => $data['alt'],
        ]);

        session::flash('success_message', 'Bunner updated successful.');
        return redirect()->back();
    }

    public function updateStatus(Request $request)
    {
        $data = $request->all();
        if($data['status'] == "Active") {
            $status = 0;
        } else {
            $status = 1;
        }

        Bunner::where('id', $data['bunner_id'])->update(['status' => $status]);
        return response()->json(['status' => $status, 'bunner_id' => $data['bunner_id']]);
    }

    public function delete(Bunner $bunner)
    {
        $file_path = "images/bunner_images/";
        if(file_exists($file_path.$bunner->image)) {
            unlink($file_path.$bunner->image);
        }

        $bunner->delete();

        session::flash('success_message', 'Bunner deleted successufly.');
        return redirect()->back();
    }

    public function deleteImage(Bunner $bunner)
    {
        $file_path = "images/bunner_images/".$bunner->image;
        if(file_exists($file_path)) {
            unlink($file_path);
        }

        $bunner->update(['image' => null]);
        session::flash('success_message', 'Bunner image deleted successful.');
        return redirect()->back();
    }
}
