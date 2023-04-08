<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\SuccessSection;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public $success;

    // Success Section Methods
    public function successIndex()
    {
        return view('admin.homepage.success_section', [
            'successes' => SuccessSection::orderBy('id', 'desc')->get(),
        ]);
    }

    public function successAdd()
    {
        return view('admin.homepage.success_section_add');
    }

    public function successStore(Request $request)
    {
        if($request->program_upper == 'on') {
            $request->program_upper = 1;
        } else {
            $request->program_upper = 2;
        }
        if($request->program_second == 'on') {
            $request->program_second = 1;
        } else {
            $request->program_second = 2;
        }
        if($request->program_third == 'on') {
            $request->program_third = 1;
        } else {
            $request->program_third = 2;
        }
        if($request->program_bottom == 'on') {
            $request->program_bottom = 1;
        } else {
            $request->program_bottom = 2;
        }
        $request->validate(
            [
                'order'                 => 'required|numeric',
                'success_image'         => 'mimes:jpg,png|max:2048',
            ],
            [
                'order.required'                => 'Order Number is required',
                'order.numeric'                 => 'Order Number Must be Numeric',
                'success_image.mimes'           => 'Only Jpg and Png can be uploaded',
                'success_image.max'             => 'Maximum File Upload Size is 2MB',
            ]
        );

        SuccessSection::newSuccessSection($request);
        $notification = array(
            'message'       => 'Success Section Created Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/success-section')->with($notification);
    }

    public function successEdit($id)
    {
        return view('admin.homepage.success_section_update', [
            'success' => SuccessSection::find($id),
        ]);
    }


    public function successUpdate(Request $request, $id)
    {
        if($request->program_upper == 'on') {
            $request->program_upper = 1;
        } else {
            $request->program_upper = 2;
        }
        if($request->program_second == 'on') {
            $request->program_second = 1;
        } else {
            $request->program_second = 2;
        }
        if($request->program_third == 'on') {
            $request->program_third = 1;
        } else {
            $request->program_third = 2;
        }
        if($request->program_bottom == 'on') {
            $request->program_bottom = 1;
        } else {
            $request->program_bottom = 2;
        }
        
        $request->validate(
            [
                'order'                 => 'required|numeric',
                'success_image'         => 'mimes:jpg,png|max:2048',
            ],
            [
                'order.required'                => 'Order Number is required',
                'order.numeric'                 => 'Order Number Must be Numeric',
                'success_image.mimes'           => 'Only Jpg and Png can be uploaded',
                'success_image.max'             => 'Maximum File Upload Size is 2MB',
            ]
        );

        SuccessSection::updateSuccess($request, $id);
        $notification = array(
            'message'       => 'Success Section Update Successfully',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/success-section')->with($notification);
    }

    public function successDelete($id)
    {
        if (SuccessSection::successDelete($id))
        {
            $data['success'] = true;
            $data['message'] = 'Success Section Deleted Successfully!';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Success Section Can not be Deleted!';
            return response()->json($data, 200);
        }
    }

    public function successStatusUpdate(Request $request, $id)
    {
        if (SuccessSection::updateStatus($id))
        {
            $data['success'] = true;
            $data['message'] = 'Success Status Update Successfully';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Success Status Can Not be Updated';
            return response()->json($data, 200);
        }
    }


    public function successFeaturedUpdate($id)
    {
        if (SuccessSection::updateFeatured($id))
        {
            $data['success'] = true;
            $data['message'] = 'Featured Status Update Successfully';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Featured Could Not Updated';
            return response()->json($data, 200);
        }
    }
}
