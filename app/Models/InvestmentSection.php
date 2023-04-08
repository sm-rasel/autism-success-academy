<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'investment_sections';
    protected $fillable = ['program_title', 'summery', 'description', 'order', 'status'];
    public static $investment;

    public static function newInvestment($request)
    {
        self::$investment                       = new InvestmentSection();
        self::$investment->program_title        = $request->program_title;
        self::$investment->summery              = $request->summery;
        self::$investment->description          = $request->description;
        self::$investment->order                = $request->order;
        self::$investment->status               = 1;
        self::$investment->save();
    }

    public static function updateInvestment($request, $id)
    {
        self::$investment                       = InvestmentSection::find($id);
        self::$investment->program_title        = $request->program_title;
        self::$investment->summery              = $request->summery;
        self::$investment->description          = $request->description;
        self::$investment->order                = $request->order;
        self::$investment->update();
    }

    public static function investStatusUpdate($id)
    {
        self::$investment = InvestmentSection::findOrFail($id);
        if (self::$investment->status == 1)
        {
            self::$investment->update(['status' => 2]);
            return true;
        }
        else
        {
            if (self::$investment->update(['status' => 1]))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public static function investmentDelete($id)
    {
        self::$investment = InvestmentSection::findOrFail($id);
        self::$investment->delete();
        return true;
    }
}
