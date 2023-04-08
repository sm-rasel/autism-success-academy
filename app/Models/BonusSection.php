<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'bonus_sections';
    protected $fillable = ['title','values', 'description', 'order', 'status'];
    public static $bonusSection;

    public static function newBonus($request)
    {
        self::$bonusSection               = new BonusSection();
        self::$bonusSection->title        = $request->title;
        self::$bonusSection->values       = $request->values;
        self::$bonusSection->description  = $request->description;
        self::$bonusSection->order        = $request->order;
        self::$bonusSection->status       = 1;
        self::$bonusSection->save();
    }

    public static function updateBonus($request, $id)
    {
        self::$bonusSection               = BonusSection::find($id);
        self::$bonusSection->title        = $request->title;
        self::$bonusSection->values       = $request->values;
        self::$bonusSection->description  = $request->description;
        self::$bonusSection->order        = $request->order;
        self::$bonusSection->update();
    }

    public static function bonusStatusUpdate($id)
    {
        self::$bonusSection = BonusSection::findOrFail($id);
        if (self::$bonusSection->status == 1){
            self::$bonusSection ->update(['status' => 2]);
            return true;
        }else{
            if (self::$bonusSection ->update(['status' => 1])){
                return true;
            }else{
                return false;
            }
        }
    }

    public static function bonusDelete($id)
    {
        self::$bonusSection = BonusSection::findOrFail($id);
        self::$bonusSection->delete();
        return true;
    }
}
