@extends('website.master')

@section('body')

    <!--Middle part start here-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card card-body">
                        <h1 class="text-center">My Booking Info</h1>
                        <hr/>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Booking ID</th>
                                    <th>Package Info</th>
                                    <th>Booking Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->package->tour_title}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>
                                    <a href="{{ route('package-detail',['id'=>$order->package_id]) }}" class="btn btn-primary btn-sm">Details</a>
                                    <a href="{{ route('booking-invoice',['id'=>$order->id]) }}" class="btn btn-warning btn-sm">View Invoice</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
