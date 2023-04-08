<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagineContent extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'imagine_contents';
    protected $fillable = ['imagine_content', 'order', 'status'];
    public static $imagine;

    public static function imagineContentAdd($request){
        self::$imagine                      = new ImagineContent();
        self::$imagine->imagine_content     = $request->imagine_content;
        self::$imagine->order               = $request->order;
        self::$imagine->status              = 1;
        self::$imagine->save();
    }

    public static function imagineContentUpdate($request, $id){
        self::$imagine                      = ImagineContent::find($id);
        self::$imagine->imagine_content     = $request->imagine_content;
        self::$imagine->order               = $request->order;
        self::$imagine->update();
    }

    public static function imagineContentStatusUpdate($id){
        self::$imagine = ImagineContent::findOrFail($id);
        if (self::$imagine->status == 1){
            self::$imagine->update(['status' => 2]);
            return true;
        }
        else{
            if (self::$imagine->update(['status' => 1])){
                return true;
            }
            else{
                return false;
            }
        }
    }

    public static function DeleteImagineContent($id){
        self::$imagine = ImagineContent::findOrFail($id);
        self::$imagine->delete();
        return true;
    }
}
