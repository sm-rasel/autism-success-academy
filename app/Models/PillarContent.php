<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PillarContent extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'piller_contents';
    protected $fillable = ['pillar_title', 'description', 'description_bottom'];

    public static $pillarContent;

    public static function newPillarHeading($request, $id)
    {
        if ($id == null)
        {
            self::$pillarContent = new PillarContent();
        }
        else
        {
            self::$pillarContent = PillarContent::find($id);
        }
        self::$pillarContent->pillar_title          = $request->pillar_title;
        self::$pillarContent->description           = $request->description;
        self::$pillarContent->description_bottom    = $request->description_bottom;
        if ($id == null)
        {
            self::$pillarContent->save();
        }
        else
        {
            self::$pillarContent->update();
        }
    }
}
