<!doctype html>
<html lang="en" dir="ltr">
<head>
    @include('layouts.style')
</head>
<body class="ltr app sidebar-mini">

<!-- GLOBAL-LOADER -->
<div id="global-loader">
    <img src="{{asset('/')}}assets/images/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /GLOBAL-LOADER -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">
        <!-- app-Header -->
        @include('layouts.header')
        <!-- /app-Header -->
        <!--APP-SIDEBAR-->
        @include('layouts.menu')
        <!--/APP-SIDEBAR-->
        <!--app-content open-->
        <div class="app-content main-content mt-0">
            <div class="side-app">
                <!-- CONTAINER -->
                <div class="main-container container-fluid">
                    @yield('body')
                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
    @include('layouts.footer')
</div>
<!-- page -->

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>
<!-- BACK-TO-TOP -->
@stack('other-scripts')
@include('layouts.script')

@stack('other-js')

</body>
</html>
