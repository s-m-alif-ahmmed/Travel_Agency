@extends('layouts.app')
@section('title', 'Manage Order')
@section('body')

    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Manage Package Booking</h3>
                </div>
                <div class="card-body">
                    <p class="text-danger">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Serial No.</th>
                                <th class="wd-15p border-bottom-0">Package Name</th>
                                <th class="wd-15p border-bottom-0">Customer Name</th>
                                <th class="wd-15p border-bottom-0">Order Date</th>
                                <th class="wd-20p border-bottom-0">Status</th>
                                <th class="wd-20p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr class="">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->package->tour_title}}</td>
                                    <td>{{$order->customer->name.'('.$order->customer->mobile.')'}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td class="">
                                        <a href="{{ route('package-detail',['id'=>$order->package_id]) }}" target="_blank" class="btn btn-primary  btn-sm" title="Detail Information">
                                            <i class="fa fa-book"></i>
                                        </a>
                                        <a href="{{ route('booking-invoice',['id'=>$order->id]) }}" target="_blank" class="btn btn-success btn-sm" title="Show Invoice PDF">
                                            <i class="fa fa-print"></i>
                                        </a>
                                        <a href="{{ route('admin.order-delete', ['id'=>$order->id]) }}" onclick="return confirm('Are you sure to delete this ...')" class="btn btn-danger btn-sm m-0" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


