@extends('website.master')

@section('body')

    <!--Middle part start here-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-body">
                        <h4 class="text-center text-success">{{session('message')}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
