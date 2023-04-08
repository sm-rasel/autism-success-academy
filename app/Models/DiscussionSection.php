<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussionSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'discussion_sections';
    protected $fillable = ['discussion_content', 'order', 'status'];
    public static $discussion;

    public static function newDiscussion($request)
    {
        self::$discussion                      = new DiscussionSection();
        self::$discussion->discussion_content  = $request->discussion_content;
        self::$discussion->order               = $request->order;
        self::$discussion->status              = 1;
        self::$discussion->save();
    }

    public static function updateDiscussion($request, $id)
    {
        self::$discussion                      = DiscussionSection::find($id);
        self::$discussion->discussion_content  = $request->discussion_content;
        self::$discussion->order               = $request->order;
        self::$discussion->update();
    }

    public static function discussionStausUpdate($id)
    {
        self::$discussion = DiscussionSection::findOrFail($id);
        if (self::$discussion->status == 1){
            self::$discussion->update(['status' => 2]);
            return true;
        }
        else{
            if (self::$discussion->update(['status' => 1])){
                return true;
            }
            else{
                return false;
            }
        }
    }

    public static function deleteDiscussion($id)
    {
        self::$discussion = DiscussionSection::findOrFail($id);
        self::$discussion->delete($id);
        return true;
    }
}
