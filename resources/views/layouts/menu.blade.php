<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{route('dashboard')}}">
                <img src="{{asset('/')}}assets/admin/images/brand/logo-3.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{asset('/')}}assets/admin/images/brand/logo-3.png" class="header-brand-img toggle-logo" alt="logo">
                <img src="{{asset('/')}}assets/admin/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
                <img src="{{asset('/')}}assets/admin/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="logo">
            </a><!-- LOGO -->
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
                        <!--add tour icon with the class side-menu__icon-->
                        <span class="side-menu__icon"><i class="fa fa-plus-square-o"></i></span>
                        <span class="side-menu__label">Package Module</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Package Module</a></li>
                        <li><a href="{{route('package.category.create')}}" class="slide-item">Add Package Category</a></li>
                        <li><a href="{{route('tour.facility.create')}}" class="slide-item">Add Tour Facility</a></li>
                        <li><a href="{{route('package.create')}}" class="slide-item">Add Package</a></li>
                        <li><a href="{{route('package')}}" class="slide-item">Manage Package</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <!--add tour icon with the class side-menu__icon-->
                        <span class="side-menu__icon"><i class="fa fa-plus-square-o"></i></span>
                        <span class="side-menu__label">Order Module</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Order Module</a></li>
                        <li><a href="{{route('order')}}" class="slide-item">View Orders</a></li>

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
                        <li><a href="{{route('hotel.category.create')}}" class="slide-item">Manage Hotel Category</a></li>
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
                        <li><a href="{{route('faq.create')}}" class="slide-item">Add Faq</a></li>
                        <li><a href="{{route('faq')}}" class="slide-item">Manage Faq</a></li>
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
                        <span class="side-menu__icon"><i class="fa fa-user"></i></span>
                        <span class="side-menu__label">Client Module</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Client Module</a></li>
                        <li><a href="{{route('client.create')}}" class="slide-item">Add Client Review</a></li>
                        <li><a href="{{route('client')}}" class="slide-item">Manage Client Review</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
</div>
