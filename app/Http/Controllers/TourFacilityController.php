<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TourFacilityRequest;
use App\Models\TourFacility;

class TourFacilityController extends Controller
{
    public function create(){
        return view('admin.package.facility.create',[
            'tourFacilities' => TourFacility::all()
        ]);
    }

    public function saveTourFacility(TourFacilityRequest $request){
        TourFacility::saveTourFacility($request);
        return back()->with('message','Info save successfully');
    }

    public function statusTourFacility($id){
        TourFacility::statusTourFacility($id);
        return back()->with('message','status Info update successfully');
    }

    public function tourFacilityDelete(Request $request){
        TourFacility::tourFacilityDelete($request);
        return back()->with('message','Info Delete successfully');
    }

    public function edit($id)
    {
        return view('admin.package.facility.edit', [
            'tourFacility'   => TourFacility::find($id),
            'tourFacilities' => TourFacility::all()

        ]);
    }

    public function tourFacilityUpdate(TourFacilityRequest $request, $id)
    {
        TourFacility::tourFacilityUpdate($request, $id);
        return back()->with('message', 'Tour Facility info updated.');
    }
}
