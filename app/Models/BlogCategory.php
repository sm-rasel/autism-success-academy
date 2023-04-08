<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'blog_categories';
    protected $fillable = ['category_name','status'];

    public static $blogCategory, $image, $imageName, $imageUrl, $text, $directory;

    public static function newBlogCategory($request)
    {
        self::$blogCategory                      = new BlogCategory();
        self::$blogCategory->category_name       = $request->category_name;
        self::$blogCategory->status              = 1;
        self::$blogCategory->save();
    }

    public static function updateBlogCategory($request, $id)
    {
        self::$blogCategory                 = BlogCategory::find($id);
        self::$blogCategory->category_name  = $request->category_name;
//        self::$blogCategory->status              = self::$blogCategory->status;
//        self::$blogSection->is_featured         = 2;
        self::$blogCategory->save();
    }

    public static function deleteBlogCategory($id)
    {
        self::$blogCategory = BlogCategory::findOrFail($id);
        self::$blogCategory->delete();
        return true;
    }

    public static function updateStatus($id)
    {
        self::$blogCategory = BlogCategory::findOrFail($id);
        if (self::$blogCategory->status == 1)
        {
            self::$blogCategory->update(['status' => 2]);
            return true;
        }
        else
        {
            if (self::$blogCategory->update(['status' => 1]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}
