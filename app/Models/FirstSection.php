<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'first_sections';
    protected $fillable = ['title', 'shot_description_one', 'shot_description_two', 'first_image', 'button_url', 'order', 'status'];

    public static $firstSection, $image, $imageName, $imageUrl, $text, $directory;


    public static function getImageUrl($request)
    {
        self::$image        = $request->file('first_image');
        self::$text         = self::$image->getClientOriginalExtension();
        self::$imageName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = 'first_image/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newFirstSection($request){
        self::$firstSection                         = new FirstSection();
        self::$firstSection->title                  = $request->title;
        self::$firstSection->shot_description_one   = $request->shot_description_one;
        self::$firstSection->shot_description_two   = $request->shot_description_two;
        self::$firstSection->button_url             = $request->button_url;
        self::$firstSection->order                  = $request->order;
        self::$firstSection->status                 = 2;
        self::$firstSection->first_image            = self::getImageUrl($request);
        self::$firstSection->save();
    }

    public static function updateFirstSection($request, $id){
        self::$firstSection = FirstSection::find($id);
        if ($request->file('first_image'))
        {
            if (file_exists(self::$firstSection->first_image))
            {
                unlink(self::$firstSection->first_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$firstSection->first_image;
        }
        self::$firstSection->title                  = $request->title;
        self::$firstSection->shot_description_one   = $request->shot_description_one;
        self::$firstSection->shot_description_two   = $request->shot_description_two;
        self::$firstSection->button_url             = $request->button_url;
        self::$firstSection->order                  = $request->order;
        self::$firstSection->status                 = 2;
        self::$firstSection->first_image            = self::$imageUrl;
        self::$firstSection->update();
    }

    public static function updateStatus($id){
        self::$firstSection = FirstSection::findOrFail($id);
        if (self::$firstSection->status == 1)
        {
            self::$firstSection->update(['status'=>2]);
            return true;
        }
        else
        {
            self::$firstSection->update(['status'=>1]);
            if (self::otherStatusUpdate($id))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public static function otherStatusUpdate($id){
        self::$firstSection = FirstSection::where('id', '!=', $id)->get();
        self::$firstSection->each->update(['status' => 2]);
        return true;
    }

    public static function deleteSection($id){
        self::$firstSection = FirstSection::find($id);
        if (file_exists(self::$firstSection->first_image))
        {
            unlink(self::$firstSection->first_image);
        }
        self::$firstSection->delete();
        return true;
    }
}
