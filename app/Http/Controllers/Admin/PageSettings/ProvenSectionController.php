<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\ProvenSection;
use Illuminate\Http\Request;

class ProvenSectionController extends Controller
{
    public function provenIndex()
    {
        $provens = ProvenSection::orderBy('id', 'desc')->get();
        return view('admin.programpage.proven_section')->with([
            'provens' => $provens
        ]);
    }

    public function provenAdd(){
        return view('admin.programpage.proven_section_add');
    }

    public function provenStore(Request $request){
        $request->validate(
            [
                'title'                 => 'required',
                'shot_description_one'  => 'required',
                'shot_description_two'  => 'required',
                'shot_description_three'=> 'required',
                'shot_description_four' => 'required',
                'shot_description_five' => 'required',
                'proven_image'          => 'required|mimes:jpg,png,webp|max:10048',
            ],
            [
                'title.required'                    => 'Title Is Required.',
                'shot_description_one.required'     => 'Short Description One Is Required.',
                'shot_description_two.required'     => 'Short Description Two Is Required.',
                'shot_description_three.required'   => 'Short Description Three Is Required.',
                'shot_description_four.required'    => 'Short Description Four Is Required.',
                'shot_description_five.required'    => 'Short Description Five Is Required.',
                'proven_image.required'             =>'Image is Required.',
                'proven_image.mimes'                =>'Only Jpg, png, webp Can Be Uploaded.',
                'proven_image.max'                  =>'Maximum file size is 10MB.',
            ]
        );
        ProvenSection::newProvenSection($request);
        $notification = array(
            'message'       => 'Proven Section Created Successfully.',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/proven-section')->with($notification);
    }

    public function provenEdit($id){
        $proven = ProvenSection::find($id);
        return view('admin.programpage.proven_section_update')->with([
            'proven' => $proven
        ]);
    }

    public function provenUpdate(Request $request, $id){
        $request->validate(
            [
                'title'                 => 'required',
                'shot_description_one'  => 'required',
                'shot_description_two'  => 'required',
                'shot_description_three'=> 'required',
                'shot_description_four' => 'required',
                'shot_description_five' => 'required',
            ],
            [
                'title.required'                    => 'Title Is Required.',
                'shot_description_one.required'     => 'Short Description One Is Required.',
                'shot_description_two.required'     => 'Short Description Two Is Required.',
                'shot_description_three.required'   => 'Short Description Three Is Required.',
                'shot_description_four.required'    => 'Short Description Four Is Required.',
                'shot_description_five.required'    => 'Short Description Five Is Required.'
            ]
        );
        ProvenSection::updateProvenSection($request, $id);
        $notification = array(
            'message'       => 'Proven Section Update Successfully.',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/proven-section')->with($notification);
    }
    public function provenStatusUpdate($id){
        if (ProvenSection::statusUpdate($id)){
            $data['success'] = true;
            $data['message'] = 'Status Update Successfully !';
            return response()->json($data, 200);
        }
        else{
            $data['success'] = false;
            $data['message'] = 'Status Cannot Update !';
            return response()->json($data, 200);
        }
    }

    public function provenDelete($id){
        if (ProvenSection::deleteSection($id)){
            $data['success'] = true;
            $data['message'] = 'Status Deleted Successfully !';
            return response()->json($data, 200);
        }
        else{
            $data['success'] = false;
            $data['message'] = 'Status Cannot Deleted !';
            return response()->json($data, 200);
        }
    }
}
