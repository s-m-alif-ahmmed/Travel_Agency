@extends('layouts.app')
@section('title', 'Update Client')
@section('body')

                <div class="row row-sm mt-5">
                    <div class="col-lg-12 mt-5">
                        <div class="card box-shadow-0 mt-5">
                            <div class="card-header border-bottom mt-5">
                                <h4 class="card-title">Package Add Form</h4>
                            </div>
                            <p class="alert-danger">{{$errors->first()}}</p>
                            <div class="card-body">
                                <p class="text-primary">{{session('message') }}</p>
                                <form action="{{route('client.update', ['id' => $client->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        
                                        <div class="form-group col-md-4">
                                            <label for="client_name" class="form-label mb-3">Client Name</label>
                                            <input type="text" class="form-control border-warning" id="exampleInputEmail2" placeholder="Enter Client Name" name="client_name" value="{{$client->client_name}}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="client_rating" class="form-label mb-3">Client Rating</label>
                                            <input type="text" class="form-control border-warning" id="exampleInputEmail2" placeholder="Enter Client Rating" name="client_rating" value="{{$client->client_rating}}" required>
                                        </div>
                                       
                                        <div class="form-group col-md-2">
                                            <label for="formFile" class="form-label mb-3">Client Image</label>
                                            <input class="form-control file-input" type="file" id="formFile" name="client_image">
                                        </div>
                                        <div class="col-md-2">
                                            <img src="{{asset($client->client_image)}}" class="" height="80" width="60">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="client_description" class="form-label mb-3">Client Description</label>
                                            <div class="card-body">
                                                <textarea name="client_description" placeholder="Type Here">{{$client->client_description}}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

@endsection

