<?php

namespace App\Http\Controllers\Admin\PageSettings;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function blogCategoryIndex ()
    {
        $blogCategories = BlogCategory::orderBy('id', 'desc')->get();
        return view('admin.blogpage.blog_category_section', [
            'blogCategories' => $blogCategories
        ]);
    }

    public function blogCategoryAdd ()
    {
        return view('admin.blogpage.blog_category_add');
    }

    public function blogCategoryStore(Request $request)
    {
        $request->validate(
            [
                'category_name' => 'required'
            ],
            [
                'category_name.required' => 'Blog Category Name is Required.'
            ]
        );
        BlogCategory::newBlogCategory($request);
        $notification = array(
            'message' => 'Blog Category Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/blog-category')->with($notification);
    }

    public function blogCategoryEdit($id)
    {
        $category = BlogCategory::findOrFail($id);
        return view('admin.blogpage.blog_category_edit', [
            'category' => $category
        ]);
    }

    public function blogCategoryUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'category_name' => 'required'
            ],
            [
                'category_name.required' => 'Blog Category Name is Required.'
            ]
        );

        BlogCategory::updateBlogCategory($request, $id);
        $notification = array(
            'message' => 'Blog Category Created Successfully!',
            'alert-type' => 'success'
        );
        return redirect('admin/page-settings/blog-category')->with($notification);
    }

    public function blogCategoryDelete($id)
    {
        if (BlogCategory::deleteBlogCategory($id))
        {
            $data['success'] = true;
            $data['message'] = 'Blog Category Deleted Successfully';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Could not Deleted';
            return response()->json($data, 200);
        }
    }

    public function blogCategoryStatusUpdate($id)
    {
        if (BlogCategory::updateStatus($id))
        {
            $data['success'] = true;
            $data['message'] = 'Blog Category Status Updated Successfully';
            return response()->json($data, 200);
        }
        else
        {
            $data['success'] = false;
            $data['message'] = 'Could not Update';
            return response()->json($data, 200);
        }
    }
}
