<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DreamSection extends Model
{
    use HasFactory;
    protected $guard        = 'admin';
    protected $table        = 'dream_sections';
    protected $fillable     = ['heading', 'shot_description_one','shot_description_two','shot_description_three','button_url','dream_image','status'];
    public static $dreamSection, $image, $imageName, $imageUrl, $directory, $text;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('dream_image');
        self::$text         = self::$image->getClientOriginalExtension();
        self::$imageName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = 'dream_image/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newDreamSection($request){
        self::$dreamSection                         = new DreamSection();
        self::$dreamSection->heading                = $request->heading;
        self::$dreamSection->shot_description_one   = $request->shot_description_one;
        self::$dreamSection->shot_description_two   = $request->shot_description_two;
        self::$dreamSection->shot_description_three = $request->shot_description_three;
        self::$dreamSection->button_url             = $request->button_url;
        self::$dreamSection->status                 = 1;
        self::$dreamSection->dream_image            = self::getImageUrl($request);
        self::$dreamSection->save();
    }

    public static function updateDreamSection($request, $id){
        self::$dreamSection = DreamSection::find($id);
        if ($request->file('dream_image'))
        {
            if (file_exists(self::$dreamSection->dream_image))
            {
                unlink(self::$dreamSection->dream_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$dreamSection->dream_image;
        }
        self::$dreamSection->heading                = $request->heading;
        self::$dreamSection->shot_description_one   = $request->shot_description_one;
        self::$dreamSection->shot_description_two   = $request->shot_description_two;
        self::$dreamSection->shot_description_three = $request->shot_description_three;
        self::$dreamSection->button_url             = $request->button_url;
        self::$dreamSection->dream_image            = self::$imageUrl;
        self::$dreamSection->update();
    }

    public static function statusUpdate($id){
        self::$dreamSection = DreamSection::findOrFail($id);
        if (self::$dreamSection->status == 1){
            self::$dreamSection->update(['status' => 2]);
            return true;
        }else{
            if (self::$dreamSection->update(['status' => 1]))
            {
                return true;
            }
            else{
                return false;
            }
        }
    }

    public static function deleteDreamSection($id){
        self::$dreamSection = DreamSection::find($id);
        if (file_exists(self::$dreamSection->dream_image)){
            unlink(self::$dreamSection->dream_image);
        }
        self::$dreamSection->delete();
        return true;
    }
}
