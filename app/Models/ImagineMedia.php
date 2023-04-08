<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagineMedia extends Model
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'imagine_medias';
    protected $fillable = ['imagine_title','imagine_title_two','imagine_title_three', 'imagine_image', 'status'];
    public static $imagineSection, $image, $imageName, $imageUrl, $directory, $text;

    public static function getImageUrl($request)
    {
        self::$image        = $request->file('imagine_image');
        self::$text         = self::$image->getClientOriginalExtension();
        self::$imageName    = uniqid().'_'.time().'.'.self::$text;
        self::$directory    = 'imagine_image/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newImagineSection($request, $id)
    {
        if ($id == null)
        {
            self::$imagineSection                   = new ImagineMedia();
            self::$imagineSection->imagine_image    = self::getImageUrl($request);
        }
        else
        {
            self::$imagineSection = ImagineMedia::find($id);
            if ($request->file('imagine_image'))
            {
                if (file_exists(self::$imagineSection->imagine_image))
                {
                    unlink(self::$imagineSection->imagine_image);
                }
                self::$imageUrl = self::getImageUrl($request);
            }
            else
            {
                self::$imageUrl = self::$imagineSection->imagine_image;
            }
            self::$imagineSection->imagine_image    = self::$imageUrl;
        }
        self::$imagineSection->imagine_title        = $request->imagine_title;
        self::$imagineSection->imagine_title_two    = $request->imagine_title_two;
        self::$imagineSection->imagine_title_three  = $request->imagine_title_three;
        self::$imagineSection->status               = 1;
        if ($id == null)
        {
            self::$imagineSection->save();
        }
        else
        {
            self::$imagineSection->update();
        }
    }
}
