<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\FirstSection;
use Illuminate\Http\Request;

class FirstSectionController extends Controller
{
    public function firstSectionIndex(){
        $firsts = FirstSection::orderBy('id', 'desc')->get();
        return view('admin.programpage.first_section')->with([
            'firsts' => $firsts
        ]);
    }

    public function firstSectionAdd(){
        return view('admin.programpage.first_section_add');
    }

    public function firstSectionStore(Request $request){
        $request->validate(
            [
                'title'                 => 'required',
                'shot_description_one'  => 'required',
                'shot_description_two'  => 'required',
                'first_image'           => 'required|mimes:jpg,png,webp|max:10048',
                'button_url'            =>'required',
                'order'                 => 'required|numeric',
            ],
            [
                'title.required'                => 'Title Is Required.',
                'shot_description_one.required' => 'Short Description One Is Required.',
                'shot_description_two.required' => 'Short Description Two Is Required.',
                'first_image.required'          =>'Image is Required.',
                'first_image.mimes'             =>'Only Jpg, png, webp Can Be Uploaded.',
                'first_image.max'               =>'Maximum file size is 10MB.',
                'order.required'                => 'Order number is required',
                'order.numeric'                 => 'Order Number Must be Numeric',
                'button_url.required'           => 'Button Url Is Required',
                'button_url.url'                => 'Button Url Must be Type of Url.'
            ]
        );
         FirstSection::newFirstSection($request);
        $notification = array(
            'message' => 'First Section Created Successfully.',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/first-section')->with($notification);
    }

    public function firstSectionEdit($id){
        $first = FirstSection::find($id);
        return view('admin.programpage.first_section_update')->with([
            'first' => $first
        ]);
    }

    public function firstSectionUpdate(Request $request, $id){
        $request->validate(
            [
                'title'                 => 'required',
                'shot_description_one'  => 'required',
                'shot_description_two'  => 'required',
                'button_url'            =>'required',
                'order'                 => 'required|numeric',
            ],
            [
                'title.required'                => 'Title Is Required.',
                'shot_description_one.required' => 'Short Description One Is Required.',
                'shot_description_two.required' => 'Short Description Two Is Required.',
                'order.required'                => 'Order number is required',
                'order.numeric'                 => 'Order Number Must be Numeric',
                'button_url.required'           => 'Button Url Is Required',
                'button_url.url'                => 'Button Url Must be Type of Url.'
            ]
        );
        FirstSection::updateFirstSection($request, $id);
        $notification = array(
            'message'       => 'Section Update successfully !',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/first-section')->with($notification);
    }

    public function firstSectionStatusUpdate($id){
        if (FirstSection::updateStatus($id))
        {
            $data['success'] = true;
            $data['message'] = 'Status Update Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Status Cannot be updated !';
            return response()->json($data, 200);
        }
    }

    public function firstSectionDelete($id){
        if (FirstSection::deleteSection($id))
        {
            $data['success'] = true;
            $data['message'] = 'Section Deleted Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Section Cannot be Deleted !';
            return response()->json($data, 200);
        }
    }
}
