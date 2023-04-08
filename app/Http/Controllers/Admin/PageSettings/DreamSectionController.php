<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\DreamSection;
use Illuminate\Http\Request;

class DreamSectionController extends Controller
{
    public function dreamIndex(){
        $dreams = DreamSection::orderBy('id', 'desc')->get();
        return view('admin.programpage.dream_section')->with([
            'dreams'=> $dreams
        ]);
    }

    public function dreamAdd(){
        return view('admin.programpage.dream_section_add');
    }

    public function dreamStore(Request $request){
        $request->validate(
            [
                'heading'               => 'required',
                'shot_description_one'  => 'required',
                'shot_description_two'  => 'required',
                'shot_description_three'=> 'required',
                'button_url'            =>'required',
                'dream_image'           => 'required|mimes:jpg,png,webp|max:10048',
            ],
            [
                'heading.required'                  => 'Heading Is Required.',
                'shot_description_one.required'     => 'Short Description One Is Required.',
                'shot_description_two.required'     => 'Short Description Two Is Required.',
                'shot_description_three.required'   => 'Short Description Three Is Required.',
                'dream_image.required'              =>'Image is Required.',
                'dream_image.mimes'                 =>'Only Jpg, png, webp Can Be Uploaded.',
                'dream_image.max'                   =>'Maximum file size is 10MB.',
                'button_url.required'               => 'Button Url Is Required',
            ]
        );
        DreamSection::newDreamSection($request);
        $notification = array(
            'message'       => 'Dream Section Created Successfully.',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/dream-section')->with($notification);
    }

    public function dreamEdit($id){
        $dream = DreamSection::find($id);
        return view('admin.programpage.dream_section_update')->with([
            'dream' => $dream
        ]);
    }

    public function dreamUpdate(Request $request, $id){
        $request->validate(
            [
                'heading'               => 'required',
                'shot_description_one'  => 'required',
                'shot_description_two'  => 'required',
                'shot_description_three'=> 'required',
                'button_url'            =>'required',
            ],
            [
                'heading.required'                  => 'Heading Is Required.',
                'shot_description_one.required'     => 'Short Description One Is Required.',
                'shot_description_two.required'     => 'Short Description Two Is Required.',
                'shot_description_three.required'   => 'Short Description Three Is Required.',
                'dream_image.required'              =>'Image is Required.',
            ]
        );
        DreamSection::updateDreamSection($request, $id);
        $notification = array(
            'message'       => 'Dream Section Updated Successfully.',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/dream-section')->with($notification);
    }

    public function dreamStatusUpdate($id){
        if (DreamSection::statusUpdate($id))
        {
            $data['success'] = true;
            $data['message'] = 'Status Update Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Status Cannot Update !';
            return response()->json($data, 200);
        }
    }

    public function dreamDelete($id){
        if (DreamSection::deleteDreamSection($id))
        {
            $data['success'] = true;
            $data['message'] = 'Status Deleted Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Status Cannot Deleted !';
            return response()->json($data, 200);
        }
    }
}
