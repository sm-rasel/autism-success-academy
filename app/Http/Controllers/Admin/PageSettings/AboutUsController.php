<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUsIndex()
    {
        $abouts = AboutUs::orderBy('id', 'desc')->get();
        return view('admin.aboutpage.about_us')->with([
            'abouts' => $abouts
        ]);
    }

    public function aboutUsAdd()
    {
        return view('admin.aboutpage.about_us_add');
    }

    public function aboutUsStore(Request $request)
    {
        $request->validate(
            [
                'about_image' => 'required|mimes:jpg,png,webp|max:2048',
                'about_title' => 'required',
                'about_description' => 'required',
                'order' => 'required|numeric'
            ],
            [
                'about_image.mimes' => 'Only Jpg, Webp and Png can be uploaded',
                'about_image.max' => 'Maximum File Upload Size is 2MB',
                'about_image.required' => 'About Image is required',
                'about_title.required' => 'About Title is required',
                'about_description.required' => 'About Description is required',
                'order.required' => 'Order Number required',
                'order.numeric' => 'Order Number Must be Numeric.',
            ]
        );
        AboutUs::newAboutUsSection($request);
        $notification = array(
            'message'       => 'About us Created Successfully',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/about-us-section')->with($notification);
    }

    public function aboutUsEdit($id)
    {
        $about = AboutUs::find($id);
        return view('admin.aboutpage.about_us_update', [
            'about' => $about
        ]);
    }

    public function aboutUsUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'about_image' => 'mimes:jpg,png,webp|max:2048',
                'about_title' => 'required',
                'about_description' => 'required',
                'order' => 'required|numeric'
            ],
            [
                'about_image.mimes' => 'Only Jpg, Webp and Png can be uploaded',
                'about_image.max' => 'Maximum File Upload Size is 2MB',
                'about_title.required' => 'About Title is required',
                'about_description.required' => 'About Description is required',
                'order.required' => 'Order Number required',
                'order.numeric' => 'Order Number Must be Numeric.',
            ]
        );
        AboutUs::updateAboutUsSection($request, $id);
        $notification = array(
            'message'       => 'About Us Updated Successfully.',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/about-us-section')->with($notification);
    }

    public function aboutUsDelete($id)
    {
        if (AboutUs::deleteAboutUs($id))
        {
            $data['success'] = true;
            $data['message'] = 'About section deleted successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'About section can not be deleted !';
            return response()->json($data, 200);
        }
    }

    public function aboutUsStatusUpdate($id)
    {
        if (AboutUs::updateStatus($id))
        {
            $data['success'] = true;
            $data['message'] = 'Status Update successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Status can not be updated !';
            return response()->json($data, 200);
        }
    }
}
