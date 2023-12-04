<?php

namespace App\Http\Controllers;

use App\Models\OtherImage;
use App\Models\PackageCategory;
use App\Models\TourFacility;
use App\Models\PackagePrice;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Place;
use App\Models\HotelCategory;
use App\Http\Requests\packageRequest;

class PackageController extends Controller
{
    private $package;

    public function index(){
        return view('admin.package.index',[
            'packages' => Package::latest()->get()
        ]);
    }

    public function create(Request $request){
        return view('admin.package.create',[
            'request' => $request,
            'package_categories' => PackageCategory::where('status', 1)->get(),
            'tour_facilities' => TourFacility::where('status', 1)->get(),
            'hotel_categories' => HotelCategory::where('status', 1)->get(),
            'places' => Place::where('status', 1)->get()
        ]);
    }

    public function savePackage(PackageRequest $request){

        $this->package = Package::savePackage($request);
        OtherImage::newOtherImage($request, $this->package->id);
        PackagePrice::newPackagePrice($request->price, $this->package->id);
        return back()->with('message','Info save successfully');
    }

    public function statusPackage($id){
        Package::statusPackage($id);
        return back()->with('message','status Info update successfully');
    }

    public function packageDelete($id) {
        Package::packagesDelete($id);
        OtherImage::deleteOtherImage($id);
        PackagePrice::deletePackagePrice($id);
        return back()->with('message','Info Delete successfully');
    }

    public function edit($id)
    {
        return view('admin.package.edit', [
            'package'   => Package::find($id),
            'package_categories' => PackageCategory::where('status', 1)->get(),
            'hotel_categories' => HotelCategory::where('status', 1)->get(),
            'tour_facilities' => TourFacility::where('status', 1)->get(),
            'places' => Place::where('status', 1)->get()
        ]);
    }

    public function detail($id)
    {
        return view('admin.package.detail', [
            'package'   => Package::find($id),
            'package_categories' => PackageCategory::where('status', 1)->get(),
            'places' => Place::where('status', 1)->get()
        ]);
    }
    public function packageUpdate(PackageRequest $request, $id)
    {
        Package::packagesUpdate($request, $id);
        if ($request->file('other_image'))
        {
            OtherImage::updateOtherImage($request, $id);
        }
        PackagePrice::updatePackagePrice($request->price, $id);
        return redirect('/package')->with('message', 'Package info updated.');
    }


}
