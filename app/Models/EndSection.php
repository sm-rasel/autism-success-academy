<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'end_sections';
    protected $fillable = ['end_title', 'button_name', 'button_url', 'status'];

    public static $endSection;

    public static function newEndSection($request, $id)
    {
        if ($id == null)
        {
            self::$endSection = new EndSection();
        }
        else
        {
            self::$endSection = EndSection::find($id);
        }
        self::$endSection->end_title        = $request->end_title;
        self::$endSection->button_name      = $request->button_name;
        self::$endSection->button_url       = $request->button_url;
        self::$endSection->status           = 1;
        if ($id == null)
        {
            self::$endSection->save();
        }
        else
        {
            self::$endSection->update();
        }
    }
}
