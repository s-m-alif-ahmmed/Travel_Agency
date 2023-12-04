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
                    <p class="text-warning">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


