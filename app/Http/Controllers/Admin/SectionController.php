<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Section;
use Session;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::latest()->get();
        return view('admin.sections.index', compact('sections'));
    }

    public function updateSectionStatus(Request $request)
    {
        $data = $request->all();
        if($data['status'] == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        Section::where('id', $data['section_id'])->update(['status' => $status]);
        session::flash('success_message', 'Update Section status successful.');
        return redirect()->back();
    }
}
