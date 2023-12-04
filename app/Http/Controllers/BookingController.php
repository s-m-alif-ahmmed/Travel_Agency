<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmationMail;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Session;
use Mail;

class BookingController extends Controller
{
    private $customer, $order;

    public function index(OrderRequest $request, $id)
    {

        if (Session::get('customer_id'))
        {
            $this->order = new Order();
            $this->order->customer_id       = Session::get('customer_id');
            $this->order->package_id        = $id;
            $this->order->price_id          = $request->price_id;
            $this->order->order_date        = date('Y-m-d');
            $this->order->order_timestamp   = strtotime(date('Y-m-d'));
            $this->order->save();

            $this->customer = Customer::find(Session::get('customer_id'));

            $mailData = [
                'title'     => 'Mail from ItSolutionStuff.com',
                'customer'  => $this->customer
            ];

            Mail::to($this->customer->email)->send(new BookingConfirmationMail($mailData));
            return redirect('/complete-order')->with('message', 'Congratulation Your Booking request post successfully.');
        }
        return view('website.booking.index', ['id' => $id, 'price_id' => $request->price_id]);
    }

    public function newOrder(OrderRequest $request, $id)
    {

        $this->customer = Customer::where('mobile', $request->mobile)->first();
        if (!$this->customer)
        {
            $this->validate($request, [
                'name'      => 'required',
                'email'     => 'required|email:rfc,dns',
                'mobile'    => 'required|unique:customers,mobile',
            ]);

            $this->customer = new Customer();
            $this->customer->name       = $request->name;
            $this->customer->email      = $request->email;
            $this->customer->mobile     = $request->mobile;
            
            $this->customer->password   = bcrypt($request->password);
            $this->customer->save();
        }

        Session::put('customer_id', $this->customer->id);
        Session::put('customer_name', $this->customer->name);
        
        $this->order = new Order();
        $this->order->customer_id       = $this->customer->id;
        $this->order->package_id        = $id;
        $this->order->order_date        = date('Y-m-d');
        $this->order->price_id          = $request->price_id;
        $this->order->order_timestamp   = strtotime(date('Y-m-d'));
        $this->order->save();

        $mailData = [
            'title'     => 'Mail from ItSolutionStuff.com',
            'customer'  => $this->customer
        ];

        Mail::to($this->customer->email)->send(new BookingConfirmationMail($mailData));
        return redirect('/complete-order')->with('message', 'Congratulation Your Booking request post successfully.');
    }

    public function completeOrder()
    {
        return view('website.booking.complete-booking');
    }
}
