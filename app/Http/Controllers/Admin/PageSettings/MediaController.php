<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\MediaSection;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function mediaIndex()
    {
        $medias = MediaSection::orderBy('id', 'desc')->get();
        return view('admin.mediapage.media_section')->with([
            'medias' => $medias
        ]);
    }
    public function mediaAdd()
    {
        return view('admin.mediapage.media_section_add');
    }

    public function mediaStore(Request $request)
    {
        $request->validate(
            [
                'media_image' => 'mimes:jpg,png,webp|max:2048',
                'order' => 'required|numeric'
            ],
            [
                'media_image.mimes' => 'Only Jpg, Webp and Png can be uploaded',
                'media_image.max' => 'Maximum File Upload Size is 2MB',
                'order.required' => 'Order number is required',
                'order.numeric' => 'Order Number Must be Numeric'
            ]
        );

        MediaSection::newMediaSection($request);
        $notification = array(
            'message' => 'Media Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/media-section')->with($notification);
    }

    public function mediaEdit($id)
    {
        $media = MediaSection::find($id);
        return view('admin.mediapage.media_section_update', [
            'media' => $media
        ]);
    }

    public function mediaUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'media_image' => 'mimes:jpg,png,webp|max:2048',
                'order' => 'required|numeric',
            ],
            [
                'media_image.mimes' => 'Only Jpg, Webp and Png can be uploaded',
                'media_image.max' => 'Maximum File Upload Size is 2MB',
                'order.required' => 'Order number is required',
                'order.numeric' => 'Order Number Must be Numeric.'
            ]
        );
        MediaSection::updateMedia($request, $id);
        $notification = array(
            'message' => 'Media Section Update Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/media-section')->with($notification);
    }

    public function mediaDelete($id)
    {
        if (MediaSection::deleteMedia($id))
        {
            $data['success'] = true;
            $data['message'] = 'Media Section Deleted Successfully';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Could not Deleted';
            return response()->json($data, 200);
        }

    }

    public function mediaStatusUpdate($id)
    {
        if (MediaSection::updateStatus($id))
        {
            $data['success'] = true;
            $data['message'] = 'Media Updated Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Media Could Not Updated !';
            return response()->json($data, 200);
        }

    }
}
