<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\LiveSection;
use Illuminate\Http\Request;

class LiveController extends Controller
{
    public function liveIndex()
    {
        $lives = LiveSection::orderBy('id', 'desc')->get();
        return view('admin.livepage.live_section')->with([
            'lives' => $lives
        ]);
    }
    public function liveAdd()
    {
        return view('admin.livepage.live_section_add');
    }

    public function liveStore(Request $request)
    {
        $request->validate(
            [
                'youtube_link' => 'required|url',
            ],
            [
                'youtube_link.required' => 'Youtube URl is required',
                'youtube_link.url' => 'Youtube URl must be type of Url'
            ]
        );

        LiveSection::newLiveSection($request);
        $notification = array(
            'message' => 'Youtube Link Added Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/live-section')->with($notification);
    }

    public function liveEdit($id)
    {
        $live = LiveSection::find($id);
        return view('admin.livepage.live_section_update', [
            'live' => $live
        ]);
    }

    public function liveUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'youtube_link' => 'required|url',
            ],
            [
                'youtube_link.required' => 'Youtube URl is required',
                'youtube_link.url' => 'Youtube URl must be type of Url'
            ]
        );
        LiveSection::updateLive($request, $id);
        $notification = array(
            'message' => 'Live Show Update Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/live-section')->with($notification);
    }

    public function liveDelete($id)
    {
        if (LiveSection::deleteLive($id))
        {
            $data['success'] = true;
            $data['message'] = 'Live Show Deleted Successfully';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Live Show Could not Deleted';
            return response()->json($data, 200);
        }

    }

    public function liveStatusUpdate($id)
    {
        if (LiveSection::updateStatus($id))
        {
            $data['success'] = true;
            $data['message'] = 'Live Show Updated Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Live Show Could Not Updated !';
            return response()->json($data, 200);
        }

    }
}
