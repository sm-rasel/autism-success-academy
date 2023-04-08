<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\ProgramSection;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    // Programs Methods
    public function programsIndex()
    {
        $programs = ProgramSection::orderBy('id', 'desc')->get();
        return view('admin.homepage.programs_section', [
            'programs' => $programs
        ]);
    }
    public function programsAdd(Request $request)
    {
        return view('admin.homepage.programs_section_add');
    }
    public function programsStore(Request $request)
    {
        $request->validate(
            [
                'pillar_name' => 'required',
                'pillar_heading' => 'required',
                'pillar_text' => 'required',
                'pillar_link' => 'required|url',
                'order' => 'required|numeric'
            ], 
            [
                'pillar_name.required' => 'Pillar Name is required',
                'pillar_heading.required' => 'Pillar Heading is required',
                'pillar_text.required' => 'Pillar Text is required',
                'pillar_link.required' => 'Pillar Link is required',
                'pillar_link.url' => 'Pillar Link must be URL',
                'order.required' => 'Order is required',
                'order.numeric' => 'Input Must Be Numeric'
            ]
        );
        ProgramSection::newProgramSection($request);
        $notification = array(
            'message' => 'Programs Section Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/programs-section')->with($notification);
    }
    public function programsEdit(Request $request, $id)
    {
        $program = ProgramSection::find($id);
        return view('admin.homepage.programs_section_update', [
            'program' => $program
        ]);
    }
    public function programsUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'pillar_name' => 'required',
                'pillar_heading' => 'required',
                'pillar_text' => 'required',
                'pillar_link' => 'required|url',
                'order' => 'required|numeric'
            ], 
            [
                'pillar_name.required' => 'Pillar Name is required',
                'pillar_heading.required' => 'Pillar Heading is required',
                'pillar_text.required' => 'Pillar Text is required',
                'pillar_link.required' => 'Pillar Link is required',
                'pillar_link.url' => 'Pillar Link must be URL',
                'order.required' => 'Order is required',
                'order.numeric' => 'Input Must Be Numeric'
            ]
        );
        ProgramSection::updateProgram($request, $id);
        $notification = array(
            'message' => 'Programs Section Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/programs-section')->with($notification);
    }
    public function programsDelete(Request $request, $id)
    {
        if(ProgramSection::deletePrograms($id)) {
            $data['success'] = true;
            $data['message'] = 'Programs Section Deleted Successfully';
            return response()->json($data, 200);
        } else {
            $data['success'] = false;
            $data['message'] = 'Could Not Delete';
            return response()->json($data, 200);
        }

    }
    public function prStatusUpdate(Request $request, $id)
    {
        if(ProgramSection::updateStatus($id)) {
            $data['success'] = true;
            $data['message'] = 'Programs Status Updated Successfully';
            return response()->json($data, 200);
        } else {
            $data['success'] = false;
            $data['message'] = 'Could Not Delete';
            return response()->json($data, 200);
        }
    }
}
