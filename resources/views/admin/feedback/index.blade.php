@extends('layouts.app')
@section('title', 'Manage Place')
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
                                            <th class="wd-15p border-bottom-0">Client Name</th>
                                            <th class="wd-20p border-bottom-0">Client Designation</th>
                                            <th class="wd-20p border-bottom-0">Client Image</th>
                                            <th class="wd-20p border-bottom-0">Status</th>
                                            <th class="wd-20p border-bottom-0">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($feedbacks as $feedback)
                                            <tr class="">
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$feedback->client_name}}</td>
                                                <td>{{$feedback->client_designation}}</td>
                                                <td class="">
                                                    <img src="{{ asset($feedback->client_image) }}" alt="" style="height: 50px">
                                                </td>
                                                <td class="">
                                                    @if($feedback->status == 1)
                                                        <a href="{{ route('feedback.status',['id'=>$feedback->id]) }}" class="btn btn-primary  btn-sm ">Active</a>
                                                    @else
                                                        <a href="{{ route('feedback.status',['id'=>$feedback->id]) }}" class="btn btn-warning btn-sm">Inactive</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('feedback.edit',['id'=>$feedback->id]) }}" class="btn btn-primary btn-sm"><span class=""><i class="fa fa-edit"></i></span> Edit</a>
                                                    <a href="{{ route('feedback.delete',['id'=>$feedback->id]) }}" class="btn btn-dark btn-sm m-0"><span class=""><i class="fa fa-trash"></i></span> Delete</a>
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


