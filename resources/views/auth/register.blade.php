@extends('auth.master')
@section('title')
    Admin - Registration
@endsection
@section('body')
    <form action="{{route('register')}}" method="POST" class="login100-form validate-form" >
        @csrf
        <span class="login100-form-title">Registration</span>
        <div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="name" placeholder="User name" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="mdi mdi-account" aria-hidden="true"></i>
            </span>
        </div>
        <div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="email" name="email" placeholder="Email" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="zmdi zmdi-email" aria-hidden="true"></i>
            </span>
        </div>
        <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
            <input class="input100" type="password" name="password" placeholder="Password" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="zmdi zmdi-lock" aria-hidden="true"></i>
            </span>
        </div>
        <div class="wrap-input100 validate-input">
            <input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="zmdi zmdi-lock" aria-hidden="true"></i>
            </span>
        </div>
        <div class="container-login100-form-btn">
            <input type="submit" class="login100-form-btn btn-primary">
        </div>
        <div class="text-center pt-3">
            <p class="text-dark mb-0">Already have account?<a href="{{route('login')}}" class="text-primary ms-1">Sign In</a></p>
        </div>
    </form>
@endsection
@push('other-js')

    <script src="{{asset('/')}}assets/admin/plugins/jquery/jquery.min.js"></script>
    <script src="{{asset('/')}}assets/admin/js/custom.js"></script>

@endpush
