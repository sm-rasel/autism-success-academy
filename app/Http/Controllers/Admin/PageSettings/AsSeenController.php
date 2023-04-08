<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\AsSeenSection;
use Illuminate\Http\Request;

class AsSeenController extends Controller
{
    public function asSeenIndex()
    {
        return view('admin.homepage.as_seen_section', [
            'as_seens' => AsSeenSection::orderBy('id', 'desc')->get()
        ]);
    }

    public function asSeenAdd()
    {
        return view('admin.homepage.as_seen_add');
    }

    public function asSeenStore(Request $request)
    {
        $request->validate(
            [
                'order'      => 'required|numeric',
                'seen_image' => 'mimes:jpg,png,webp|max:2048'
            ],
            [
                'order.required'    => 'Order Number is required',
                'order.numeric'     => 'Order Number Must be Numeric',
                'seen_image.mimes'  => 'Only Jpg, Webp and Png can be uploaded',
                'seen_image.max'    => 'Maximum File Upload Size is 2MB',
            ]
        );
        AsSeenSection::newAsSeen($request);
        $notification = array(
            'message' => 'As seen Section Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/seen-on-section')->with($notification);
    }

    public function asSeenEdit($id)
    {
        return view('admin.homepage.as_seen_update', [
            'as_seen' => AsSeenSection::findOrFail($id),
        ]);
    }

    public function asSeenUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'order'      => 'required|numeric',
                'seen_image' => 'mimes:jpg,png|max:2048'
            ],
            [
                'order.required'    => 'Order Number is required',
                'order.numeric'     => 'Order Number Must be Numeric',
                'seen_image.mimes'  => 'Only Jpg and Png can be uploaded',
                'seen_image.max'    => 'Maximum File Upload Size is 2MB',
            ]
        );

        AsSeenSection::updateAsSeen($request, $id);
        $notification = array(
            'message' => 'As seen Section Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/seen-on-section')->with($notification);
    }

    public function asSeenDelete($id)
    {
        AsSeenSection::deleteSeen($id);
        $notification = array(
            'message' => 'As seen Image Delete Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/seen-on-section')->with($notification);
    }

    public function asSeenStatusUpdate($id)
    {
        if (AsSeenSection::updateStatus($id))
        {
            $data['success'] = true;
            $data['message'] = "Status Update Successfully.";
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = "Status Can Not be Updated";
            return response()->json($data, 200);
        }
    }
}
