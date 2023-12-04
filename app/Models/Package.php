<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    private static $package, $package_image ,$imageNewName,$directory,$imgUrl;

    public static function savePackage($request){

        self::$package =new Package();
        self::$package->package_category_id = $request->package_category_id;
        self::$package->place_id = $request->place_id;
        self::$package->tour_title = $request->tour_title;
        self::$package->tour_address = $request->tour_address;
        self::$package->tour_rating = $request->tour_rating;
        self::$package->tour_start_date = $request->tour_start_date;
        self::$package->tour_end_date = $request->tour_end_date;
        self::$package->overview = $request->overview;
        self::$package->meeting_pickup = $request->meeting_pickup;
        self::$package->included_excluded = $request->included_excluded;
        self::$package->terms_conditions = $request->terms_conditions;
        self::$package->expectations = $request->expectations;
        if ($request->file('package_image')) {
            if (self::$package->package_image) {
                if (file_exists(self::$package->package_image)) {
                    unlink(self::$package->package_image);
                }
            }
            self::$package->package_image = self::getImageUrl($request);
        }
        self::$package->save();
        return self::$package;
        
    }
    public static function packagesUpdate($request, $id)
    {
        self::$package = Package::find($id);
        self::$package->package_category_id = $request->package_category_id;
        self::$package->place_id = $request->place_id;
        self::$package->tour_title = $request->tour_title;
        self::$package->tour_address = $request->tour_address;
        self::$package->tour_rating = $request->tour_rating;
        self::$package->tour_start_date = $request->tour_start_date;
        self::$package->tour_end_date = $request->tour_end_date;
        self::$package->overview = $request->overview;
        self::$package->meeting_pickup = $request->meeting_pickup;
        self::$package->included_excluded = $request->included_excluded;
        self::$package->expectations = $request->expectations;
        self::$package->terms_conditions = $request->terms_conditions;
        if($request->file('package_image'))
        {
            if(file_exists(self::$package->package_image))
            {
                unlink(self::$package->package_image);
            }
            self::$package->package_image = self::getImageUrl($request);
        }
        self::$package->save();
    }

    private static function getImageUrl($request){
        self::$package_image = $request->file('package_image');
        self::$imageNewName=rand().'.'.self::$package_image->getClientOriginalExtension();
        self::$directory='adminAsset/package-image/';
        self::$imgUrl=self::$directory.self::$imageNewName;
        self::$package_image->move(self::$directory,self::$imageNewName);
        return self::$imgUrl;
    }


    public static function statusPackage($id){
        self::$package = Package::find($id);
        if (self::$package->status == 1){
            self::$package->status = 0;
        }else{
            self::$package->status = 1;
        }
        self::$package->save();
    }

    public static function packagesDelete($id){
        self::$package = Package::find($id);
        if (self::$package->package_image){
            if (file_exists(self::$package->package_image)){
                unlink(self::$package->package_image);
            }
        }
        self::$package->delete();
    }

    public function otherImages()
    {
        return $this->hasMany(OtherImage::class);
    }

    public function packagePrices()
    {
        return $this->hasMany(PackagePrice::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
