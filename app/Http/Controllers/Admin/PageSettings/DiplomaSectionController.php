<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\DiplomaSection;
use Illuminate\Http\Request;

class DiplomaSectionController extends Controller
{
    public function diplomaIndex()
    {
        $diplomas = DiplomaSection::orderBy('id', 'desc')->get();
        return view('admin.programpage.diploma_section')->with([
            'diplomas' => $diplomas
        ]);
    }

    public function diplomaAdd(){
        return view('admin.programpage.diploma_section_add');
    }

    public function diplomaStore(Request $request){
        $request->validate(
            [
                'title'                 => 'required',
                'description_one'       => 'required',
                'course_value_one'      => 'required',
                'description_two'       => 'required',
                'course_value_two'      => 'required',
                'total_value'           => 'required',
                'order'                 => 'required|numeric'
            ],
            [
                'title.required'                => 'Title Is Required.',
                'description_one.required'      => 'Description Two Is Required.',
                'course_value_one.required'     => 'Course Value One Is Required.',
                'description_two.required'      => 'Description Two is Required.',
                'course_value_two.required'     => 'Course Value Two is Required.',
                'total_value.required'          => 'Total Value is Required.',
                'order.required'                => 'Order number is Required.',
                'order.numeric'                 => 'Order number must be type of number.',
            ]
        );
        DiplomaSection::addDiploma($request);
        $notification = array(
            'message'       => 'Diploma Section Created Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/diploma-section')->with($notification);
    }

    public function diplomatEdit($id){
        $diploma = DiplomaSection::find($id);
        return view('admin.programpage.diploma_section_update')->with([
            'diploma' => $diploma
        ]);
    }

    public function diplomaUpdate(Request $request, $id){
        $request->validate(
            [
                'title'                 => 'required',
                'description_one'       => 'required',
                'course_value_one'      => 'required',
                'description_two'       => 'required',
                'course_value_two'      => 'required',
                'total_value'           => 'required',
                'order'                 => 'required|numeric'
            ],
            [
                'title.required'                => 'Title Is Required.',
                'description_one.required'      => 'Description Two Is Required.',
                'course_value_one.required'     => 'Course Value One Is Required.',
                'description_two.required'      => 'Description Two is Required.',
                'course_value_two.required'     => 'Course Value Two is Required.',
                'total_value.required'          => 'Total Value is Required.',
                'order.required'                => 'Order number is Required.',
                'order.numeric'                 => 'Order number must be type of number.',
            ]
        );
        DiplomaSection::updateDiploma($request, $id);
        $notification = array(
            'message'       => 'Diploma Section Updated Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/diploma-section')->with($notification);
    }

    public function diplomaStatusUpdate($id){
        if (DiplomaSection::statusUpdate($id))
        {
            $data['success'] = true;
            $data['message'] = 'Status Update Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Status Cannot updated !';
            return response()->json($data, 200);
        }
    }

    public function diplomaDelete($id){
        if (DiplomaSection::deleteDiploma($id))
        {
            $data['success'] = true;
            $data['message'] = 'Status Deleted Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Status Cannot be Deleted !';
            return response()->json($data, 200);
        }
    }
}
