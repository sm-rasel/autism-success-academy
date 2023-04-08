<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\ProgramSlider;
use Illuminate\Http\Request;

class ProgramSliderController extends Controller
{
    public function programIndex(){
        $programs = ProgramSlider::orderBy('id', 'desc')->get();
        return view('admin.programpage.program_section')->with([
            'programs' => $programs
        ]);
    }

    public function programAdd(){
        return view('admin.programpage.program_section_add');
    }

    public function programStore(Request $request){
        $request->validate(
            [
                'program_title'     => 'required',
                'order'             => 'required|numeric'
            ],
            [
                'program_title.required'    => 'Piller Name Required',
                'order.required'            => 'Order Number is Required',
                'order.numeric'             => 'Order Number Must be Number'
            ]
        );
        ProgramSlider::programAdd($request);
        $notification = array(
            'message' => 'Program Add successfully !',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/program-section')->with($notification);
    }

    public function programEdit($id){
        $program = ProgramSlider::find($id);
        return view('admin.programpage.program_section_update')->with([
            'program' => $program
        ]);
    }

    public function programUpdate(Request $request, $id){
        $request->validate(
            [
                'program_title'     => 'required',
                'order'             => 'required|numeric'
            ],
            [
                'program_title.required'    => 'Piller Name Required',
                'order.required'            => 'Order Number is Required',
                'order.numeric'             => 'Order Number Must be Number'
            ]
        );
        ProgramSlider::programUpdate($request, $id);
        $notification = array(
            'message'       => 'Program update successfully !',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/program-section')->with($notification);
    }

    public function programStatusUpdate($id){
        if (ProgramSlider::statusUpdate($id))
        {
            $data['success'] = true;
            $data['message'] = 'Program Status Update Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Program Status Cannot Update !';
            return response()->json($data, 200);
        }
    }

    public function programDelete($id){
        if (ProgramSlider::deleteProgram($id))
        {
            $data['success'] = true;
            $data['message'] = 'Program Deleted Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Program Cannot Deleted !';
            return response()->json($data, 200);
        }
    }
}
