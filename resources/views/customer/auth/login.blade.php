@extends('website.master')

@section('body')

    <!--Middle part start here-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-body">
                        <h3 class="text-center">Login Form</h3>
                            <p class="text-center text-capitalize">Please fill all the information carefully</p>
                        <hr/>
                        <form action="{{route('customer.login')}}" method="POST">
                            @csrf
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
                                    <input type="submit" class="btn btn-warning" value="Login"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
