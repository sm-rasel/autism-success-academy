<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\InvestmentSection;
use Illuminate\Http\Request;

class InvestmentSectionController extends Controller
{
    public function investmentIndex()
    {
        $investments = InvestmentSection::orderBy('id', 'desc')->get();
        return view('admin.programpage.investment_section')->with([
            'investments' => $investments
        ]);
    }

    public function investmentAdd()
    {
        return view('admin.programpage.investment_section_store');
    }

    public function investmentStore(Request $request)
    {
        $request->validate(
            [
                'program_title'       => 'required',
                'summery'             => 'required',
                'description'         => 'required',
                'order'               => 'required|numeric',
            ],
            [
                'program_title.required'      => 'Title Two Is Required.',
                'summery.required'            => 'Summery Two Is Required.',
                'description.required'        => 'Description Two Is Required.',
                'order.required'              => 'Order Is Required.',
                'order.numeric'               => 'Order Must be type of Number.'
            ]
        );
        InvestmentSection::newInvestment($request);
        $notification = array(
            'message'       => 'Content created Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/investment-section')->with($notification);
    }

    public function investmentEdit($id)
    {
        $investment = InvestmentSection::find($id);
        return view('admin.programpage.investment_section_update')->with([
            'investment' => $investment
        ]);
    }

    public function investmentUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'program_title'       => 'required',
                'summery'             => 'required',
                'description'         => 'required',
                'order'               => 'required|numeric',
            ],
            [
                'program_title.required'      => 'Title Two Is Required.',
                'summery.required'            => 'Summery Two Is Required.',
                'description.required'        => 'Description Two Is Required.',
                'order.required'              => 'Order Is Required.',
                'order.numeric'               => 'Order Must be type of Number.'
            ]
        );
        InvestmentSection::updateInvestment($request, $id);
        $notification = array(
            'message'       => 'Content Updated Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/investment-section')->with($notification);
    }

    public function investmentStatusUpdate($id)
    {
        if (InvestmentSection::investStatusUpdate($id))
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

    public function investmentDelete($id)
    {
        if (InvestmentSection::investmentDelete($id))
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
