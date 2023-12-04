<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelCategory;
use App\Http\Requests\HotelCategoryRequest;
use App\Http\Requests\HotelRequest;

class HotelController extends Controller
{
    public function index(){
        return view('admin.hotel.index',[
            'hotels' => Hotel::all()
        ]);
    }
    public function create(){
        return view('admin.hotel.create',[
            'places' => Place::where('status', 1)->get(),
            'categories' => HotelCategory::where('status', 1)->get()
        ]);

    }
    public function saveHotels(HotelRequest $request){
        Hotel::savehotels($request);
        return redirect('/hotel')->with('message','Info save successfully');
    }
    public function status($id){
        Hotel::status($id);
        return back()->with('message','status Info update successfully');
    }

    public function hotelDelete(Request $request){
        Hotel::hotelsDelete($request);
        return back()->with('message','Info Delete successfully');
    }
    public function edit($id)
    {
        return view('admin.hotel.edit', [
            'hotel'   => Hotel::find($id),
            'places' => Place::all()
        ]);
    }
    public function hotelUpdate(HotelRequest $request, $id)
    {
        Hotel::hotelsUpdate($request, $id);
        return redirect('/hotel')->with('message', 'Subcategory info updated.');
    }

    public function hotelCategoryCreate(){
        return view('admin.hotel.category.create',[
            'hotelCategories' => HotelCategory::all()
        ]);
    }

    public function saveHotelCategory(HotelCategoryRequest $request){
        HotelCategory::saveHotelCategory($request);
        return back()->with('message','Info save successfully');
    }

    public function statusHotelCategory($id){
        HotelCategory::statusHotelCategory($id);
        return back()->with('message','status Info update successfully');
    }

    public function hotelCategoryDelete(Request $request){
        HotelCategory::HotelCategoryDelete($request);
        return back()->with('message','Info Delete successfully');
    }

    public function editHotelCategory($id)
    {
        return view('admin.hotel.category.edit', [
            'hotelCategory'   => HotelCategory::find($id),
            'hotelCategories' => HotelCategory::all()
        ]);
    }

    public function hotelCategoryUpdate(HotelCategoryRequest $request, $id)
    {
        HotelCategory::HotelCategoryUpdate($request, $id);
        return back()->with('message', 'Hotel Category info updated.');
    }
}
