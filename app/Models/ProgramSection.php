<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'our_programs_section';
    protected $fillable = ['pillar_name', 'pillar_heading', 'pillar_text', 'pillar_link', 'order', 'status'];

    public static $programSection;

    public static function newProgramSection($request)
    {
        self::$programSection                  = new ProgramSection();
        self::$programSection->pillar_name     = $request->pillar_name;
        self::$programSection->pillar_heading  = $request->pillar_heading;
        self::$programSection->pillar_text     = $request->pillar_text;
        self::$programSection->pillar_link     = $request->pillar_link;
        self::$programSection->order           = $request->order;
        self::$programSection->status          = 1;
        self::$programSection->save();
    }

    public static function updateProgram($request, $id)
    {
        self::$programSection                  = ProgramSection::find($id);
        self::$programSection->pillar_name     = $request->pillar_name;
        self::$programSection->pillar_heading  = $request->pillar_heading;
        self::$programSection->pillar_text     = $request->pillar_text;
        self::$programSection->pillar_link     = $request->pillar_link;
        self::$programSection->order           = $request->order;
        self::$programSection->status          = self::$programSection->status;
        self::$programSection->save();
    }

    public static function deletePrograms($id)
    {
        self::$programSection = ProgramSection::find($id);
        self::$programSection->delete();
        return true;
    }

    public static function updateStatus($id)
    {
        self::$programSection = ProgramSection::findOrFail($id);
        if (self::$programSection->status == 1 ) {
            self::$programSection->update(['status'=> 2]);
        } else {
            self::$programSection->update(['status'=> 1]);
        }
        return true;
    }
}
