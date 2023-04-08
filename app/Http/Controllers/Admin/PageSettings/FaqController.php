<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\FaqSection;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faqIndex()
    {
        $faqs = FaqSection::orderBy('id', 'desc')->get();
        return view('admin.faqpage.faq_section')->with([
            'faqs' => $faqs
        ]);
    }
    public function faqAdd()
    {
        return view('admin.faqpage.faq_section_add');
    }

    public function faqStore(Request $request)
    {
        $request->validate(
            [
                'question' => 'required',
                'answer' => 'required',
                'order' => 'required|numeric',
            ],
            [
                'order.required' => 'Order number is required',
                'order.numeric' => 'Order Number Must be Numeric.'
            ]
        );

        FaqSection::newFaqSection($request);
        $notification = array(
            'message' => 'Faq Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/faq-section')->with($notification);
    }

    public function faqEdit($id)
    {
        $faq = FaqSection::find($id);
        return view('admin.faqpage.faq_section_update', [
            'faq' => $faq
        ]);
    }

    public function faqUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'faq_image' => 'mimes:jpg,png,webp|max:2048',
                'order' => 'required|numeric',
            ],
            [
                'faq_image.mimes' => 'Only Jpg, Webp and Png can be uploaded',
                'faq_image.max' => 'Maximum File Upload Size is 2MB',
                'order.required' => 'Order number is required',
                'order.numeric' => 'Order Number Must be Numeric.'
            ]
        );
        FaqSection::updateFaq($request, $id);
        $notification = array(
            'message' => 'Faq Section Update Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/faq-section')->with($notification);
    }

    public function faqDelete($id)
    {
        if (FaqSection::deleteFaq($id))
        {
            $data['success'] = true;
            $data['message'] = 'Faq Section Deleted Successfully';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Could not Deleted';
            return response()->json($data, 200);
        }

    }

    public function faqStatusUpdate($id)
    {
        if (FaqSection::updateStatus($id))
        {
            $data['success'] = true;
            $data['message'] = 'Faq Updated Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Faq Could Not Updated !';
            return response()->json($data, 200);
        }

    }

    public function faqFeaturedStatusUpdate($id)
    {
        if (FaqSection::featuredStatus($id))
        {
            $data['success'] = true;
            $data['message'] = 'Featured Status Updated Successfully';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Featured Could be Updated';
            return response()->json($data, 200);
        }
    }
}
