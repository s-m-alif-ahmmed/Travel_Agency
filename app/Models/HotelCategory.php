<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelCategory extends Model
{
    use HasFactory;
    private static $hotel_category;

    public static function saveHotelCategory($request){

        self::$hotel_category = new HotelCategory();
        self::$hotel_category->hotel_category_name = $request->hotel_category_name;
        self::$hotel_category->save();
    }
    public static function HotelCategoryUpdate($request, $id)
    {
        self::$hotel_category = HotelCategory::find($id);
        self::$hotel_category->hotel_category_name = $request->hotel_category_name;

        self::$hotel_category->save();
    }

    public static function statusHotelCategory($id){
        self::$hotel_category = HotelCategory::find($id);
        if (self::$hotel_category->status == 1){
            self::$hotel_category->status = 0;
        }else{
            self::$hotel_category->status = 1;
        }
        self::$hotel_category->save();
    }

    public static function hotelCategoryDelete($request){
        self::$hotel_category = HotelCategory::find($request->id);

        self::$hotel_category->delete();
    }
}
