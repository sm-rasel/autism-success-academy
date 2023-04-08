<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\MeetSection;
use Illuminate\Http\Request;

class MeetController extends Controller
{
    // About Methods
    public function meetIndex()
    {
        $meets = MeetSection::orderBy('id', 'desc')->get();
        return view('admin.homepage.meet_section', [
            'meets' => $meets
        ]);
    }
    public function meetAdd(Request $request)
    {
        return view('admin.homepage.meet_section_add');
    }
    public function meetStore(Request $request)
    {
        $request->validate(
            [
                'header' => 'required',
                'header_two' => 'required',
                'meet_text' => 'required',
                'meet_text_two' => 'required',
                'button_text' => 'required',
                'button_url' => 'required|url',
                'youtube_url' => 'required|url',
                'youtube_image' => 'mimes:jpg,png,webp|max:2048'
            ],
            [
                'header.required' => 'Header is required',
                'header_two.required' => 'Header Two is required',
                'meet_text.required' => 'Meet Text is required',
                'meet_text_two.required' => 'Meet Text Two is required',
                'button_text.required' => 'Button Text is required',
                'button_url.required' => 'Button URl is required',
                'button_url.url' => 'Button URl must be type of Url',
                'youtube_url.required' => 'Youtube URl is required',
                'youtube_url.url' => 'Youtube URl must be type of Url',
                'youtube_image.mimes' => 'Only Jpg, Webp and Png can be uploaded',
                'youtube_image.max' => 'Maximum File Upload Size is 2MB'
            ]
        );
        MeetSection::newMeetSection($request);
        $notification = array(
            'message' => 'Meet Section Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/meet-section')->with($notification);
    }
    public function meetEdit(Request $request, $id)
    {
        $meet = MeetSection::find($id);
        return view('admin.homepage.meet_section_update', [
            'meet' => $meet
        ]);
    }
    public function meetUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'header' => 'required',
                'header_two' => 'required',
                'meet_text' => 'required',
                'meet_text_two' => 'required',
                'button_text' => 'required',
                'button_url' => 'required|url',
                'youtube_url' => 'required|url',
                'youtube_image' => 'mimes:jpg,png,webp|max:2048'
            ],
            [
                'header.required' => 'Header is required',
                'header_two.required' => 'Header Two is required',
                'meet_text.required' => 'Meet Text is required',
                'meet_text_two.required' => 'Meet Text Two is required',
                'button_text.required' => 'Button Text is required',
                'button_url.required' => 'Button URl is required',
                'button_url.url' => 'Button URl must be type of Url',
                'youtube_url.required' => 'Youtube URl is required',
                'youtube_url.url' => 'Youtube URl must be type of Url',
                'youtube_image.mimes' => 'Only Jpg, Webp and Png can be uploaded',
                'youtube_image.max' => 'Maximum File Upload Size is 2MB'
            ]
        );
        MeetSection::updateMeet($request, $id);
        $notification = array(
            'message' => 'Meet Section Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/meet-section')->with($notification);
    }
    public function meetDelete(Request $request, $id)
    {
        if(MeetSection::deleteMeet($id)) {
            $data['success'] = true;
            $data['message'] = 'Meet Section Deleted Successfully';
            return response()->json($data, 200);
        } else {
            $data['success'] = false;
            $data['message'] = 'Could Not Delete';
            return response()->json($data, 200);
        }

    }
    public function meetStatusUpdate(Request $request, $id)
    {
        if(MeetSection::updateStatus($id)) {
            $data['success'] = true;
            $data['message'] = 'Meet Status Updated Successfully';
            return response()->json($data, 200);
        } else {
            $data['success'] = false;
            $data['message'] = 'Could Not Delete';
            return response()->json($data, 200);
        }
    }
}
