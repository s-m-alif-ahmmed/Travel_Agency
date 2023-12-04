<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use PDF;

class AdminBookingController extends Controller
{
    public function invoice($id)
    {   
        $order = Order::find($id);
        $pdf = PDF::loadView('admin.order.invoice', ['id' => $id, 'order' => $order]);
        return $pdf->stream('booking-invoice-'.$id.'.pdf');
    }


    public function orderDelete($id)
    {
        Order::deleteOrder($id);
        return back()->with('message', 'Package booing info delete successfully.');
    }
}
