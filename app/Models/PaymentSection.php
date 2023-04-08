<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSection extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'payment_sections';
    protected $fillable = ['title', 'description_one', 'description_two', 'order', 'status'];
    public static $paymentSection;

    public static function newPayment($request)
    {
        self::$paymentSection                   = new PaymentSection();
        self::$paymentSection->title            = $request->title;
        self::$paymentSection->description_one  = $request->description_one;
        self::$paymentSection->description_two  = $request->description_two;
        self::$paymentSection->order            = $request->order;
        self::$paymentSection->status           = 1;
        self::$paymentSection->save();
    }

    public static function updatePayment($request, $id)
    {
        self::$paymentSection                   = PaymentSection::find($id);
        self::$paymentSection->title            = $request->title;
        self::$paymentSection->description_one  = $request->description_one;
        self::$paymentSection->description_two  = $request->description_two;
        self::$paymentSection->order            = $request->order;
        self::$paymentSection->update();
    }

    public static function paymentStatusUpdate($id)
    {
        self::$paymentSection = PaymentSection::findOrFail($id);
        if (self::$paymentSection->status == 1){
            self::$paymentSection->update(['status' => 2]);
            return true;
        }else{
            if (self::$paymentSection->update(['status' => 1])){
                return true;
            }else{
                return false;
            }
        }
    }

    public static function paymentDelete($id)
    {
        self::$paymentSection = PaymentSection::findOrFail($id);
        self::$paymentSection->delete();
        return true;
    }
}
