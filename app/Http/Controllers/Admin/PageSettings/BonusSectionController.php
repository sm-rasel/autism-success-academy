<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\BonusSection;
use Illuminate\Http\Request;

class BonusSectionController extends Controller
{
    public function bonusIndex()
    {
        $bonuses = BonusSection::orderBy('id', 'Desc')->get();
        return view('admin.programpage.bonus_section')->with([
            'bonuses' => $bonuses
        ]);
    }

    public function bonusAdd()
    {
        return view('admin.programpage.bonus_section_store');
    }

    public function bonusStore(Request $request)
    {
        $request->validate(
            [
                'title'         => 'required',
                'values'        => 'required',
                'description'   => 'required',
                'order'         => 'required|numeric',
            ],
            [
                'title.required'        => 'Title Is Required.',
                'values.required'       => 'Value Is Required.',
                'description.required'  => 'Title Two Is Required.',
                'order.required'        => 'Order Is Required.',
                'order.numeric'         => 'Order Must be type of Number.'
            ]
        );
        BonusSection::newBonus($request);
        $notification = array(
            'message'       => 'Content created Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/bonus-section')->with($notification);
    }

    public function bonusEdit($id)
    {
        $bonus = BonusSection::find($id);
        return view('admin.programpage.bonus_section_update')->with([
            'bonus' => $bonus
        ]);
    }

    public function bonusUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'title'         => 'required',
                'values'        => 'required',
                'description'   => 'required',
                'order'         => 'required|numeric',
            ],
            [
                'title.required'        => 'Title Is Required.',
                'values.required'       => 'Value Is Required.',
                'description.required'  => 'Title Two Is Required.',
                'order.required'        => 'Order Is Required.',
                'order.numeric'         => 'Order Must be type of Number.'
            ]
        );
        BonusSection::updateBonus($request, $id);
        $notification = array(
            'message'       => 'Content Updated Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/bonus-section')->with($notification);
    }

    public function bonusStatusUpdate($id)
    {
        if (BonusSection::bonusStatusUpdate($id))
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

    public function bonusDelete($id)
    {
        if (BonusSection::bonusDelete($id))
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
