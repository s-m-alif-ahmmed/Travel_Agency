<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageCategory extends Model
{
    use HasFactory;
    private static $package_category;

    public static function savePackageCategory($request){

        self::$package_category = new PackageCategory();
        self::$package_category->package_category_name = $request->package_category_name;
        self::$package_category->save();
    }
    public static function packageCategoryUpdate($request, $id)
    {
        self::$package_category = PackageCategory::find($id);
        self::$package_category->package_category_name = $request->package_category_name;

        self::$package_category->save();
    }

    public static function statusPackageCategory($id){
        self::$package_category = PackageCategory::find($id);
        if (self::$package_category->status == 1){
            self::$package_category->status = 0;
        }else{
            self::$package_category->status = 1;
        }
        self::$package_category->save();
    }

    public static function packageCategoryDelete($request){
        self::$package_category = PackageCategory::find($request->id);

        self::$package_category->delete();
    }
}
