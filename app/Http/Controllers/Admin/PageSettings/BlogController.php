<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\BlogSection;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogIndex()
    {
        $blogs = BlogSection::with('blogCategory')->orderBy('id', 'desc')->get();
        return view('admin.blogpage.blog_section')->with([
            'blogs' => $blogs
        ]);
    }
    public function blogAdd()
    {
        $categories = BlogCategory::get(['category_name','id']);
        return view('admin.blogpage.blog_section_add')->with(['categories' => $categories]);
    }

    public function blogStore(Request $request)
    {
        $request->validate(
            [
                'blog_image' => 'required|mimes:jpg,png,webp|max:2048',
                'blog_category_id' => 'required|numeric',
                'title' => 'required',
                'description' => 'required'
            ],
            [
                'blog_image.mimes' => 'Only Jpg, Webp and Png can be uploaded',
                'blog_image.max' => 'Maximum File Upload Size is 2MB',
                'blog_image.required' => 'Blog Image is required',
                'blog_category_id.required' => 'Blog Category is required',
                'blog_category_id.numeric' => 'Blog Category Must be Numeric.',
                'title.required' => 'Title is required',
                'description.required' => 'Description is required',
            ]
        );

        BlogSection::newBlogSection($request);
        $notification = array(
            'message' => 'Blog Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/blog-section')->with($notification);
    }

    public function blogEdit($slug)
    {
        $categories = BlogCategory::get(['category_name','id']);
        $blog = BlogSection::where('slug',$slug)->first();
        return view('admin.blogpage.blog_section_update', [
            'blog' => $blog,
            'categories' => $categories
        ]);
    }

    public function blogUpdate(Request $request, $id)
    {
        // return $request->all();
        $request->validate(
            [
                'blog_image' => 'required|mimes:jpg,png,webp|max:2048',
                'blog_category_id' => 'required|numeric',
                'title' => 'required',
                'description' => 'required'
            ],
            [
                'blog_image.mimes' => 'Only Jpg, Webp and Png can be uploaded',
                'blog_image.max' => 'Maximum File Upload Size is 2MB',
                'blog_image.required' => 'Blog Image is required',
                'blog_category_id.required' => 'Blog Category is required',
                'blog_category_id.numeric' => 'Blog Category Must be Numeric.',
                'title.required' => 'Title is required',
                'description.required' => 'Description is required',
            ]
        );
        BlogSection::updateBlog($request, $id);
        $notification = array(
            'message' => 'Blog Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/blog-section')->with($notification);
    }

    public function blogDelete($id)
    {
        if (BlogSection::deleteBlog($id))
        {
            $data['success'] = true;
            $data['message'] = 'Blog Deleted Successfully';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Could not Deleted';
            return response()->json($data, 200);
        }

    }

    public function blogStatusUpdate($id)
    {
        if (BlogSection::updateStatus($id))
        {
            $data['success'] = true;
            $data['message'] = 'Blog Updated Successfully !';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Blog Could Not Updated !';
            return response()->json($data, 200);
        }

    }

    public function blogFeaturedStatusUpdate($id)
    {
        if (BlogSection::featuredStatus($id))
        {
            $data['success'] = true;
            $data['message'] = 'Featured Status Updated Successfully';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Featured Could Not Updated';
            return response()->json($data, 200);
        }
    }
}
