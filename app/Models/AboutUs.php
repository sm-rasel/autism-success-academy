<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table="about_us";
    protected $fillable = ['about_title', 'about_heading', 'about_description', 'about_image', 'order', 'status'];

    public static $aboutUsSection, $image, $imageName, $imageUrl, $text, $directory;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('about_image');
        self::$text         = self::$image->getClientOriginalExtension();
        self::$imageName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = 'about_image/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newAboutUsSection($request)
    {
        self::$aboutUsSection                       = new AboutUs();
        self::$aboutUsSection->about_title          = $request->about_title;
        self::$aboutUsSection->about_heading        = $request->about_heading;
        self::$aboutUsSection->about_description    = $request->about_description;
        self::$aboutUsSection->order                = $request->order;
        self::$aboutUsSection->about_image          = self::getImageUrl($request);
        self::$aboutUsSection->status               = 1;
        self::$aboutUsSection->save();
    }

    public static function updateAboutUsSection($request, $id)
    {
        self::$aboutUsSection = AboutUs::find($id);
        if ($request->file('about_image'))
        {
            if (file_exists(self::$aboutUsSection->about_image))
            {
                unlink(self::$aboutUsSection->about_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$aboutUsSection->about_image;
        }
        self::$aboutUsSection->about_title       = $request->about_title;
        self::$aboutUsSection->about_heading     = $request->about_heading;
        self::$aboutUsSection->about_description = $request->about_description;
        self::$aboutUsSection->order             = $request->order;
        self::$aboutUsSection->about_image       = self::$imageUrl;
        self::$aboutUsSection->update();
    }

    public static function deleteAboutUs($id)
    {
        self::$aboutUsSection = AboutUs::find($id);
        if (self::$aboutUsSection && self::$aboutUsSection->status == 2)
        {
            if (file_exists(self::$aboutUsSection->about_image))
            {
                unlink(self::$aboutUsSection->about_image);
            }
        }
        self::$aboutUsSection->delete();
        return true;
    }

    public static function updateStatus($id)
    {
        self::$aboutUsSection = AboutUs::findorFail($id);
        if (self::$aboutUsSection->status == 1)
        {
            self::$aboutUsSection->update(['status'=> 2]);
            return true;
        }
        else
        {
            if (self::$aboutUsSection->update(['status' => 1]))
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
