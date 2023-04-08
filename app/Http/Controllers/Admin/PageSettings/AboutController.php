<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    // About Methods
    public function aboutIndex()
    {
        $abouts = AboutSection::orderBy('id', 'desc')->get();
        return view('admin.homepage.about_section', [
            'abouts' => $abouts
        ]);
    }
    public function aboutAdd(Request $request)
    {
        return view('admin.homepage.about_section_add');
    }
    public function aboutStore(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'heading_one' => 'required',
                'heading_two' => 'required',
                'go_text' => 'required',
                'about_one' => 'required',
                'about_two' => 'required',
                'about_image' => 'mimes:jpg,png|max:2048'
            ], 
            [
                'name.required' => 'Name is required',
                'heading_one.required' => 'Heading One is required',
                'heading_two.required' => 'Heading Two is required',
                'go_text.required' => 'Go Text is required',
                'about_one.required' => 'Short Description One is required',
                'about_two.required' => 'Short Description Two is required',
                'about_image.mimes' => 'Only Jpg and Png can be uploaded',
                'about_image.max' => 'Maximum File Upload Size is 2MB'
            ]
        );
        AboutSection::newAboutSection($request);
        $notification = array(
            'message' => 'About Section Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/about-section')->with($notification);
    }
    public function aboutEdit(Request $request, $id)
    {
        $about = AboutSection::find($id);
        return view('admin.homepage.about_section_update', [
            'about' => $about
        ]);
    }
    public function aboutUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'heading_one' => 'required',
                'heading_two' => 'required',
                'go_text' => 'required',
                'about_one' => 'required',
                'about_two' => 'required',
                'about_image' => 'mimes:jpg,png|max:2048'
            ], 
            [
                'name.required' => 'Name is required',
                'heading_one.required' => 'Heading One is required',
                'heading_two.required' => 'Heading Two is required',
                'go_text.required' => 'Go Text is required',
                'about_one.required' => 'Short Description One is required',
                'about_two.required' => 'Short Description Two is required',
                'about_image.mimes' => 'Only Jpg and Png can be uploaded',
                'about_image.max' => 'Maximum File Upload Size is 2MB'
            ]
        );
        AboutSection::updateAbout($request, $id);
        $notification = array(
            'message' => 'About Section Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/about-section')->with($notification);
    }
    public function aboutDelete(Request $request, $id)
    {
        if(AboutSection::deleteAbout($id)) {
            $data['success'] = true;
            $data['message'] = 'About Section Deleted Successfully';
            return response()->json($data, 200);
        } else {
            $data['success'] = false;
            $data['message'] = 'Could Not Delete';
            return response()->json($data, 200);
        }

    }
    public function aboutStatusUpdate(Request $request, $id)
    {
        if(AboutSection::updateStatus($id)) {
            $data['success'] = true;
            $data['message'] = 'About Section Created Successfully';
            return response()->json($data, 200);
        } else {
            $data['success'] = false;
            $data['message'] = 'Could Not Delete';
            return response()->json($data, 200);
        }
    }
}
