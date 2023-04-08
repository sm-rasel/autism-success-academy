<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'about_section';
    protected $fillable = ['name', 'heading_one', 'heading_two', 'about_one', 'about_two', 'about_three', 'about_four', 'about_five', 'about_six', 'go_text','about_image', 'status'];

    public static $aboutSection, $about_image, $imageUrl, $ext, $imageName, $directory;

    public static function getImageUrl($request)
    {
        self::$about_image  = $request->file('about_image');
        self::$ext          = self::$about_image->getClientOriginalExtension();
        self::$imageName    = uniqid().'-'.time() . '.' . self::$ext;
        self::$directory    = 'about_images/';
        self::$about_image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newAboutSection($request)
    {
        self::$aboutSection                  = new AboutSection();
        self::$aboutSection->name            = $request->name;
        self::$aboutSection->heading_one     = $request->heading_one;
        self::$aboutSection->heading_two     = $request->heading_two;
        self::$aboutSection->about_one       = $request->about_one;
        self::$aboutSection->about_two       = $request->about_two;
        self::$aboutSection->about_three     = $request->about_three;
        self::$aboutSection->about_four      = $request->about_four;
        self::$aboutSection->about_five      = $request->about_five;
        self::$aboutSection->about_six       = $request->about_six;
        self::$aboutSection->go_text         = $request->go_text;
        self::$aboutSection->about_image     = self::getImageUrl($request);
        self::$aboutSection->status          = 2;
        self::$aboutSection->save();
    }

    public static function updateAbout($request, $id)
    {
        self::$aboutSection = AboutSection::find($id);
        if ($request->file('about_image'))
        {
            if (file_exists(self::$aboutSection->about_image))
            {
                unlink(self::$aboutSection->about_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$aboutSection->about_image;
        }
        self::$aboutSection->name            = $request->name;
        self::$aboutSection->heading_one     = $request->heading_one;
        self::$aboutSection->heading_two     = $request->heading_two;
        self::$aboutSection->about_one       = $request->about_one;
        self::$aboutSection->about_two       = $request->about_two;
        self::$aboutSection->about_three     = $request->about_three;
        self::$aboutSection->about_four      = $request->about_four;
        self::$aboutSection->about_five      = $request->about_five;
        self::$aboutSection->about_six       = $request->about_six;
        self::$aboutSection->go_text         = $request->go_text;
        self::$aboutSection->about_image     = self::$imageUrl;
        self::$aboutSection->status          = self::$aboutSection->status;
        self::$aboutSection->save();
    }

    public static function deleteAbout($id)
    {
        self::$aboutSection = AboutSection::find($id);
        if (file_exists(self::$aboutSection->about_image))
        {
            unlink(self::$aboutSection->about_image);
        }
        self::$aboutSection->delete();
        return true;
    }

    public static function updateStatus($id)
    {
        self::$aboutSection = AboutSection::findOrFail($id);
        if (self::$aboutSection->status == 1 ) {
            self::$aboutSection->update(['status'=> 2]);
            return true;
        } else {
            self::$aboutSection->update(['status'=> 1]);
            if(self::updateOthers($id)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function updateOthers($id)
    {
        self::$aboutSection = AboutSection::where('id','!=',$id)->get();
        self::$aboutSection->each->update(['status'=> 2]);
        return true;
    }
}
