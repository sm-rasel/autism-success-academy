<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSlider extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'program_sliders';
    protected $fillable = ['program_title', 'order', 'status'];
    public static $program;
    public static function programAdd($request){
        self::$program                  = new ProgramSlider();
        self::$program->program_title  = $request->program_title;
        self::$program->order           = $request->order;
        self::$program->status          = 1;
        self::$program->save();
    }
    public static function programUpdate($request, $id){
        self::$program                 = ProgramSlider::findOrFail($id);
        self::$program->program_title  = $request->program_title;
        self::$program->order          = $request->order;
        self::$program->update();
    }

    public static function statusUpdate($id){
        self::$program = ProgramSlider::findOrFail($id);
        if (self::$program->status == 1){
            self::$program->update(['status' => 2]);
            return true;
        }else{
            if (self::$program->update(['status' => 1])){
                return true;
            }else{
                return false;
            }
        }
    }

    public static function deleteProgram($id){
        self::$program = ProgramSlider::find($id);
        self::$program->delete();
        return true;
    }
}
