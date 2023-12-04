<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientReview;
use App\Http\Requests\ClientReviewRequest;

class ClientsController extends Controller
{
    public function index(){
        return view('admin.client.index',[
            'clients' => ClientReview::all()
        ]);
    }
    public function create(){
        return view('admin.client.create');

    }
    public function saveClients(ClientReviewRequest $request){
        ClientReview::saveclients($request);
        return redirect('/client')->with('message','Info save successfully');
    }
    public function status($id){
        ClientReview::status($id);
        return back()->with('message','status Info update successfully');
    }

    public function clientDelete(Request $request){
        ClientReview::clientsDelete($request);
        return back()->with('message','Info Delete successfully');
    }
    public function edit($id)
    {
        return view('admin.client.edit', [
            'client'   => ClientReview::find($id),
           
        ]);
    }
    public function clientUpdate(ClientReviewRequest $request, $id)
    {
        ClientReview::clientsUpdate($request, $id);
        return redirect()->route('client')->with('message', 'Subcategory info updated.');
    }
}
