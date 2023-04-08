<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussionContent extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'discussion_contents';
    protected $fillable = ['heading', 'title_one','title_two','title_three','discussion_image','btn_url', 'status'];
    public static $discussionSection, $image, $imageName, $imageUrl, $directory, $text;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('discussion_image');
        self::$text         = self::$image->getClientOriginalExtension();
        self::$imageName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = 'discussion_image/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newDiscussionSection($request, $id)
    {
        if ($id == null)
        {
            self::$discussionSection                    = new DiscussionContent();
            self::$discussionSection->discussion_image  = self::getImageUrl($request);
        }
        else
        {
            self::$discussionSection = DiscussionContent::find($id);
            if ($request->file('discussion_image'))
            {
                if (file_exists(self::$discussionSection->discussion_image))
                {
                    unlink(self::$discussionSection->discussion_image);
                }
                self::$imageUrl = self::getImageUrl($request);
            }
            else
            {
                self::$imageUrl = self::$discussionSection->discussion_image;
            }
            self::$discussionSection->discussion_image   = self::$imageUrl;
        }
        self::$discussionSection->heading       = $request->heading;
        self::$discussionSection->title_one     = $request->title_one;
        self::$discussionSection->title_two     = $request->title_two;
        self::$discussionSection->title_three   = $request->title_three;
        self::$discussionSection->btn_url       = $request->btn_url;
        self::$discussionSection->status        = 1;
        if ($id == null)
        {
            self::$discussionSection->save();
        }
        else
        {
            self::$discussionSection->update();
        }
    }
}
