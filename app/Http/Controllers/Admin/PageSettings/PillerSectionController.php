<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\PillerSection;
use Illuminate\Http\Request;

class PillerSectionController extends Controller
{
    public function pillerIndex(){
        $pillers = PillerSection::orderBy('id', 'desc')->get();
        return view('admin.programpage.piller_section')->with([
            'pillers' => $pillers
        ]);
    }

    public function pillerAdd() {
        return view('admin.programpage.piller_section_add');
    }

    public function pillerStore(Request $request)
    {
        $request->validate(
            [
                'piller_name'   => 'required',
                'order'         => 'required|numeric'
            ],
            [
                'piller_name.required'  => 'Piller Name Required',
                'order.required'        => 'Order Number is Required',
                'order.numeric'         => 'Order Number Must be Number'
            ]
        );
        PillerSection::pillerAdd($request);
        $notification = array(
            'message' => 'Piller Add successfully !',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/piller-section')->with($notification);
    }
    public function pillerEdit($id)
    {
        $piller = PillerSection::find($id);
        return view('admin.programpage.piller_section_update')->with([
            'piller' => $piller
        ]);
    }

    public function pillerUpdate(Request $request, $id){
        $request->validate(
            [
                'piller_name'   => 'required',
                'order'         => 'required|numeric'
            ],
            [
                'piller.required' => 'Piller Name Required',
                'order.required' => 'Order Number is Required',
                'order.numeric' => 'Order Number Must be Number'
            ]
        );
        PillerSection::pillerUpdate($request, $id);
        $notification = array(
            'message' => 'Piller Update successfully !',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/piller-section')->with($notification);
    }

    public function pillerStatusUpdate($id) {
        if (PillerSection::statusUpdate($id))
        {
            $data['success'] = true;
            $data['message'] = 'Piller Update Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Piller Cannot Updated !';
            return response()->json($data, 200);
        }
    }

    public function pillerDelete($id){
        if (PillerSection::deletePiller($id))
        {
            $data['success'] = true;
            $data['message'] = 'Piller Deleted Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Piller Cannot Deleted !';
            return response()->json($data, 200);
        }
    }
}
