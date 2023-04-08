<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'blog_section';
    protected $fillable = ['blog_category_id','title','slug','blog_image', 'description', 'is_featured', 'status'];

    public static $blogSection, $image, $imageName, $imageUrl, $text, $directory;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('blog_image');
        self::$text         = self::$image->getClientOriginalExtension();
        self::$imageName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = 'blog_image/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newBlogSection($request)
    {
        self::$blogSection                      = new BlogSection();
        self::$blogSection->blog_image          = self::getImageUrl($request);
        self::$blogSection->blog_category_id    = $request->blog_category_id;
        self::$blogSection->title               = $request->title;
        self::$blogSection->slug                = Str::slug($request->title);
        self::$blogSection->description         = $request->description;
        self::$blogSection->status              = 1;
        self::$blogSection->is_featured         = $request->is_featured;
        self::$blogSection->save();
    }

    public static function updateBlog($request, $slug)
    {
        self::$blogSection = BlogSection::where('slug',$slug)->first();
        if ($request->file('blog_image'))
        {
            if (file_exists(self::$blogSection->blog_image))
            {
                unlink(self::$blogSection->blog_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$blogSection->blog_image;
        }
        self::$blogSection->blog_category_id    = $request->blog_category_id;
        self::$blogSection->title               = $request->title;
        self::$blogSection->slug                = uniqid().Str::slug($request->title);
        self::$blogSection->description         = $request->description;
        self::$blogSection->blog_image          = self::$imageUrl;
        self::$blogSection->status              = 1;
        self::$blogSection->is_featured         = 2;
        self::$blogSection->update();
    }

    public static function deleteBlog($id)
    {
        self::$blogSection = BlogSection::find($id);
        if (file_exists(self::$blogSection->blog_image))
        {
            unlink(self::$blogSection->blog_image);
        }
        self::$blogSection->delete();
        return true;
    }

    public static function updateStatus($id)
    {
        self::$blogSection = BlogSection::find($id);
        if (self::$blogSection->status == 1)
        {
            self::$blogSection->update(['status' => 2]);
            return true;
        }
        else
        {
            if (self::$blogSection->update(['status' => 1]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public static function featuredStatus($id)
    {
        self::$blogSection = BlogSection::find($id);
        if (self::$blogSection->is_featured == 2)
        {
            self::$blogSection->update(['is_featured' => 1]);
            return true;
        }
        else
        {
            if (self::$blogSection->update(['is_featured' =>2]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function blogCategory() {
        return $this->belongsTo(BlogCategory::class);
    }
}
