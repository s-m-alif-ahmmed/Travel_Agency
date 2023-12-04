<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    private static $place, $place_image ,$imageNewName,$directory,$imgUrl;

    public static function savePlaces($request){
        self::$place = new Place();
        self::$place->place_name = $request->place_name;
        self::$place->place_description = $request->place_description;
        if ($request->file('place_image')){
            if (self::$place->place_image){
                if (file_exists(self::$place->place_image)){
                    unlink(self::$place->place_image);
                }
            }
            self::$place->place_image = self::getImageUrl($request);
        }
        self::$place->save();
    }

    public static function placesUpdate($request, $id)
    {
        self::$place = Place::find($id);

        if($request->file('place_image'))
        {
            if(file_exists(self::$place->place_image))
            {
                unlink(self::$place->place_image);
            }
            self::$imgUrl = self::getImageUrl($request);
        }
        else{
            self::$imgUrl = self::$place->place_image;
        }
        self::$place->place_name        = $request->place_name;
        self::$place->place_description = $request->place_description;
        self::$place->place_image       = self::$imgUrl;
        self::$place->save();
    }

    private static function getImageUrl($request){
        self::$place_image = $request->file('place_image');
        self::$imageNewName=rand().'.'.self::$place_image->getClientOriginalExtension();
        self::$directory='adminAsset/place-image/';
        self::$imgUrl=self::$directory.self::$imageNewName;
        self::$place_image->move(self::$directory,self::$imageNewName);
        return self::$imgUrl;
    }

    public static function statusPlace($id){
        self::$place = Place::find($id);
        if (self::$place->status == 1){
            self::$place->status = 0;
        }else{
            self::$place->status = 1;
        }
        self::$place->save();
    }

    public static function placesDelete($request){
        self::$place = Place::find($request->id);
        if (self::$place->place_image){
            if (file_exists(self::$place->place_image)){
                unlink(self::$place->place_image);
            }
        }
        self::$place->delete();
    }

}
