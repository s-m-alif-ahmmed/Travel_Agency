<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    private static $hotel, $hotel_image ,$imageNewName,$directory,$imgUrl;

    public static function saveHotels($request){

        self::$hotel =new Hotel();
        self::$hotel->place_name = $request->place_name;
        self::$hotel->hotel_name = $request->hotel_name;
        self::$hotel->hotel_type = $request->hotel_type;
        self::$hotel->hotel_location = $request->hotel_location;
        self::$hotel->hotel_rating = $request->hotel_rating;
        self::$hotel->hotel_description = $request->hotel_description;
        if ($request->file('hotel_image')){
            if (self::$hotel->hotel_image){
                if (file_exists(self::$hotel->hotel_image)){
                    unlink(self::$hotel->hotel_image);
                }
            }
            self::$hotel->hotel_image = self::getImageUrl($request);
        }
      
        self::$hotel->save();
    }
    public static function hotelsUpdate($request, $id)
    {
        self::$hotel = Hotel::find($id);
        self::$hotel->place_name = $request->place_name;
        self::$hotel->hotel_name = $request->hotel_name;
        self::$hotel->hotel_type = $request->hotel_type;
        self::$hotel->hotel_location = $request->hotel_location;
        self::$hotel->hotel_rating = $request->hotel_rating;
        self::$hotel->hotel_description = $request->hotel_description;
        if($request->file('hotel_image'))
        {
            if(file_exists(self::$hotel->hotel_image))
            {
                unlink(self::$hotel->hotel_image);
            }
            self::$imgUrl = self::getImageUrl($request);
        }
        else{
            self::$imgUrl = self::$hotel->hotel_image;
        }
        self::$hotel->save();
    }
    private static function getImageUrl($request){
        self::$hotel_image = $request->file('hotel_image');
        self::$imageNewName=rand().'.'.self::$hotel_image->getClientOriginalExtension();
        self::$directory='adminAsset/hotel-image/';
        self::$imgUrl=self::$directory.self::$imageNewName;
        self::$hotel_image->move(self::$directory,self::$imageNewName);
        return self::$imgUrl;
    }

    public static function status($id){
        self::$hotel = Hotel::find($id);
        if (self::$hotel->status == 1){
            self::$hotel->status = 0;
        }else{
            self::$hotel->status = 1;
        }
        self::$hotel->save();
    }

    public static function hotelsDelete($request){
        self::$hotel = Hotel::find($request->id);
        if (self::$hotel->hotel_image){
            if (file_exists(self::$hotel->hotel_image)){
                unlink(self::$hotel->hotel_image);
            }
        }
        self::$hotel->delete();
    }
}
