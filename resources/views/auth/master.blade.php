<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link href="{{asset('/')}}assets/admin/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="{{asset('/')}}assets/admin/css/style.css" rel="stylesheet"/>
    <link href="{{asset('/')}}assets/admin/css/icons.css" rel="stylesheet"/>
</head>
<body>
    <div class="page">
        <div>
            <div class="col col-login mx-auto text-center">
                <a href="{{route('dashboard')}}" class="text-center">
                    <img src="" class="header-brand-img" alt="">
                </a>
            </div>
            <div class="container-login100">
                <div class="wrap-login100 p-0">
                    <div class="card-body">
                        @yield('body')
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center my-3">
                            <a href="javascript:void(0)" class="social-login  text-center me-4">
                                <i class="fa fa-google"></i>
                            </a>
                            <a href="javascript:void(0)" class="social-login  text-center me-4">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="javascript:void(0)" class="social-login  text-center">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{asset('/')}}assets/admin/js/bootstrap.bundle.js"></script>
    @stack('other-js')
</body>
</html>
