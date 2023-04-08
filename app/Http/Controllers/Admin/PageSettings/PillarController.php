<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\PillarContent;
use App\Models\PillarProgram;
use Illuminate\Http\Request;

class PillarController extends Controller
{
    //Pillar Heading
    public function pillarContentIndex()
    {
        $pillar = PillarContent::first();
        return view('admin.programpage.pillar_content')->with([
            'pillar' => $pillar
        ]);
    }

    public function pillarContentStore(Request $request, $id = null)
    {
        $request->validate(
            [
                'pillar_title'          => 'required',
                'description'           => 'required',
                'description_bottom'    => 'required',
            ],
            [
                'pillar_title.required'         => 'Title Is Required.',
                'description.required'          => 'Title Two Is Required.',
                'description_bottom.required'   => 'Title Three Is Required.'
            ]
        );
        PillarContent::newPillarHeading($request, $id);
        $notification = array(
            'message'       => 'Content Updated Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/pillar-content-section')->with($notification);
    }



    //Pillar Program
    public function pillarProgramIndex()
    {
        $pillars = PillarProgram::orderBy('id', 'desc')->get();
        return view('admin.programpage.pillar_program')->with([
            'pillars' => $pillars
        ]);
    }

    public function pillarProgramAdd()
    {
        return view('admin.programpage.pillar_program_store');
    }

    public function pillarProgramStore(Request $request)
    {
        $request->validate(
            [
                'title'         => 'required',
                'value_p'       => 'required',
                'description'   => 'required',
                'order'         => 'required|numeric',
            ],
            [
                'title.required'        => 'Title Is Required.',
                'value_p.required'      => 'Value Is Required.',
                'description.required'  => 'Title Two Is Required.',
                'order.required'        => 'Order Is Required.',
                'order.numeric'         => 'Order Must be type of Number.'
            ]
        );
        PillarProgram::newPillarProgram($request);
        $notification = array(
            'message'       => 'Content created Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/pillar-program-section')->with($notification);
    }

    public function pillarProgramEdit($id)
    {
        $pillar = PillarProgram::find($id);
        return view('admin.programpage.pillar_program_update')->with([
            'pillar' => $pillar
        ]);
    }

    public function pillarProgramUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'title'         => 'required',
                'value_p'       => 'required',
                'description'   => 'required',
                'order'         => 'required|numeric',
            ],
            [
                'title.required'        => 'Title Is Required.',
                'value_p.required'      => 'Value Is Required.',
                'description.required'  => 'Title Two Is Required.',
                'order.required'        => 'Order Is Required.',
                'order.numeric'         => 'Order Must be type of Number.'
            ]
        );
        PillarProgram::updatePillarProgram($request, $id);
        $notification = array(
            'message'       => 'Content Updated Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/pillar-program-section')->with($notification);
    }

    public function pillarStatusUpdate($id)
    {
        if (PillarProgram::pillarStatusUpdate($id))
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

    public function pillarProgramDelete($id)
    {
        if (PillarProgram::pillarDelete($id))
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
