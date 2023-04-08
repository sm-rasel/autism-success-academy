<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PillerSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'piller_sections';
    protected $fillable = ['piller_name', 'order', 'status'];
    public static $piller;

    public static function pillerAdd($request)
    {
        self::$piller               = new PillerSection();
        self::$piller->piller_name  = $request->piller_name;
        self::$piller->order        = $request->order;
        self::$piller->status       = 1;
        self::$piller->save();
    }

    public static function pillerUpdate($request, $id){
        self::$piller               = PillerSection::findorFail($id);
        self::$piller->piller_name  = $request->piller_name;
        self::$piller->order        = $request->order;
        self::$piller->update();
    }

    public static function statusUpdate($id){
        self::$piller = PillerSection::findOrFail($id);
        if (self::$piller->status == 1)
        {
            self::$piller->update(['status' => 2]);
            return true;
        }
        else
        {
            if (self::$piller->update(['status' => 1]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public static function deletePiller($id)
    {
        self::$piller = PillerSection::findOrFail($id);
        self::$piller->delete();
        return true;
    }
}
