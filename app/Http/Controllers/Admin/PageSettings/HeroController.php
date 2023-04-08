<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public $hero, $heroes;


    // Hero Section Methods
    public function heroIndex()
    {
        return view('admin.homepage.hero_section', [
            'heroes' => HeroSection::orderBy('id', 'desc')->get(),
        ]);
    }

    public function heroAdd()
    {
        return view('admin.homepage.hero_section_add');
    }

    public function heroStore(Request $request)
    {
        $request->validate(
            [
                'heading_one'   => 'required',
                'tag_line'      => 'required',
                'question_text' => 'required',
                'heading_two'   => 'required',
                'heading_three' => 'required',
                'roll_out'      => 'required',
                'button_text'   => 'required',
                'button_url'    => 'required|url',
                'video'         => 'mimes:mp4,mov|max:40000',
                'logo_image'    => 'mimes:jpg,png|max:2048'

            ],
            [
                'heading_one.required'      => 'Heading One is required',
                'tag_line.required'         => 'Tag Line is required',
                'question_text.required'    => 'Question Text is required',
                'heading_two.required'      => 'Heading Two is required',
                'heading_three.required'    => 'Heading Three is required',
                'roll_out.required'         => 'Roll Out is required',
                'button_text.required'      => 'Button Text is required',
                'button_url.required'       => 'Button Url is required',
                'button_url.url'            => 'Button URL must be type of Url ',
                'video.mimes'               => 'Only mp4,mov and ogg File can be Uploaded',
                'video.max'                 => 'Maximum File Uploaded Size is 40MB',
                'logo_image.mimes'          => 'Only Jpg and Png can be uploaded',
                'logo_image.max'            => 'Maximum File Upload Size is 2MB'
            ]
        );

        HeroSection::newHeroSection($request);
        $notification = array(
            'message' => 'Programs Section Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/hero-section')->with($notification);
    }

    public function heroEdit($id)
    {
        return view('admin.homepage.hero_section_update', [
            'hero' => HeroSection::find($id),
        ]);
    }


    public function heroUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'heading_one'   => 'required',
                'tag_line'      => 'required',
                'question_text' => 'required',
                'heading_two'   => 'required',
                'heading_three' => 'required',
                'roll_out'      => 'required',
                'button_text'   => 'required',
                'button_url'    => 'required|url',
                'video'         => 'mimes:mp4,mov|max:40000',
            'logo_image'        => 'mimes:jpg,png|max:2048'
            ],
            [
                'heading_one.required'      => 'Heading One is required',
                'tag_line.required'         => 'Tag Line is required',
                'question_text.required'    => 'Question Text is required',
                'heading_two.required'      => 'Heading Two is required',
                'heading_three.required'    => 'Heading Three is required',
                'roll_out.required'         => 'Roll Out is required',
                'button_text.required'      => 'Button Text is required',
                'button_url.required'       => 'Button Url is required',
                'button_url.url'            => 'Button URL must be type of Url ',
                'video.mimes'               => 'Only mp4,mov and ogg File can be Uploaded',
                'video.max'                 => 'Maximum File Uploaded Size is 40MB',
                'logo_image.mimes'          => 'Only Jpg and Png can be uploaded',
                'logo_image.max'            => 'Maximum File Upload Size is 2MB'
            ]
        );

        HeroSection::updateHero($request, $id);
        $notification = array(
            'message' => 'Hero Section Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/hero-section')->with($notification);
    }

    public function heroDelete($id)
    {
        if (HeroSection::deleteHero($id)) {
            $data['success'] = true;
            $data['message'] = 'Hero Section Deleted Successfully';
            return response()->json($data, 200);
        } else {
            $data['success'] = false;
            $data['message'] = 'Hero Section Can Not be Deleted';
            return response()->json($data, 200);
        }


    }

    public function heroStatusUpdate(Request $request, $id)
    {
        if (HeroSection::statusUpdate($id)) {
            $data['success'] = true;
            $data['message'] = 'Status Updated Successfully';
            return response()->json($data, 200);
        } else {
            $data['success'] = false;
            $data['message'] = 'Status Can Not be Updated';
            return response()->json($data, 200);
        }
    }




}
