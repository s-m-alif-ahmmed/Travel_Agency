<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    private $customer;

    public function index()
    {
        return view('customer.auth.login');
    }

    public function login(Request $request)
    {
        $this->customer = Customer::where('mobile', $request->mobile)->first();
        if ($this->customer)
        {
            if (password_verify($request->password, $this->customer->password))
            {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);

                return redirect('customer/dashboard');
            }
            else
            {
                return back()->with('message', 'Invalid Password');
            }
        }
        else
        {
            return back()->with('message', 'Invalid Email');
        }
    }

    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }

    public function dashboard()
    {
        return view('customer.home.index', ['orders' => Order::where('customer_id', Session::get('customer_id'))->get()]);
    }
}
