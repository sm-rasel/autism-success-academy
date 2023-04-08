<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PillarProgram extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'piller_programs';
    protected $fillable = ['title', 'value_p', 'description', 'order', 'status'];
    public static $pillarProgram;

    public static function newPillarProgram($request)
    {
        self::$pillarProgram               = new PillarProgram();
        self::$pillarProgram->title        = $request->title;
        self::$pillarProgram->value_p      = $request->value_p;
        self::$pillarProgram->description  = $request->description;
        self::$pillarProgram->order        = $request->order;
        self::$pillarProgram->status       = 1;
        self::$pillarProgram->save();
    }

    public static function updatePillarProgram($request, $id)
    {
        self::$pillarProgram               = PillarProgram::find($id);
        self::$pillarProgram->title        = $request->title;
        self::$pillarProgram->value_p      = $request->value_p;
        self::$pillarProgram->description  = $request->description;
        self::$pillarProgram->order        = $request->order;
        self::$pillarProgram->update();
    }

    public static function pillarStatusUpdate($id)
    {
        self::$pillarProgram = PillarProgram::findOrFail($id);
        if (self::$pillarProgram->status == 1)
        {
            self::$pillarProgram->update(['status' => 2]);
            return true;
        }else {
            if (self::$pillarProgram->update(['status' => 1])){
                return true;
            }else{
                return false;
            }
        }
    }

    public static function pillarDelete($id)
    {
        self::$pillarProgram = PillarProgram::find($id);
        self::$pillarProgram->delete();
        return true;
    }
}
