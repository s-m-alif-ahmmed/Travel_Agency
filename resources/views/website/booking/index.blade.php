@extends('website.master')

@section('body')

    <!--Middle part start here-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-body">
                        <h3 class="text-center">Booking Form</h3>
                        <p class="text-center">Please fill all the information carefully.</p>
                        <hr/>
                        <form action="{{route('new-booking-order', ['id' => $id])}}" method="POST">
                            @csrf
                            <input type="hidden" id="price_id" name="price_id" value="{{ $price_id }}">
                        
                            <div class="row mb-3">
                                <label class="col-md-3">Full Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" required name="name"/>
                                    <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Email Address</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" required name="email"/>
                                    <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Mobile Number</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" required name="mobile"/>
                                    <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" required name="password"/>
                                    <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-warning" value="Confirm Booking"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
