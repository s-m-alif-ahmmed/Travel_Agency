@extends('layouts.app')
@section('title', 'Manage Clients')
@section('body')

        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Manage Client</h3>

                    </div>
                    <div class="card-body">
                        <p class="text-warning">{{session('message')}}</p>
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">Serial No.</th>
                                    
                                    <th class="wd-20p border-bottom-0">Client Name</th>
                                   
                                    <th class="wd-20p border-bottom-0">Client Image</th>
                   
                                    <th class="wd-20p border-bottom-0">Client Status</th>
                                    <th class="wd-20p border-bottom-0">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $client)
                                    <tr class="">
                                        <td>{{$loop->iteration}}</td>
                                      
                                        <td>{{$client->client_name}}</td>
                                       
                                        <td class="">
                                            <img src="{{ asset($client->client_image) }}" alt="" style="width: 50px;height: 50px">
                                        </td>
                                      
                                        
                                        <td class="">
                                            @if($client->status == 1)
                                                <a href="{{ route('status',['id'=>$client->id]) }}" class="btn btn-primary  btn-sm ">Active</a>
                                            @else
                                                <a href="{{ route('status',['id'=>$client->id]) }}" class="btn btn-warning btn-sm">Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('client.edit',['id'=>$client->id]) }}" class="btn btn-primary btn-sm"><span class=""><i class="fa fa-edit"></i></span> Edit</a>
                                            <a href="{{ route('client.delete',['id'=>$client->id]) }}" class="btn btn-dark btn-sm m-0"><span class=""><i class="fa fa-trash"></i></span> Delete</a>
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


