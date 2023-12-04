@extends('website.master')

@section('body')
    <section class="mt-5">
        <div class="container py-5 mt-5 pt-5 h-100">

            <!--amazing places to enjoy section start here-->
            <div class="row">
                <div class="card px-5 py-4 footer-gradiant mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 py-5">
                                <h1 class="amaazing fw-bolder text-uppercase text-white ">Amazing places to enjoy your Travel</h1>
                                <p class="text-white ">Picture yourself wandering through ancient cobblestone streets, surrounded by historical architecture that whispers tales of centuries past. Feel the exhilaration of standing atop majestic mountains, breathing in the crisp, invigorating air as you take in panoramic views that stretch beyond imagination.</p>
                                <a href="{{ route('website.places') }}" class="btn btn-lg btn-outline-warning border-3 fw-bold  mt-2 px-4 me-5">Explore More</a>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-content-end">
                                <img width="400px" class="img-fluid" src="{{asset('/')}}assets/front/img/sittingman.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--amazing places to enjoy section End here-->

            <!--beautiful world places section Start here-->
            <div class="row ">

                <div class="col-md-6">
                    <h1 class="amaazing fw-bolder text-uppercase">Beautiful places of the world</h1>
                </div>
                <div class="col-md-6 text-lg-end text-md-end text-sm-center">
                    <a class="btn btn-primary rounded-3 fs-5" href="{{ route('website.places') }}">VIEW ALL</a>
                </div>

            </div>
            <!--beautiful world places section End here-->
        </div>
    </section>

    <section class="" style="margin-left: -20px;">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-12">
                    <img class="img-fluid overflow-auto" src="{{asset('/')}}assets/front/img/dotbox.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <!--country pictures section Start here-->
    <section class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-end">
                    <a class="btn btn-warning mb-3 mr-1" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-warning mb-3 " href="#carouselExampleIndicators3" role="button" data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                <div class="col-12">
                    <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            @php $i = 0; @endphp
                            @foreach ($places->chunk(3) as $chunkPlace)
                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($chunkPlace as $place)
                                    <div class="col-md-4 mb-3">
                                        <div class="card border-0">
                                            <a class="nav-link " href="">
                                                <video autoplay muted class="img-fluid pb-2 h-100" preload="metadata" src="{{asset($place->place_image)}}" alt="">
                                                {{-- <video muted class="img-fluid pb-2 h-100" preload="metadata" src="{{asset($place->place_image)}}" alt=""> --}}
                                            </a>
                                        </div>
                                        <div class="card-footer border-0 mt-3">
                                            <h5 class="card1 fw-bold text-center card-title ">{{$place->place_name}}</h5>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @php $i++; @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container-fluid">
            <div class="row ">
                <div class="dot-img text-end">

                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row ">
                <h1 class="amaazing fw-bolder text-uppercase text-center text-uppercase mb-5">Most popular tours for you</h1>
            </div>
            <div class="row  justify-content-center">

                <div class="text-end">
                    <a class="btn btn-warning mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-warning mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                <div class="col-12">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            @php $i = 0; @endphp
                            @foreach ($tours->chunk(3) as $chunk)
                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                <div class="row">
                                    <div class="card-group">
                                        @foreach ($chunk as $tour)
                                            <div class="col-md-4 mb-3 px-4">
                                                <div class="card border-primary shadow-lg h-100" style="border-radius: 20px;">
                                                    <img class="card-img-top rounded-4" alt="100%x280" src="{{asset($tour->package_image)}}" style="height: 425px;" >
                                                    <div class="card-body">
                                                        <h4 class="card-title fw-bold fs-5 ps-3">{{ $tour->tour_title }}</h4>
                                                        <p class="card-text ps-3">{{ $tour->tour_address }}</p>
                                                    </div>
                                                    <div class="card-footer border-top-0 d-flex justify-content-center align-items-center">
                                                        <div class="container-fluid">
                                                            <div class="row text-center mt-3">
                                                                <div class="col-4">
                                                                    <i class="fa-regular fa-clock"></i>7 days
                                                                </div>
                                                                <div class="col-4">
                                                                    <i class="fa-solid fa-users"></i>0 person
                                                                </div>
                                                                <div class="col-4">
                                                                    <i class="fa-solid fa-dollar-sign"></i>500
                                                                </div>
                                                            </div>
                                                            <div class="row mt-5 mb-3">
                                                                <div class="col-12 text-center">
                                                                    <a href="{{route('package-detail', ['id' => $tour->id])}}" class=""> <button type="button" class="btn btn-primary rounded-3">Book Now</button></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 my-3 text-center">
                                        <a class="btn btn-primary fs-5" href="{{route('website.package')}}">VIEW ALL</a>
                                    </div>
                                </div>
                            </div>
                            @php $i++; @endphp
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="container mt-3">
            <div class="row ">
                <h1 class="amaazing fw-bolder text-uppercase text-center text-uppercase mb-5">See What Our Client Says</h1>
            </div>
            <div class="row justify-content-center">

                <div class="text-end">
                    <a class="btn btn-warning mb-3 mr-1" href="#carouselExampleIndicators5" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-warning mb-3 " href="#carouselExampleIndicators5" role="button" data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                <div class="col-12">
                    <div id="carouselExampleIndicators5" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            @php $i = 0; @endphp
                            @foreach ($reviews->chunk(1) as $chunk)
                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                <div class="row justify-content-center">
                                    @foreach ($chunk as $review)
                                        <div class="col-lg-8 col-md-8 mb-3">
                                            <div class="card border-3 border-primary shadow d-flex justify-content-center align-items-center ">
                                                <div class="card-body">
                                                    <div class="pt-5 ps-3 pe-3 pb-2">
                                                        <i class="fa-solid fa-quote-left"></i>
                                                        <p class="card-text text-center mx-4 fst-italic fw-light ">{{ $review->client_description }}</p>
                                                    </div>
                                                    <div class="text-center">
                                                        <img class="rounded-circle" style="height: 130px; width: 130px;" alt="100%x380" src="{{asset($review->client_image)}}" >
                                                        <h4 class="card-title fw-bold fs-5 pt-3">- {{ $review->client_name }}</h4>
                                                        <p class="text-center py-2">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                @if($review->client_rating >= $i)
                                                                    <i class="fa-solid fa-star text-orange"></i>
                                                                @else
                                                                    <i class="fa-regular fa-star text-orange"></i>
                                                                @endif
                                                            @endfor
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @php $i++; @endphp
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row py-5">
                <div class="col-12 py-5">
                    <div class="col-lg-3 col-md-4 col-sm-6 text-start ps-3">
                        <h2 class=" fw-bolder">
                            OUR LATEST BLOG ABOUT TOUR
                        </h2>
                    </div>
                </div>
                <div class="card-group">

                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 px-3">
                        <div class="card border-0 h-100">
                            <img class="card-img-top rounded-bottom-3 w-100" src="{{asset('/')}}front/img/card4.png"  alt="1080*200" style="height: 200px;">
                            <div class="card-body">
                                <h4 class="fw-bolder">Lorem ipsum dolor sit amet.</h4>
                                <p class="">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi hic nemo tempora. Architecto aspernatur at consequuntur, cum cupiditate debitis ipsam itaque iure odit quasi tenetur.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 px-3">
                        <div class="card border-0 h-100">
                            <img class="card-img-top rounded-bottom-3 w-100" src="{{asset('/')}}front/img/card5.png" alt="1080*200" style="height: 200px;">
                            <div class="card-body">
                                <h4 class="fw-bolder">Lorem ipsum dolor sit amet.</h4>
                                <p class="">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi hic nemo tempora. Architecto aspernatur at consequuntur, cum cupiditate debitis ipsam itaque iure odit quasi tenetur.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 px-3">
                        <div class="card border-0 h-100">
                            <img class="card-img-top rounded-3 w-100" src="{{asset('/')}}front/img/card6.png" alt="1080*200" style="height: 200px;">
                            <div class="card-body">
                                <h4 class="fw-bolder">Lorem ipsum dolor sit amet.</h4>
                                <p class="">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi hic nemo tempora. Architecto aspernatur at consequuntur, cum cupiditate debitis ipsam itaque iure odit quasi tenetur.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 px-3">
                        <div class="card border-0 h-100 ">
                            <img class="card-img-top rounded-bottom-3 w-100" src="{{asset('/')}}front/img/card7.png" alt="1080*200" style="height: 200px;">
                            <div class="card-body">
                                <h4 class="fw-bolder">Lorem ipsum dolor sit amet.</h4>
                                <p class="">
                                    Lorem ipsum dolor sit amet, Architecto aspernatur at consequuntur, cum cupiditate debitis ipsam itaque iure odit quasi tenetur.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 text-center py-3">
                    <a class="btn btn-primary fs-5" href="">MORE</a>
                </div>
            </div>
        </div>
    </section>


@endsection
