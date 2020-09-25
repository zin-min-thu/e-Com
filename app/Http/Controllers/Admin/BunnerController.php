<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Bunner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BunnerController extends Controller
{
    public function index()
    {
        return view('admin.bunner.index', [
            'bunners' => Bunner::all(),
        ]);
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

    public function destroy(Bunner $bunner)
    {
        $file_path = "images/bunner_images/";
        if(file_exists($file_path.$bunner->image)) {
            unlink($file_path.$bunner->image);
        }

        $bunner->delete();

        session::flash('success_message', 'Bunner deleted successufly.');
        return redirect()->back();
    }
}
