@extends('layouts.app')
@section('title', 'Update Tour Facility')
@section('body')

    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card box-shadow-0">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Update Tour Facility</h4>
                </div>
                <div class="card-body">
                    <p class="text-primary">{{session('message') }}</p>
                    <form action="{{route('tour.facility.update', ['id' => $tourFacility->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="tour_facility" class="form-label mb-3">Tour Facility Name </label>
                                <input type="text" class="form-control border-warning" placeholder="Enter Facility Name" value="{{$tourFacility->tour_facility_name}}" name="tour_facility_name">
                                <p class="alert-danger">{{$errors->first()}}</p>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Manage Tour Facility</h3>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">Serial No.</th>
                                <th class="wd-15p border-bottom-0">Tour Facility Name</th>
                                <th class="wd-20p border-bottom-0">Status</th>
                                <th class="wd-20p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tourFacilities as $item)
                                <tr class="">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->tour_facility_name}}</td>
                                    <td class="">
                                        @if($item->status == 1)
                                            <a href="{{ route('tour.facility.status',['id'=>$item->id]) }}" class="btn btn-primary  btn-sm ">Active</a>
                                        @else
                                            <a href="{{ route('tour.facility.status',['id'=>$item->id]) }}" class="btn btn-warning btn-sm">Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('tour.facility.edit',['id'=>$item->id]) }}" class="btn btn-primary btn-sm"><span class=""><i class="fa fa-edit"></i></span> Edit</a>
                                        <a href="{{ route('tour.facility.delete',['id'=>$item->id]) }}" class="btn btn-dark btn-sm m-0"><span class=""><i class="fa fa-trash"></i></span> Delete</a>
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

