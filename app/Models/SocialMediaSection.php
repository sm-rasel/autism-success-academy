<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table ='social_medias';
    protected $fillable = ['instagram_url', 'facebook_url', 'status'];
    public static $social;

    public static function newSocialMedia($request, $id)
    {
        if ($id == null)
        {
            self::$social = new SocialMediaSection();
        }
        else
        {
            self::$social = SocialMediaSection::findOrFail($id);
        }
        self::$social->instagram_url    = $request->instagram_url;
        self::$social->facebook_url     = $request->facebook_url;
        self::$social->status           = 1;
        if ($id == null)
        {
            self::$social->save();
        }
        else
        {
            self::$social->update();
        }
    }
}
