@extends('layouts.app')
@section('title', 'Manage Package')
@section('body')

                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Manage Place</h3>

                            </div>
                            <div class="card-body">
                                <p class="text-warning">{{session('message')}}</p>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                        <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">Serial No.</th>
                                            <th class="wd-15p border-bottom-0">Tour Title</th>
                                            <th class="wd-15p border-bottom-0">Package Image</th>
                                            <th class="wd-15p border-bottom-0">Start</th>
                                            <th class="wd-15p border-bottom-0">End</th>
                                            <th class="wd-15p border-bottom-0">Tour Address</th>

                                            <th class="wd-20p border-bottom-0">Status</th>
                                            <th class="wd-20p border-bottom-0">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($packages as $item)
                                            <tr class="">
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->tour_title}}</td>
                                                <td class="">
                                                    <img src="{{ asset($item->package_image) }}" alt="" style="height: 50px">
                                                </td>
                                                <td>
                                                    {{ $item->tour_start_date }}
                                                </td>
                                                <td>
                                                    {{ $item->tour_end_date }}
                                                </td>
                                                <td>{{$item->tour_address}}</td>

                                                <td class="">
                                                    @if($item->status == 1)
                                                        <a href="{{ route('package.status',['id'=>$item->id]) }}" class="btn btn-primary  btn-sm ">Active</a>
                                                    @else
                                                        <a href="{{ route('package.status',['id'=>$item->id]) }}" class="btn btn-warning btn-sm">Inactive</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('package.detail',['id'=>$item->id]) }}" class="btn btn-success btn-sm"><span class="">Details</span></a>
                                                    <a href="{{ route('package.edit',['id'=>$item->id]) }}" class="btn btn-primary btn-sm"><span class=""><i class="fa fa-edit"></i></span></a>
                                                    <a href="{{ route('package.delete',['id'=>$item->id]) }}" onclick="return confirm('Are you sure to delete this ...')" class="btn btn-danger btn-sm m-0"><span class=""><i class="fa fa-trash"></i></span></a>
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


