<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'faq';
    protected $fillable = ['question', 'answer', 'order', 'is_featured', 'status'];

    public static $faqSection;

    public static function newFaqSection($request)
    {
        self::$faqSection              = new FaqSection();
        self::$faqSection->question    = $request->question;
        self::$faqSection->answer      = $request->answer;
        self::$faqSection->order       = $request->order;
        self::$faqSection->status      = 1;
        self::$faqSection->is_featured = 2;
        self::$faqSection->save();
    }

    public static function updateFaq($request, $id)
    {
        self::$faqSection              = FaqSection::find($id);
        self::$faqSection->question    = $request->question;
        self::$faqSection->answer      = $request->answer;
        self::$faqSection->order       = $request->order;
        self::$faqSection->status      = 1;
        self::$faqSection->is_featured = 2;
        self::$faqSection->save();
    }

    public static function deleteFaq($id)
    {
        self::$faqSection = FaqSection::find($id);
        self::$faqSection->delete();
        return true;
    }

    public static function updateStatus($id)
    {
        self::$faqSection = FaqSection::findOrFail($id);
        if (self::$faqSection->status == 1)
        {
            self::$faqSection->update(['status' => 2]);
            return true;
        }
        else
        {
            if (self::$faqSection->update(['status' => 1]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public static function featuredStatus($id)
    {
        self::$faqSection = FaqSection::findOrFail($id);
        if (self::$faqSection->is_featured == 2)
        {
            self::$faqSection->update(['is_featured' => 1]);
            return true;
        }
        else
        {
            if (self::$faqSection->update(['is_featured' =>2]))
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
