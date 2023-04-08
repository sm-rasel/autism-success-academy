<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\ImagineContent;
use App\Models\ImagineMedia;
use Illuminate\Http\Request;

class ImagineSectionController extends Controller
{
    //Imagine Media
    public function imagineMediaIndex()
    {
        $imagine = ImagineMedia::first();
        return view('admin.programpage.imagine_section')->with([
            'imagine' => $imagine
        ]);
    }

    public function imagineMediaStore(Request $request, $id = null)
    {
        $request->validate(
            [
                'imagine_title'         => 'required',
                'imagine_title_two'     => 'required',
                'imagine_title_three'   => 'required',
                'imagine_image'         => 'required|mimes:jpg,png,webp|max:10048'
            ],
            [
                'imagine_title.required'        => 'Title Is Required.',
                'imagine_title_two.required'    => 'Title Two Is Required.',
                'imagine_title_three.required'  => 'Title Three Is Required.',
                'imagine_image.required'        => 'Image is Required.',
                'imagine_image.mimes'           => 'Only Jpg, jpeg, png, webp Can Be Uploaded.',
                'imagine_image.max'             => 'Maximum file size is 10MB.',
            ]
        );
        ImagineMedia::newImagineSection($request, $id);
        $notification = array(
            'message'       => 'Imagine Section Updated Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/imagine-media-section')->with($notification);
    }

    //Imagine Content
    public function imagineContentIndex(){
        $imagines = ImagineContent::orderBy('id', 'desc')->get();
        return view('admin.programpage.imagine_content')->with([
            'imagines' => $imagines
        ]);
    }

    public function imagineContentAdd()
    {

        return view('admin.programpage.imagine_content_add');
    }

    public function imagineContentStore(Request $request){
        $request->validate(
            [
                'imagine_content'   => 'required',
                'order'             => 'required|numeric'
            ],
            [
                'imagine_content.required'  => 'Content is Required',
                'order.required'            => 'Order Number is Required',
                'order.numeric'             => 'Order Number Must be Number'
            ]
        );
        ImagineContent::imagineContentAdd($request);
        $notification = array(
            'message'       => 'Imagine Content Add successfully !',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/imagine-content-section')->with($notification);
    }

    public function imagineContentEdit($id){
        $imagine = ImagineContent::find($id);
        return view('admin.programpage.imagine_content_update')->with([
            'imagine' => $imagine
        ]);
    }

    public function imagineContentUpdate(Request $request, $id){
        $request->validate(
            [
                'imagine_content'   => 'required',
                'order'             => 'required|numeric'
            ],
            [
                'imagine_content.required'  => 'Content is Required',
                'order.required'            => 'Order Number is Required',
                'order.numeric'             => 'Order Number Must be Number'
            ]
        );
        ImagineContent::imagineContentUpdate($request, $id);
        $notification = array(
            'message'       => 'Imagine Content Update successfully !',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/imagine-content-section')->with($notification);
    }

    public function imagineContentStatusUpdate($id){
        if (ImagineContent::imagineContentStatusUpdate($id))
        {
            $data['success'] = true;
            $data['message'] = 'Content Status Update Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Content Status Cannot be Updated !';
            return response()->json($data, 200);
        }
    }

    public function imagineContentDelete($id){
        if (ImagineContent::DeleteImagineContent($id))
        {
            $data['success'] = true;
            $data['message'] = 'Content Deleted Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Content Cannot be Deleted !';
            return response()->json($data, 200);
        }
    }
}
