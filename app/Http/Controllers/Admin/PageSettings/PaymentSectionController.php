<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\PaymentSection;
use Illuminate\Http\Request;

class PaymentSectionController extends Controller
{
    public function paymentIndex()
    {
        $payments = PaymentSection::orderBy('id', 'desc')->get();
        return view('admin.programpage.payment_section')->with([
            'payments' => $payments
        ]);
    }

    public function paymentAdd()
    {
        return view('admin.programpage.payment_section_store');
    }

    public function paymentStore(Request $request)
    {
        $request->validate(
            [
                'title'             => 'required',
                'description_one'   => 'required',
                'description_two'   => 'required',
                'order'             => 'required|numeric',
            ],
            [
                'title.required'            => 'Title Is Required.',
                'description_one.required'  => 'Value Is Required.',
                'description_two.required'  => 'Title Two Is Required.',
                'order.required'            => 'Order Is Required.',
                'order.numeric'             => 'Order Must be type of Number.'
            ]
        );
        PaymentSection::newPayment($request);
        $notification = array(
            'message'       => 'Content created Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/payment-section')->with($notification);
    }

    public function paymentEdit($id)
    {
        $payment = PaymentSection::find($id);
        return view('admin.programpage.payment_section_update')->with([
            'payment' => $payment
        ]);
    }

    public function paymentUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'title'             => 'required',
                'description_one'   => 'required',
                'description_two'   => 'required',
                'order'             => 'required|numeric',
            ],
            [
                'title.required'            => 'Title Is Required.',
                'description_one.required'  => 'Value Is Required.',
                'description_two.required'  => 'Title Two Is Required.',
                'order.required'            => 'Order Is Required.',
                'order.numeric'             => 'Order Must be type of Number.'
            ]
        );
        PaymentSection::updatePayment($request, $id);
        $notification = array(
            'message'       => 'Content Updated Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/payment-section')->with($notification);
    }

    public function paymentStatusUpdate($id)
    {
        if (PaymentSection::paymentStatusUpdate($id))
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

    public function paymentDelete($id)
    {
        if (PaymentSection::paymentDelete($id))
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
