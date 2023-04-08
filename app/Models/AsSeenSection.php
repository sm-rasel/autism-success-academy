<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsSeenSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'as_seen_section';
    protected $fillable = ['seen_image', 'order', 'status'];
    public static $seenSection, $image, $imageName, $text, $imageUrl, $directory;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('seen_image');
        self::$text         = self::$image->getClientOriginalExtension();
        self::$imageName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = 'as_seen_image/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newAsSeen($request)
    {
        self::$seenSection              = new AsSeenSection();
        self::$seenSection->order       = $request->order;
        self::$seenSection->seen_image  = self::getImageUrl($request);
        self::$seenSection->save();
    }

    public static function updateAsSeen($request, $id)
    {
        self::$seenSection = AsSeenSection::find($id);
        if ($request->file('seen_image'))
        {
            if (file_exists(self::$seenSection->seen_image))
            {
                unlink(self::$seenSection->seen_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$seenSection->seen_image;
        }
        self::$seenSection->order = $request->order;
        self::$seenSection->seen_image = self::$imageUrl;
        self::$seenSection->save();
    }

    public static function deleteSeen($id)
    {
        self::$seenSection = AsSeenSection::find($id);
        if (self::$seenSection)
        {
            if (file_exists(self::$seenSection->seen_image))
            {
                unlink(self::$seenSection->seen_image);
            }
            self::$seenSection->delete();
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function updateStatus($id)
    {
        self::$seenSection = AsSeenSection::findOrFail($id);
        if (self::$seenSection->status == 1)
        {
            self::$seenSection->update(['status'=>2]);
            return true;
        }
        else
        {
            if (self::$seenSection->update(['status'=>1]))
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
