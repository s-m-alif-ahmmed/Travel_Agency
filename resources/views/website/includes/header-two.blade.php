
<!--    header section start here-->

<header class="py-2">
    <nav>
        <div class="container px-0">
            <div class="row hidden justify-content-center">
                <div class="col-12 navbar nav navbar-expand-xl ">
                    <a href="{{route('home')}}" class="m-0 p-0 nav-link navbar-brand mb-3"><img class="img-fluid mx-0 h-auto" src="{{asset('/')}}assets/front/img/logo.png" alt=""></a>
                    <button class="navbar-toggler btn-primary border-0" data-bs-target="#menu" data-bs-toggle="collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse me-0 menu fw-bolder" id="menu">
                        <ul class="ms-auto  navbar-nav navbar-brand text-uppercase">
                            <li class="nav-item"><a href="{{ route('website.package') }}" class="nav-link fs-10 px-2 fontfamily text-black  menuhover"><small>tour</small></a></li>
                            <li class="nav-item"><a href="{{ route('website.places') }}" class="nav-link fs-10 px-2 fontfamily text-black  menuhover"><small>places</small></a></li>
                            <li class="nav-item"><a href="{{route('contact')}}" class="nav-link fs-10 px-2 fontfamily text-black menuhover"><small>contact</small> us</a></li>
                            @if(Session::get('customer_id'))
                                <li class="nav-item dropdown">
                                    <a href="" class="nav-link fs-10 px-2 fontfamily text-dark menuhover dropdown-toggle" data-bs-toggle="dropdown">{{Session::get('customer_name')}}</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('customer.dashboard')}}" class="dropdown-item">My Order</a></li>
                                        <li><a href="{{route('customer.logout')}}" class="dropdown-item">Logout</a></li>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item"><a href="{{route('customer.login')}}" class="nav-link fs-10 px-2 fontfamily text-dark menuhover">Login</a></li>
                            @endif
                            <li class="nav-item"><a href="{{route('website.package')}}" class="btn btn-warning text-black border fw-bolder border-black ms-3 me-0 buttonhover  menuhover"><small>BOOK NOW</small></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<!--    header section End here-->
