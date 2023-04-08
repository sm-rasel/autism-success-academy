<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\DiscussionContent;
use App\Models\DiscussionSection;
use Illuminate\Http\Request;

class DiscussionSectionController extends Controller
{
    public function discussionContentIndex()
    {
        $discussions = DiscussionContent::first();
        return view('admin.programpage.discussion_content')->with([
            'discussions' => $discussions
        ]);
    }

    public function discussionContentStore(Request $request, $id = null)
    {
        $request->validate(
            [
                'heading'           => 'required',
                'title_one'         => 'required',
                'title_two'         => 'required',
                'title_three'       => 'required',
                'btn_url'           => 'required|url',
                'discussion_image'  => 'required|mimes:jpg,png,webp|max:10048'
            ],
            [
                'heading.required'              => 'Heading Is Required.',
                'title_one.required'            => 'Title One Is Required.',
                'title_two.required'            => 'Title Two Is Required.',
                'title_three.required'          => 'Title Three Is Required.',
                'btn.required'                  => 'Button  Is Required.',
                'btn.url'                       => 'Button Url must be Type of Url.',
                'discussion_image.required'     => 'Image is Required.',
                'discussion_image.mimes'        => 'Only Jpg, jpeg, png, webp Can Be Uploaded.',
                'discussion_image.max'          => 'Maximum file size is 10MB.',
            ]
        );
        DiscussionContent::newDiscussionSection($request, $id);
        $notification = array(
            'message'       => 'Discussion Section Updated Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/discussion-content-section')->with($notification);
    }


    public function discussionIndex()
    {
        $discussions = DiscussionSection::orderBy('id', 'desc')->get();
        return view('admin.programpage.discussion_section')->with([
            'discussions' => $discussions
        ]);
    }

    public function discussionAdd()
    {
        return view('admin.programpage.discussion_section_store');
    }

    public function discussionStore(Request $request)
    {
        $request->validate(
            [
                'discussion_content'   => 'required',
                'order'                => 'required|numeric'
            ],
            [
                'discussion_content.required'  => 'Content is Required',
                'order.required'               => 'Order Number is Required',
                'order.numeric'                => 'Order Number Must be Number'
            ]
        );
        DiscussionSection::newDiscussion($request);
        $notification = array(
            'message'       => 'Contented Created Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/discussion-section')->with($notification);

    }

    public function discussionEdit($id)
    {
        $discussion = DiscussionSection::find($id);
        return view('admin.programpage.discussion_section_update')->with([
            'discussion' => $discussion
        ]);
    }

    public function discussionUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'discussion_content'   => 'required',
                'order'                => 'required|numeric'
            ],
            [
                'discussion_content.required'  => 'Content is Required',
                'order.required'               => 'Order Number is Required',
                'order.numeric'                => 'Order Number Must be Number'
            ]
        );
        DiscussionSection::updateDiscussion($request, $id);
        $notification = array(
            'message'       => 'Contented Updated Successfully!',
            'alert-type'    => 'success'
        );
        return redirect('admin/page-settings/discussion-section')->with($notification);
    }

    public function discussionStatusUpdate($id)
    {
        if (DiscussionSection::discussionStausUpdate($id))
        {
            $data['success'] = true;
            $data['message'] = 'Content Status Update Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Content Status Cannot be Updated !';
            return response()->json($data, 200);
        }
    }

    public function discussionDelete($id)
    {
        if (DiscussionSection::deleteDiscussion($id))
        {
            $data['success'] = true;
            $data['message'] = 'Content Deleted Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Content Status Cannot be Deleted !';
            return response()->json($data, 200);
        }
    }
}
