@extends('website.master')

@section('body')

    <section class="package-details">
        <div class="slider pt-2">
            <div class="slide-track">
                @foreach($package->otherImages as $otherImage)
                    <img class="package-details-img mx-2" src="{{asset($otherImage->image)}}" alt=""/>
                @endforeach
            </div>
            <div class="slide-track">
                @foreach($package->otherImages as $otherImage)
                    <img class="package-details-img mx-2" src="{{asset($otherImage->image)}}" alt=""/>
                @endforeach
            </div>
        </div>
    </section>

    <!--swiper section End here-->

    <section class="bg-warning hidden my-5 py-5 bg-opacity-75">
        <div class="container">
            <div class="row justify-content-center hidden">
                <div class="col-md-6">
                    <h2 class="fontfamily mb-3">{{$package->tour_title}}</h2>
                    <p class="fw-bolder"><i class="fa-solid text-primary fa-location-dot"></i> {{$package->tour_address}}</p>
                    <p> <span class="fw-bold">({{ $package->tour_rating }} Stars)</span>
                        @for($i = 1; $i <= 5; $i++)
                            @if($package->tour_rating >= $i)
                                <i class="fa-solid fa-star text-orange"></i>
                            @else
                                <i class="fa-regular fa-star text-orange"></i>
                            @endif
                        @endfor 
                    </p>
                </div>
                <div class="col-md-6 mt-lg-1 mt-3 text-lg-end">
                    <h4 class="mb-0 text-capitalize mb-2">Starting Price is at</h4>
                    @foreach ($lowestPrices as $lowestPrice)
                    @if($package->id == $lowestPrice->package_id)
                        <h2 class="fontfamily ">BDT {{($lowestPrice->min_price)}}</h2>
                    @endif
                  @endforeach
                    
                </div>
            </div>
        </div>
    </section>

    <!--nav pills section Start Here -->

    <section class="border">
        <div class="container border-0">
            <div class="row justify-content-center">
                <div class="col-lg-8 px-0">
                    <div class="card card-body border-0">
                        <ul class="nav py-3 ps-lg-1 ps-0 nav-pills border rounded-corner-10 shadow text-uppercase">
                            <li><a class="nav-link fw-bold py-2 px-2 active ms-2" data-bs-toggle="pill" href="#overview"><small class="fs-7 ">OVERVIEW</small></a></li>
                            <li><a class="nav-link fw-bold py-2 px-2 mt-lg-0 ms-2" data-bs-toggle="pill" href="#includeexclude"><small class="fs-7">Included/Excluded</small></a></li>
                            <li><a class="nav-link fw-bold py-2 px-2 mt-lg-0 ms-2" data-bs-toggle="pill" href="#pickmeeting"><small class="fs-7">Meeting And Pickup</small></a></li>
                            <li><a class="nav-link fw-bold py-2 px-2 mt-lg-0 ms-2" data-bs-toggle="pill" href="#expect"><small class="fs-7">What To Expect</small></a></li>
                            <li><a class="nav-link fw-bold py-2 px-2 mt-lg-0 ms-2" data-bs-toggle="pill" href="#cancelpolicy"><small class="fs-7">Cancellation Policy </small></a></li>
                            <li><a class="nav-link fw-bold py-2 px-2 mt-lg-0 ms-2" data-bs-toggle="pill" href="#faq"><small class="fs-7">FAQ</small></a></li>
                        </ul>

                        <!--Nav-tab Home Section Start here-->
                        <div class="tab-content py-5 ">
                            <div class="tab-pane  fade show active" id="overview">
                                {!! $package->overview !!}
                            </div>
                            <div class="tab-pane fade" id="includeexclude">
                                {!! $package->included_excluded !!}
                            </div>
                            <div class="tab-pane fade show " id="pickmeeting">
                                {!! $package->meeting_pickup !!}
                            </div>
                            <div class="tab-pane fade show" id="expect">
                                {!! $package->expectations !!}
                            </div>
                            <div class="tab-pane fade show" id="cancelpolicy">
                                {!! $package->terms_conditions !!}
                            </div>
                            <div class="tab-pane fade show  " id="faq">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    @php $i = 0; @endphp
                                    @foreach ($faqs as $faq)
                                       
                                        <div class="accordion-item">
                                        <h2 class="accordion-header">
                                          <button class="accordion-button collapsed bg-primary text-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$i}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                            {{ @$faq->question ? $faq->question : "No Data Found"}}
                                          </button>
                                        </h2>
                                        <div id="flush-collapse{{$i}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                          <div class="accordion-body border-2 border-primary ">  {{ @$faq->answer ? $faq->answer : "No Data Found"}}</div>
                                        </div>
                                      </div>

                                      @php $i++; @endphp
                                    @endforeach
                               
                                  
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3 ">
                    <div class="form ">
                        <div class="card border-0 rounde-2 shadow">
                            <div class="card-body m-3">
                                <div class="row mb-2">
                                    <div class="col">
                                        <h5 class="my-4">PACKAGE SUMMARY</h5>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Tour</th>
                                                <td>{{$package->tour_title}}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{$package->tour_address}}</td>
                                            </tr>
                                            <tr>
                                                <th>Place</th>
                                                <td>{{$package->place->place_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Duration</th>
                                                <td>{{Carbon\Carbon::createFromDate($package->tour_start_date)->diffInDays($package->tour_end_date) }} Days</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <hr/>
                                <form action="{{route('book-now', ['id' => $package->id])}}" method="post">
                                    @csrf
                                <div class="row">
                                    <div class="col">
                                        <h5 class="my-4 text-uppercase ">PRICE SUMMARY</h5>
                                        
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>#</th>
                                                <th>Hotel</th>
                                                <th>Person</th>
                                                <th>Price (BDT)</th>
                                            </tr>
                                            @foreach($package->packagePrices as $packagePrice)
                                            <tr>
                                                <td><input type="radio" id="html" name="price_id" value="{{ $packagePrice->id }}"></td>
                                                <td>{{$packagePrice->hotel_type}}</td>
                                                <td>{{$packagePrice->person}}</td>
                                                <td>{{$packagePrice->price}}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <p class="text-danger">{{$errors->first()}}</p>
                                <hr/>
                                <div class="row">
                                    <div class="col py-2">
                                        <div class="my-2">
                                            <button type="submit" class="btn form-control btn-lg btn-primary">Book Now</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4">
        <div class="container">
           
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4>You May Like</h4>
                </div>
                <div class="col-lg-6 text-end">
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
                            @foreach ($packages->chunk(3) as $chunk)
                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($chunk as $tour)
                                        <div class="col-md-4 mb-3">
                                            <div class="card border-0 shadow">
                                                <img class="img-fluid card-img-top " alt="100%x280" src="{{asset($tour->package_image)}}" >
                                                <div class="card-body">
                                                    <h4 class="card-title fw-bold fs-5">{{ $tour->tour_title }}</h4>
                                                    <p class="card-text">{{ $tour->tour_address }}</p>
                                                </div>
                                                <div class="card-footer d-flex justify-content-center align-items-center">
                                                    <a href="{{route('package-detail', ['id' => $tour->id])}}" class=""> <button type="button" class="btn btn-primary rounded-3">Book Now</button></a>
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
@endsection
