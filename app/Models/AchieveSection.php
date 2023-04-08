<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchieveSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'achieve_sections';
    protected $fillable = ['title', 'description'. 'order', 'status'];

    public static $achieveSection;

    public static function newAchieve($request)
    {
        self::$achieveSection               = new AchieveSection();
        self::$achieveSection->title        = $request->title;
        self::$achieveSection->description  = $request->description;
        self::$achieveSection->order        = $request->order;
        self::$achieveSection->status       = 1;
        self::$achieveSection->save();
    }

    public static function updateAchieve($request, $id)
    {
        self::$achieveSection               = AchieveSection::find($id);
        self::$achieveSection->title        = $request->title;
        self::$achieveSection->description  = $request->description;
        self::$achieveSection->order        = $request->order;
        self::$achieveSection->update();
    }

    public static function updateAchieveStatus($id)
    {
        self::$achieveSection = AchieveSection::findOrFail($id);
        if (self::$achieveSection->status == 1)
        {
            self::$achieveSection->update(['status' => 2]);
            return true;
        }
        else
        {
            if (self::$achieveSection->update(['status' => 1]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public static function deleteAchieve($id)
    {
        self::$achieveSection = AchieveSection::findOrFail($id);
        self::$achieveSection->delete();
        return true;
    }


}
