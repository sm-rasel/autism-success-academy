<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'meet_section';
    protected $fillable = ['header', 'header_two', 'meet_text', 'meet_text_two', 'button_text', 'button_url', 'youtube_url', 'status'];

    public static $meetSection, $image, $imageName, $imageUrl, $text, $directory;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('youtube_image');
        self::$text         = self::$image->getClientOriginalExtension();
        self::$imageName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = 'youtube_image/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newMeetSection($request)
    {
        self::$meetSection                  = new MeetSection();
        self::$meetSection->header          = $request->header;
        self::$meetSection->header_two      = $request->header_two;
        self::$meetSection->meet_text       = $request->meet_text;
        self::$meetSection->meet_text_two   = $request->meet_text_two;
        self::$meetSection->button_text     = $request->button_text;
        self::$meetSection->button_url      = $request->button_url;
        self::$meetSection->youtube_url     = $request->youtube_url;
        self::$meetSection->youtube_image   = self::getImageUrl($request);
        self::$meetSection->status          = 2;
        self::$meetSection->save();
    }

    public static function updateMeet($request, $id)
    {
        self::$meetSection = MeetSection::find($id);
        if ($request->file('youtube_image'))
        {
            if (file_exists(self::$meetSection->youtube_image))
            {
                unlink(self::$meetSection->youtube_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$meetSection->youtube_image;
        }
        self::$meetSection->header          = $request->header;
        self::$meetSection->header_two      = $request->header_two;
        self::$meetSection->meet_text       = $request->meet_text;
        self::$meetSection->meet_text_two   = $request->meet_text_two;
        self::$meetSection->button_text     = $request->button_text;
        self::$meetSection->button_url      = $request->button_url;
        self::$meetSection->youtube_url     = $request->youtube_url;
        self::$meetSection->youtube_image   = self::$imageUrl;
        self::$meetSection->status          = self::$meetSection->status;
        self::$meetSection->save();
    }

    public static function deleteMeet($id)
    {
        self::$meetSection = MeetSection::find($id);
        if (file_exists(self::$meetSection->youtube_image))
        {
            unlink(self::$meetSection->youtube_image);
        }
        self::$meetSection->delete();
        return true;
    }

    public static function updateStatus($id)
    {
        self::$meetSection = MeetSection::findOrFail($id);
        if (self::$meetSection->status == 1 ) {
            self::$meetSection->update(['status'=> 2]);
            return true;
        } else {
            self::$meetSection->update(['status'=> 1]);
            if(self::updateOthers($id)) {
                return true;
            } else {
                return false;
            }
        }
    }
    public static function updateOthers($id)
    {
        self::$meetSection = MeetSection::where('id','!=',$id)->get();
        self::$meetSection->each->update(['status'=> 2]);
        return true;
    }
}
