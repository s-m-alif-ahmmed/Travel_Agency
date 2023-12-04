@extends('layouts.app')
@section('title', 'Manage Hotels')
@section('body')

        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Manage Hotel</h3>

                    </div>
                    <div class="card-body">
                        <p class="text-warning">{{session('message')}}</p>
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Serial No.</th>
                                    <th class="wd-15p border-bottom-0">Place Name</th>
                                    <th class="wd-20p border-bottom-0">Hotel Name</th>
                                    <th class="wd-20p border-bottom-0">Hotel Type</th>
                                    <th class="wd-20p border-bottom-0">Hotel Location</th>
                                    <th class="wd-20p border-bottom-0">Hotel Image</th>
                                    <th class="wd-20p border-bottom-0">Hotel Rating</th>
                                    <th class="wd-20p border-bottom-0">Hotel Status</th>
                                    <th class="wd-20p border-bottom-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($hotels as $hotel)
                                    <tr class="">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$hotel->place_name}}</td>
                                        <td>{{$hotel->hotel_name}}</td>
                                        <td>{{$hotel->hotel_type}}</td>
                                        <td>{{$hotel->hotel_location}}</td>
                                        <td class="">
                                            <img src="{{ asset($hotel->hotel_image) }}" alt="" style="width: 50px;height: 50px">
                                        </td>
                                        <td>{{$hotel->hotel_rating}}</td>
                                        
                                        <td class="">
                                            @if($hotel->status == 1)
                                                <a href="{{ route('status',['id'=>$hotel->id]) }}" class="btn btn-primary  btn-sm ">Active</a>
                                            @else
                                                <a href="{{ route('status',['id'=>$hotel->id]) }}" class="btn btn-warning btn-sm">Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('hotel.edit',['id'=>$hotel->id]) }}" class="btn btn-primary btn-sm"><span class=""><i class="fa fa-edit"></i></span> Edit</a>
                                            <a href="{{ route('hotel.delete',['id'=>$hotel->id]) }}" class="btn btn-dark btn-sm m-0"><span class=""><i class="fa fa-trash"></i></span> Delete</a>
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


