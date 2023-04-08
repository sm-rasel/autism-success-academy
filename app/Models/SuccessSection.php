<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'our_stories';
    protected $fillable = ['success_image', 'order', 'status', 'is_featured', 'program_upper', 'program_second', 'program_third', 'program_bottom'];

    public static $successSection, $image, $text, $imageName, $imageUrl, $directory;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('success_image');
        self::$text         = self::$image->getClientOriginalExtension();
        self::$imageName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = 'success_image/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newSuccessSection($request)
    {
        self::$successSection                           = new SuccessSection();
        self::$successSection->order                    = $request->order;
        self::$successSection->program_upper            = $request->program_upper;
        self::$successSection->program_second           = $request->program_second;
        self::$successSection->program_third            = $request->program_third;
        self::$successSection->program_bottom           = $request->program_bottom;
        self::$successSection->success_image            = self::getImageUrl($request);
        self::$successSection->status                   = 1;
        self::$successSection->save();
    }

    public static function updateSuccess($request, $id)
    {
        self::$successSection = SuccessSection::find($id);
        if ($request->file('success_image'))
        {
            if (file_exists(self::$successSection->success_image))
            {
                unlink(self::$successSection->success_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        self::$successSection->program_upper            = $request->program_upper;
        self::$successSection->program_second           = $request->program_second;
        self::$successSection->program_third            = $request->program_third;
        self::$successSection->program_bottom           = $request->program_bottom;
        self::$successSection->order                    = $request->order;
        self::$successSection->success_image            = self::$imageUrl;
        self::$successSection->status                   = self::$successSection->status;
        self::$successSection->save();
    }

    public static function successDelete($id)
    {
        self::$successSection = SuccessSection::findOrFail($id);
        if (self::$successSection && self::$successSection->status == 2)
        {
            if (file_exists(self::$successSection->success_image))
            {
                unlink(self::$successSection->success_image);
            }
            self::$successSection->delete();
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function updateStatus($id)
    {
        self::$successSection = SuccessSection::findOrFail($id);
        if (self::$successSection->status == 1 )
        {
            self::$successSection->update(['status' => 2]);
            return true;
        }
        else
        {
            if (self::$successSection->update(['status' => 1]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public static function updateFeatured($id)
    {
        self::$successSection = SuccessSection::findorFail($id);
        if (self::$successSection->is_featured == 2)
            {
                self::$successSection->update(['is_featured' => 1]);
                return true;
            }
        else
        {
            if (self::$successSection->update(['is_featured' => 2]))
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
