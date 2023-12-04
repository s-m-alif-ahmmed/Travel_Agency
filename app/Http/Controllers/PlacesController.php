<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Requests\PlaceRequest;

class PlacesController extends Controller
{
    public function index(){
        return view('admin.places.index',[
            'places' => Place::all()
        ]);
    }
    public function create(){
        return view('admin.places.create');
    }

    public function savePlaces(PlaceRequest $request){
        Place::savePlaces($request);
        return back()->with('message','Info save successfully');
    }
    public function statusPlace($id){
        Place::statusPlace($id);
        return back()->with('message','status Info update successfully');
    }

    public function placesDelete(Request $request){
        Place::placesDelete($request);
        return back()->with('message','Info Delete successfully');
    }
    public function edit($id)
    {
        return view('admin.places.edit', [
            'place'   => Place::find($id),
        ]);
    }
    public function placesUpdate(PlaceRequest $request, $id)
    {
        Place::placesUpdate($request, $id);
        return redirect('/places')->with('message', 'Places info updated.');
    }
}
