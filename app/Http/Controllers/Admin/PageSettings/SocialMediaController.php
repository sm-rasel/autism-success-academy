<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\SocialMediaSection;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function sMediaIndex()
    {
        $media = SocialMediaSection::first();
        return view('admin.homepage.social_media_section')->with(['media' => $media]);
    }

    public function sMediaStore(Request $request, $id = null)
    {
        $request->validate(
            [
                'instagram_url' => 'required|url',
                'facebook_url' => 'required|url'
            ],
            [
                'instagram_url.required'    => 'Instagram Url is required',
                'instagram_url.url'         => 'Instagram Url must be Type of URL',
                'facebook_url.required'     => 'Facebook Url is required',
                'facebook_url.url'          => 'Facebook Url must be Type of URL'
            ]
        );
        SocialMediaSection::newSocialMedia($request, $id);
        $notification = array(
            'message' => 'Programs Section Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/social-media-section')->with($notification);
    }
}
