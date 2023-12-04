<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index',['orders' => Order::latest()->get()]);
    }

    public function statusOrder($id)
    {
        Order::statusOrder($id);
        return back()->with('message','status Info update successfully');
    }


    public function detail($id)
    {
        return view('admin.order.detail',['order' => Order::find($id)]);
    }
}
