<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Package;


class PackagePrice extends Model
{
    use HasFactory;
    public static $package, $packagePrice, $packagePrices, $i;

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public static function newPackagePrice($data, $id)
    {
        self::$i = PHP_INT_MAX;
        foreach ($data as $item)
        {


            if(self::$i > $item['price'] ){
                self::$i = $item['price'];
            }
            self::$packagePrice = new PackagePrice();
            self::$packagePrice->package_id = $id;
            self::$packagePrice->person     = $item['person'];
            self::$packagePrice->children     = $item['children'];
            self::$packagePrice->adult     = $item['adult'];
            self::$packagePrice->hotel_type = $item['hotel_type'];
            self::$packagePrice->price      = $item['price'];
            self::$packagePrice->save();
        }


        self::$package = Package::find($id);
        self::$package->lowest_price = self::$i;
        self::$package->save();
    }

    public static function updatePackagePrice($data, $id)
    {
        self::$i = PHP_INT_MAX;
        self::$packagePrices = PackagePrice::where('package_id', $id)->get();
        foreach (self::$packagePrices as $packagePrice)
        {
            $packagePrice->delete();
        }

        foreach ($data as $item)
        {
            if(self::$i > $item['price'] ){
                self::$i = $item['price'];
            }
            self::$packagePrice = new PackagePrice();
            self::$packagePrice->package_id = $id;
            self::$packagePrice->person     = $item['person'];
            self::$packagePrice->children     = $item['children'];
            self::$packagePrice->adult     = $item['adult'];
            self::$packagePrice->hotel_type = $item['hotel_type'];
            self::$packagePrice->price      = $item['price'];
            self::$packagePrice->save();

        }

        self::$package = Package::find($id);
        self::$package->lowest_price = self::$i;

        self::$package->save();
    }

    public static function deletePackagePrice($id)
    {
        self::$packagePrices = PackagePrice::where('package_id', $id)->get();
        foreach (self::$packagePrices as $packagePrice)
        {
            $packagePrice->delete();
        }
    }
}
