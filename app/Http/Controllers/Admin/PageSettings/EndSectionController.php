<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\EndSection;
use Illuminate\Http\Request;

class EndSectionController extends Controller
{
    public function endSectionIndex()
    {
        $end = EndSection::first();
        return view('admin.programpage.end_section')->with([
            'end' => $end
        ]);
    }

    public function endSectionStore(Request $request, $id = null)
    {
        $request->validate(
            [
                'end_title'     => 'required',
                'button_name'   => 'required',
                'button_url'    => 'required|url'
            ],
            [
                'end_title.required'    => 'Title is Required',
                'button_name.required'  => 'Button name is Required',
                'button_url.required'   => 'Button Url is Required',
                'button_url.url'        => 'Button Url must be type of Url',
            ]
        );
        EndSection::newEndSection($request, $id);
        $notification = array(
            'message'       => 'Section Updated Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/End-section')->with($notification);
    }
}
