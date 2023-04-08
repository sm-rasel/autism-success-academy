<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'media_section';
    protected $fillable = ['media_image','order','status'];

    public static $mediaSection, $image, $imageName, $imageUrl, $text, $directory;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('media_image');
        self::$text         = self::$image->getClientOriginalExtension();
        self::$imageName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = 'media_image/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newMediaSection($request)
    {
        self::$mediaSection                 = new MediaSection();
        self::$mediaSection->media_image    = self::getImageUrl($request);
        self::$mediaSection->order          = $request->order;
        self::$mediaSection->status         = 1;
        self::$mediaSection->save();
    }

    public static function updateMedia($request, $id)
    {
        self::$mediaSection                  = MediaSection::find($id);
        if ($request->file('media_image'))
        {
            if (file_exists(self::$mediaSection->media_image))
            {
                unlink(self::$mediaSection->media_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$mediaSection->media_image;
        }

        self::$mediaSection->media_image    = self::$imageUrl;
        self::$mediaSection->order          = $request->order;
        self::$mediaSection->save();
    }

    public static function deleteMedia($id)
    {
        self::$mediaSection = MediaSection::find($id);
        if (file_exists(self::$mediaSection->media_image))
        {
            unlink(self::$mediaSection->media_image);
        }
        self::$mediaSection->delete();
        return true;
    }

    public static function updateStatus($id)
    {
        self::$mediaSection = MediaSection::findOrFail($id);
        if (self::$mediaSection->status == 1)
        {
            self::$mediaSection->update(['status' => 2]);
            return true;
        }
        else
        {
            if (self::$mediaSection->update(['status' => 1]))
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
