<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'hero_section';
    protected $fillable = ['heading_one', 'tag_line', 'question_text','heading_two', 'heading_three', 'button_text', 'button_url', 'roll_out', 'logo_image', 'video', 'status'];

    public static $heroSection, $video, $text, $videoName, $videoUrl, $directory, $image, $imageName, $imageUrl;

    public static function getVideoUrl($request)
    {
        self::$video        = $request->file('video');
        self::$text         = self::$video->getClientOriginalExtension();
        self::$videoName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = 'videos/';
        self::$video->move(self::$directory, self::$videoName);
        return self::$directory.self::$videoName;
    }
    public static function getImageoUrl($request)
    {
        self::$image        = $request->file('logo_image');
        self::$text         = self::$image->getClientOriginalExtension();
        self::$imageName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = 'videos/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newHeroSection($request)
    {
        self::$heroSection                  = new HeroSection();
        self::$heroSection->heading_one     = $request->heading_one;
        self::$heroSection->tag_line        = $request->tag_line;
        self::$heroSection->question_text   = $request->question_text;
        self::$heroSection->heading_two     = $request->heading_two;
        self::$heroSection->heading_three   = $request->heading_three;
        self::$heroSection->roll_out        = $request->roll_out;
        self::$heroSection->button_text     = $request->button_text;
        self::$heroSection->button_url      = $request->button_url;
        self::$heroSection->logo_image      = self::getImageoUrl($request);
        self::$heroSection->video           = self::getVideoUrl($request);
        self::$heroSection->status          = 2;
        self::$heroSection->save();
    }

    public static function updateHero($request, $id)
    {
        self::$heroSection = HeroSection::find($id);
        if ($request->file('video'))
        {
            if (file_exists(self::$heroSection->video))
            {
                unlink(self::$heroSection->video);
            }
            self::$videoUrl = self::getVideoUrl($request);
        }
        else
        {
            self::$videoUrl = self::$heroSection->video;
        }
        if ($request->file('logo_image'))
        {
            if (file_exists(self::$heroSection->logo_image))
            {
                unlink(self::$heroSection->logo_image);
            }
            self::$imageUrl = self::getImageoUrl($request);
        }
        else
        {
            self::$imageUrl = self::$heroSection->logo_image;
        }
        self::$heroSection->heading_one     = $request->heading_one;
        self::$heroSection->tag_line        = $request->tag_line;
        self::$heroSection->question_text   = $request->question_text;
        self::$heroSection->heading_two     = $request->heading_two;
        self::$heroSection->heading_three   = $request->heading_three;
        self::$heroSection->roll_out        = $request->roll_out;
        self::$heroSection->button_text     = $request->button_text;
        self::$heroSection->button_url      = $request->button_url;
        self::$heroSection->video           = self::$videoUrl;
        self::$heroSection->logo_image      = self::$imageUrl;
        self::$heroSection->save();
    }

    public static function deleteHero($id)
    {
        self::$heroSection = HeroSection::find($id);
        if (self::$heroSection && self::$heroSection->status == 2)
        {
            if (file_exists(self::$heroSection->video))
            {
                unlink(self::$heroSection->video);
            }
            self::$heroSection->delete();
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function statusUpdate($id)
    {
        self::$heroSection = HeroSection::findOrFail($id);
        if (self::$heroSection->status == 1 ) {
            self::$heroSection->update(['status'=> 2]);
            return true;
        } else {
            self::$heroSection->update(['status'=> 1]);
            if(self::otherStatusUpdate($id)) {
                return true;
            } else {
                return false;
            }
        }
    }
    public static function otherStatusUpdate($id)
    {
        self::$heroSection =  HeroSection::where('id','!=',$id)->get();
        self::$heroSection->each->update(['status'=>2]);
        return true;
    }

}
