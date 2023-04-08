<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'live_show';
    protected $fillable = ['youtube_link','status'];

    public static $liveSection;

    public static function newLiveSection($request)
    {
        self::$liveSection               = new LiveSection();
        self::$liveSection->youtube_link = $request->youtube_link;
        self::$liveSection->status       = 1;
        self::$liveSection->save();
    }

    public static function updateLive($request, $id)
    {
        self::$liveSection                 = LiveSection::find($id);
        self::$liveSection->youtube_link   = $request->youtube_link;
        self::$liveSection->update();
    }

    public static function deleteLive($id)
    {
        self::$liveSection = LiveSection::find($id);
        self::$liveSection->delete();
        return true;
    }

    public static function updateStatus($id)
    {
        self::$liveSection = LiveSection::findOrFail($id);
        if (self::$liveSection->status == 1)
        {
            self::$liveSection->update(['status' => 2]);
            return true;
        }
        else
        {
            if (self::$liveSection->update(['status' => 1]))
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
