<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourFacility extends Model
{
    use HasFactory;

    private static $tour_facility;

    public static function saveTourFacility($request){

        self::$tour_facility = new TourFacility();
        self::$tour_facility->tour_facility_name = $request->tour_facility_name;
        self::$tour_facility->save();
    }
    public static function tourFacilityUpdate($request, $id)
    {
        self::$tour_facility = TourFacility::find($id);
        self::$tour_facility->tour_facility_name = $request->tour_facility_name;

        self::$tour_facility->save();
    }

    public static function statusTourFacility($id){
        self::$tour_facility = TourFacility::find($id);
        if (self::$tour_facility->status == 1){
            self::$tour_facility->status = 0;
        }else{
            self::$tour_facility->status = 1;
        }
        self::$tour_facility->save();
    }

    public static function tourFacilityDelete($request){
        self::$tour_facility = TourFacility::find($request->id);

        self::$tour_facility->delete();
    }
}
