<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiplomaSection extends Model
{
    use HasFactory;
    protected $guard    = 'admin';
    protected $table    = 'diploma_sections';
    protected $fillable = ['title', 'description_one', 'course_value_one', 'description_two', 'course_value_two', 'total_value', 'order', 'status'];
    public static $diplomaSection;

    public static function addDiploma($request){
        self::$diplomaSection                       = new DiplomaSection();
        self::$diplomaSection->title                = $request->title;
        self::$diplomaSection->description_one      = $request->description_one;
        self::$diplomaSection->course_value_one     = $request->course_value_one;
        self::$diplomaSection->description_two      = $request->description_two;
        self::$diplomaSection->course_value_two     = $request->course_value_two;
        self::$diplomaSection->total_value          = $request->total_value;
        self::$diplomaSection->order                = $request->order;
        self::$diplomaSection->status               = 1;
        self::$diplomaSection->save();
    }
    public static function updateDiploma($request, $id){
        self::$diplomaSection                       = DiplomaSection::find($id);
        self::$diplomaSection->title                = $request->title;
        self::$diplomaSection->description_one      = $request->description_one;
        self::$diplomaSection->course_value_one     = $request->course_value_one;
        self::$diplomaSection->description_two      = $request->description_two;
        self::$diplomaSection->course_value_two     = $request->course_value_two;
        self::$diplomaSection->total_value          = $request->total_value;
        self::$diplomaSection->order                = $request->order;
        self::$diplomaSection->update();
    }

    public static function statusUpdate($id){
        self::$diplomaSection = DiplomaSection::findOrFail($id);
        if (self::$diplomaSection->status == 1){
            self::$diplomaSection->update(['status' => 2]);
            return true;
        }else{
            if (self::$diplomaSection->update(['status' => 1]))
            {
                return true;
            }
            else{
                return false;
            }
        }
    }

    public static function deleteDiploma($id){
        self::$diplomaSection = DiplomaSection::findOrFail($id);
        self::$diplomaSection->delete();
        return true;
    }
}
