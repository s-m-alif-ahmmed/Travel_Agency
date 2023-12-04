<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}assets/admin/images/brand/favicon.ico"/>
    <link href="{{asset('/')}}assets/admin/css/style.css" rel="stylesheet" />
    <link href="{{asset('/')}}assets/admin/css/skin-modes.css" rel="stylesheet" />
    <link href="{{asset('/')}}assets/admin/plugins/icons/icons.css" rel="stylesheet" />
    <link href="{{asset('/')}}assets/admin/switcher/css/switcher.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/admin/switcher/demo.css" rel="stylesheet">
</head>

<body class="ltr app sidebar-mini">

    <div class="page">
        <div class="page-main">
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="#"></a>
                        <a class="logo-horizontal" href="{{route('dashboard')}}">
                            <img src="{{asset('/')}}assets/admin/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="">
                        </a>
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <button class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                    aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">
                                        <div class="dropdown d-md-flex">
                                            <a class="nav-link icon full-screen-link nav-link-bg">
                                                <svg xmlns="http://www.w3.org/2000/svg"  enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M8.5,21H3v-5.5C3,15.223877,2.776123,15,2.5,15S2,15.223877,2,15.5v6.0005493C2.0001831,21.7765503,2.223999,22.0001831,2.5,22h6C8.776123,22,9,21.776123,9,21.5S8.776123,21,8.5,21z M8.5,2H2.4993896C2.2234497,2.0001831,1.9998169,2.223999,2,2.5v6.0005493C2.0001831,8.7765503,2.223999,9.0001831,2.5,9h0.0006104C2.7765503,8.9998169,3.0001831,8.776001,3,8.5V3h5.5C8.776123,3,9,2.776123,9,2.5S8.776123,2,8.5,2z M21.5,15c-0.276123,0-0.5,0.223877-0.5,0.5V21h-5.5c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h6.0006104C21.7765503,21.9998169,22.0001831,21.776001,22,21.5v-6C22,15.223877,21.776123,15,21.5,15z M21.5,2h-6C15.223877,2,15,2.223877,15,2.5S15.223877,3,15.5,3H21v5.5005493C21.0001831,8.7765503,21.223999,9.0001831,21.5,9h0.0006104C21.7765503,8.9998169,22.0001831,8.776001,22,8.5V2.4993896C21.9998169,2.2234497,21.776001,1.9998169,21.5,2z"/></svg>
                                            </a>
                                        </div>
                                        <div class="dropdown d-md-flex profile-1">
                                            <a href="#" data-bs-toggle="dropdown" class="nav-link pe-2 leading-none d-flex animate">
                                                <span>
                                                    <img src="{{asset('/')}}uploads/logo.jpg" alt="" class="avatar profile-user brround cover-image">
                                                </span>
                                                <div class="text-center p-1 d-flex d-lg-none-max">
                                                    <h6 class="mb-0" id="profile-heading">{{Auth::user()->name}}<i class="user-angle ms-1 fa fa-angle-down "></i></h6>
                                                </div>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <a class="dropdown-item" href="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M14.6650391,13.3672485C16.6381226,12.3842773,17.9974365,10.3535767,18,8c0-3.3137207-2.6862793-6-6-6S6,4.6862793,6,8c0,2.3545532,1.3595581,4.3865967,3.3334961,5.3690186c-3.6583862,1.0119019-6.5859375,4.0562134-7.2387695,8.0479736c-0.0002441,0.0013428-0.0004272,0.0026855-0.0006714,0.0040283c-0.0447388,0.272583,0.1399536,0.5297852,0.4125366,0.5745239c0.272522,0.0446777,0.5297241-0.1400146,0.5744629-0.4125366c0.624939-3.8344727,3.6308594-6.8403931,7.465332-7.465332c4.9257812-0.8027954,9.5697632,2.5395508,10.3725586,7.465332C20.9594727,21.8233643,21.1673584,21.9995117,21.4111328,22c0.0281372,0.0001831,0.0562134-0.0021362,0.0839844-0.0068359h0.0001831c0.2723389-0.0458984,0.4558716-0.303833,0.4099731-0.5761719C21.2677002,17.5184937,18.411377,14.3986206,14.6650391,13.3672485z M12,13c-2.7614136,0-5-2.2385864-5-5s2.2385864-5,5-5c2.7600708,0.0032349,4.9967651,2.2399292,5,5C17,10.7614136,14.7614136,13,12,13z"/></svg>
                                                    Profile
                                                </a>
                                                <a class="dropdown-item" href="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M10.6523438,16.140625c-0.09375,0.09375-0.1464233,0.2208862-0.1464233,0.3534546c0,0.276123,0.2238159,0.5,0.499939,0.500061c0.1326294,0.0001221,0.2598267-0.0525513,0.3534546-0.1464844l4.4941406-4.4941406c0.000061-0.000061,0.0001221-0.000061,0.0001831-0.0001221c0.1951294-0.1952515,0.1950684-0.5117188-0.0001831-0.7068481L11.359314,7.1524048c-0.1937256-0.1871338-0.5009155-0.1871338-0.6947021,0c-0.1986084,0.1918335-0.2041016,0.5083618-0.0122681,0.7069702L14.2930298,11.5H2.5C2.223877,11.5,2,11.723877,2,12s0.223877,0.5,0.5,0.5h11.7930298L10.6523438,16.140625z M16.4199829,3.0454102C11.4741821,0.5905762,5.4748535,2.6099243,3.0200195,7.5556641C2.8970337,7.8029175,2.9978027,8.1030884,3.2450562,8.2260742C3.4923706,8.3490601,3.7925415,8.248291,3.9155273,8.0010376c0.8737793-1.7612305,2.300354-3.1878052,4.0615845-4.0615845C12.428833,1.730835,17.828064,3.5492554,20.0366821,8.0010376c2.2085571,4.4517212,0.3901367,9.8509521-4.0615845,12.0595703c-4.4517212,2.2085571-9.8510132,0.3901367-12.0595703-4.0615845c-0.1229858-0.2473145-0.4231567-0.3480835-0.6704102-0.2250977c-0.2473145,0.1229858-0.3480835,0.4230957-0.2250977,0.6704102c1.6773682,3.4109497,5.1530762,5.5667114,8.9541016,5.5537109c3.7976685,0.0003662,7.2676392-2.1509399,8.9560547-5.5526733C23.3850098,11.4996338,21.3657227,5.5002441,16.4199829,3.0454102z"/></svg>
                                                    Log out
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="{{route('dashboard')}}">
                            <img src="{{asset('/')}}uploads/logo.jpg" class="header-brand-img light-logo" alt="logo"> <!-- Before collapse -->
                            <img src="{{asset('/')}}uploads/logo.jpg" class="header-brand-img light-logo1" alt="logo"> <!-- After collapse -->
                        </a>
                    </div>
                    <div class="main-sidemenu">
                        <ul class="side-menu">
                            <li>
                                <h3>Menu</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('dashboard')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M19.9794922,7.9521484l-6-5.2666016c-1.1339111-0.9902344-2.8250732-0.9902344-3.9589844,0l-6,5.2666016C3.3717041,8.5219116,2.9998169,9.3435669,3,10.2069702V19c0.0018311,1.6561279,1.3438721,2.9981689,3,3h2.5h7c0.0001831,0,0.0003662,0,0.0006104,0H18c1.6561279-0.0018311,2.9981689-1.3438721,3-3v-8.7930298C21.0001831,9.3435669,20.6282959,8.5219116,19.9794922,7.9521484z M15,21H9v-6c0.0014038-1.1040039,0.8959961-1.9985962,2-2h2c1.1040039,0.0014038,1.9985962,0.8959961,2,2V21z M20,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2h-2v-6c-0.0018311-1.6561279-1.3438721-2.9981689-3-3h-2c-1.6561279,0.0018311-2.9981689,1.3438721-3,3v6H6c-1.1040039-0.0014038-1.9985962-0.8959961-2-2v-8.7930298C3.9997559,9.6313477,4.2478027,9.0836182,4.6806641,8.7041016l6-5.2666016C11.0455933,3.1174927,11.5146484,2.9414673,12,2.9423828c0.4853516-0.0009155,0.9544067,0.1751099,1.3193359,0.4951172l6,5.2665405C19.7521973,9.0835571,20.0002441,9.6313477,20,10.2069702V19z"/></svg>
                                    <span class="side-menu__label">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <h3>Components</h3>
                            </li>


                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M21.5,21h-19C2.223877,21,2,21.223877,2,21.5S2.223877,22,2.5,22h19c0.276123,0,0.5-0.223877,0.5-0.5S21.776123,21,21.5,21z M4.5,18.0888672h5c0.1326294,0,0.2597656-0.0527344,0.3534546-0.1465454l10-10c0.000061,0,0.0001221-0.000061,0.0001831-0.0001221c0.1951294-0.1952515,0.1950684-0.5117188-0.0001831-0.7068481l-5-5c0-0.000061-0.000061-0.0001221-0.0001221-0.0001221c-0.1951904-0.1951904-0.5117188-0.1951294-0.7068481,0.0001221l-10,10C4.0526733,12.3291016,4,12.4562378,4,12.5888672v5c0,0.0001831,0,0.0003662,0,0.0005493C4.0001831,17.8654175,4.223999,18.0890503,4.5,18.0888672z M14.5,3.2958984l4.2930298,4.2929688l-2.121582,2.121582l-4.2926025-4.293396L14.5,3.2958984z M5,12.7958984l6.671814-6.671814l4.2926025,4.293396l-6.6713867,6.6713867H5V12.7958984z"/></svg>
                                    <span class="side-menu__label">User Module</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li><a href="{{route('role.add')}}" class="slide-item">Add Role</a></li>
                                    <li><a href="{{route('role.manage')}}" class="slide-item">Manage Role</a></li>
                                    <li><a href="{{route('user.add')}}" class="slide-item">Add User</a></li>
                                    <li><a href="{{route('user.manage')}}" class="slide-item">Manage User</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <!--add tour icon with the class side-menu__icon-->
                                    <span class="side-menu__icon"><i class="fa fa-plus-square-o"></i></span>
                                    <span class="side-menu__label">Package Module</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Package Module</a></li>
                                    <li><a href="{{route('package.category.create')}}" class="slide-item">Add Package Category</a></li>
                                    <li><a href="{{route('package.category')}}" class="slide-item">Manage Package Category</a></li>
                                    <li><a href="{{route('package.create')}}" class="slide-item">Add Package</a></li>
                                    <li><a href="{{route('package')}}" class="slide-item">Manage Package</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <!--add tour icon with the class side-menu__icon-->
                                    <span class="side-menu__icon"><i class="fa fa-building-o"></i></span>
                                    <span class="side-menu__label">Hotel Module</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Hotel Module</a></li>
                                    <li><a href="{{route('hotel.create')}}" class="slide-item">Add Hotel</a></li>
                                    <li><a href="{{route('hotel')}}" class="slide-item">Manage Hotel</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <!--add tour icon with the class side-menu__icon-->
                                    <span class="side-menu__icon"><i class="fa fa-question"></i></span>
                                    <span class="side-menu__label">FAQ Module</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">FAQ Module</a></li>
                                    <li><a href="form-elements.html" class="slide-item">Add Faq</a></li>
                                    <li><a href="form-layouts.html" class="slide-item">Manage Faq</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <!--add tour icon with the class side-menu__icon-->
                                    <span class="side-menu__icon"><i class="fa fa-location-arrow"></i></span>
                                    <span class="side-menu__label">Place Module</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Place Module</a></li>
                                    <li><a href="{{route('places.create')}}" class="slide-item">Add Places</a></li>
                                    <li><a href="{{route('places')}}" class="slide-item">Manage Places</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <!--add tour icon with the class side-menu__icon-->
                                    <span class="side-menu__icon"><i class="fa fa-calendar"></i></span>
                                    <span class="side-menu__label">Itineraries Module</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Itineraries Module</a></li>
                                    <li><a href="form-elements.html" class="slide-item">Add Itineraries</a></li>
                                    <li><a href="form-layouts.html" class="slide-item">Manage Itineraries</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <!--add setting icon with the class side-menu__icon-->
                                    <span class="side-menu__icon"><i class="fa fa-gear"></i></span>
                                    <span class="side-menu__label">Setting Module</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Setting Module</a></li>
                                    <!-- <li><a href="form-elements.html" class="slide-item">Manage User</a></li>
                                    <li><a href="form-layouts.html" class="slide-item">Manage Roll</a></li> -->
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @yield('body')

        </div>
    </div>
    <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>



    <script src="{{asset('/')}}assets/admin/plugins/jquery/jquery.min.js"></script>
    <script src="{{asset('/')}}assets/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}assets/admin/plugins/sidemenu/sidemenu.js"></script>
    <script src="{{asset('/')}}assets/admin/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="{{asset('/')}}assets/admin/plugins/p-scroll/pscroll.js"></script>
    <script src="{{asset('/')}}assets/admin/js/sticky.js"></script>
    <script src="{{asset('/')}}assets/admin/plugins/select2/select2.full.min.js"></script>
    <script src="{{asset('/')}}assets/admin/js/custom.js"></script>
    <script src="{{asset('/')}}assets/admin/switcher/js/switcher.js"></script>

    @stack('other-js')

</body>
</html>
