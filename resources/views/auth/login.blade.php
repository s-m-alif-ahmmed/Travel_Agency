@extends('auth.master')
@section('title')
    Admin Login
@endsection
@section('body')
    <form action="{{route('login')}}" method="POST" class="login100-form">
        @csrf
        <span class="login100-form-title">Login</span>
        <div class="wrap-input100">
            <input class="input100" type="email" name="email" placeholder="Email" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="zmdi zmdi-email" aria-hidden="true"></i>
            </span>
        </div>
        <div class="wrap-input100">
            <input class="input100" type="password" name="password" placeholder="Password" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="zmdi zmdi-lock" aria-hidden="true"></i>
            </span>
        </div>
        <div class="container-login100-form-btn">
            <input type="submit" class="login100-form-btn btn-primary">
        </div>
        <div class="text-center pt-3">
            <p class="text-dark mb-0">Not a member?<a href="{{route('register')}}" class="text-primary ms-1">Create an Account</a></p>
        </div>
    </form>
@endsection
@push('other-js')
    <script src="{{asset('/')}}assets/admin/plugins/jquery/jquery.min.js"></script>
    <script src="{{asset('/')}}assets/admin/js/custom.js"></script>
@endpush
