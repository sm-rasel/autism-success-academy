<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\AchieveSection;
use Illuminate\Http\Request;

class AchieveSectionController extends Controller
{
    public function achieveIndex()
    {
        $achieves = AchieveSection::orderBy('id', 'desc')->get();
        return view('admin.programpage.achieve_section')->with([
            'achieves' => $achieves
        ]);
    }

    public function achieveAdd()
    {
        return view('admin.programpage.achieve_section_add');
    }

    public function achieveStore(Request $request)
    {
        $request->validate(
            [
                'title'                 => 'required',
                'description'           => 'required',
                'order'                 => 'required|numeric'
            ],
            [
                'title.required'                => 'Title Is Required.',
                'description.required'          => 'Description Is Required.',
                'order.required'                => 'Order number is Required.',
                'order.numeric'                 => 'Order number must be type of number.',
            ]
        );
        AchieveSection::newAchieve($request);
        $notification = array(
            'message'       => 'Achieve Section Created Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/achieve-section')->with($notification);
    }

    public function achieveEdit($id)
    {
        $achieve = AchieveSection::find($id);
        return view('admin.programpage.achieve_section_update')->with([
            'achieve' => $achieve
        ]);
    }

    public function achieveUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'title'                 => 'required',
                'description'           => 'required',
                'order'                 => 'required|numeric'
            ],
            [
                'title.required'                => 'Title Is Required.',
                'description.required'          => 'Description Is Required.',
                'order.required'                => 'Order number is Required.',
                'order.numeric'                 => 'Order number must be type of number.',
            ]
        );
        AchieveSection::updateAchieve($request, $id);
        $notification = array(
            'message'       => 'Achieve Section Updated Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/achieve-section')->with($notification);
    }

    public function achieveStatusUpdate($id)
    {
        if (AchieveSection::updateAchieveStatus($id))
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

    public function achieveDelete($id)
    {
        if (AchieveSection::deleteAchieve($id))
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
