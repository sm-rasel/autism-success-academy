<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvenSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'proven_sections';
    protected $fillable = ['title', 'shot_description_one','shot_description_two','shot_description_three','shot_description_four','shot_description_five','proven_image','status'];
    public static $provenSection, $image, $imageName, $imageUrl, $directory, $text;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('proven_image');
        self::$text         = self::$image->getClientOriginalExtension();
        self::$imageName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = 'proven_image/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newProvenSection($request){
        self::$provenSection                         = new ProvenSection();
        self::$provenSection->title                  = $request->title;
        self::$provenSection->shot_description_one   = $request->shot_description_one;
        self::$provenSection->shot_description_two   = $request->shot_description_two;
        self::$provenSection->shot_description_three = $request->shot_description_three;
        self::$provenSection->shot_description_four  = $request->shot_description_four;
        self::$provenSection->shot_description_five  = $request->shot_description_five;
        self::$provenSection->status                 = 1;
        self::$provenSection->proven_image            = self::getImageUrl($request);
        self::$provenSection->save();
    }

    public static function updateProvenSection($request, $id){
        self::$provenSection = ProvenSection::find($id);
        if ($request->file('proven_image'))
        {
            if (file_exists(self::$provenSection->proven_image))
            {
                unlink(self::$provenSection->proven_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$provenSection->proven_image;
        }
        self::$provenSection->title                  = $request->title;
        self::$provenSection->shot_description_one   = $request->shot_description_one;
        self::$provenSection->shot_description_two   = $request->shot_description_two;
        self::$provenSection->shot_description_three = $request->shot_description_three;
        self::$provenSection->shot_description_four  = $request->shot_description_four;
        self::$provenSection->shot_description_five  = $request->shot_description_five;
        self::$provenSection->proven_image           = self::$imageUrl;
        self::$provenSection->update();
    }

    public static function statusUpdate($id){
        self::$provenSection = ProvenSection::findOrFail($id);
        if (self::$provenSection->status == 1){
            self::$provenSection->update(['status' => 2]);
            return true;
        }else{
            if (self::$provenSection->update(['status' => 1])){
                return true;
            }else{
                return false;
            }
        }
    }

    public static function deleteSection($id){
        self::$provenSection = ProvenSection::find($id);
        if (file_exists(self::$provenSection->proven_image)){
            unlink(self::$provenSection->proven_image);
        }
        self::$provenSection->delete();
        return true;
    }
}
