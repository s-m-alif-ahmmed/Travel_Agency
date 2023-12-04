@extends('website.master')

@section('body')
<div class="container py-5">
    <div class="row ">
        <div class="col-lg-3">
          <section class="search">
            <form action="{{ route('website.package.search') }}" method="GET" id="search-form">
              @csrf
              <div class="card border-0 shadow bg-white ">
                <div class="card-header bg-primary">
                  <h4 class="mt-3 text-white text-capitalize "><span class=""><i class="las la-map-marker-alt"></i></span> Search For A tour</h4>
                  <div class="input-group mt-2 py-2">
                    <input class="form-control border-0 rounded-pill" type="text" name="title" id="example-search-input" placeholder="Search By Tour Name">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary bg-white ms-2 border-0 rounded-pill ms-n3" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                  </div>

                </div>
                <div class="card-body bg-white">
                  <button class="rounded-5 border-2 btn btn-outline-warning text-black px-3 py-1 grow-2" type="submit">Apply</button>
                  <button class="rounded-5 border-2 btn btn-outline-warning text-black px-3 py-1 grow-2">Reset</button>
                  <div class="form-group">
                    <div class="items mt-4 ms-2">
                      <h5 class="fs-6 ">Duration (In Days)</h5>
                      <input type="range" class="form-range-control w-75 " min="0" max="30" value="30" name="duration" onmousemove="inputRange1.value=value">
                      <output class="border rounded-5 range-group-text p-2 ms-4" id="inputRange1"></output>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="items mt-4 ms-2">
                      <h5 class="fs-6 ">Price (In BDT)</h5>
                      <input type="range" class="form-range-control w-50" min="0" max="100000" value="100000" name="lowestPrice" onmousemove="inputRange2.value=value">
                      <output class="border rounded-5 range-group-text p-2 ms-4" id="inputRange2"></output>
                    </div>
                  </div>
                  <hr/>
                  <div class="single-checkbox items">
                    <h5 class="fs-6 ">Review Score</h5>

                    <label for="one_star mb-4" class="">
                        <input type="checkbox" name="ratings[]" value="1" id="one_star"/>
                        <i class="bi bi-star-fill text-warning"></i>
                    </label>
                    <label for="two_star mb-4">
                        <input type="checkbox" name="ratings[]" value="2" id="two_star"/>
                        <i class="bi bi-star-fill text-warning "></i><i class="bi bi-star-fill text-warning "></i>
                    </label>
                    <label for="two_star mb-4">
                        <input type="checkbox" name="ratings[]" value="3" id="two_star" />
                        <i class="bi bi-star-fill text-warning "></i><i class="bi bi-star-fill text-warning "></i><i class="bi bi-star-fill text-warning "></i>
                    </label>
                    <label for="two_star mb-4">
                        <input type="checkbox" name="ratings[]" value="4" id="two_star" />
                        <i class="bi bi-star-fill text-warning "></i><i class="bi bi-star-fill text-warning "></i><i class="bi bi-star-fill text-warning "></i><i class="bi bi-star-fill text-warning "></i>
                    </label>
                    <label for="two_star mb-4">
                        <input type="checkbox" name="ratings[]" value="5" id="two_star" />
                        <i class="bi bi-star-fill text-warning "></i><i class="bi bi-star-fill text-warning "></i><i class="bi bi-star-fill text-warning "></i><i class="bi bi-star-fill text-warning "></i><i class="bi bi-star-fill text-warning "></i>
                    </label>

                  </div>
                  <div class="single-checkbox items">
                    <h5 class="fs-6 mt-3">Tour Type</h5>
                    @foreach ($tourTypes as $type)
                    <label for="one_star mb-4" class="">
                      <input type="checkbox" name="tour_types[]" value="{{ $type->id }}" id="{{ $type->package_category_name }}"/>
                        <span>{{ $type->package_category_name }}</span>
                      </label>
                    @endforeach

                  </div>
                </div>

              </div>
            </form>
          </section>
        </div>

        <div class="col-lg-9">
            <section class="packages">
                <div class="card border-0 ">
                    <div class="card-header">
                        <div class="card-title "></div>
                    </div>
                    <div class="card-body">
{{--                        @foreach($tours as $search)--}}
                        @foreach ($tours as $tour)
                        <a href="{{route('package-detail', ['id' => $tour->id] )}}" class="text-decoration-none">
                          <div class="card mb-3 p-3 border-0 shadow grow-2">
                            <div class="row g-0">
                              <div class="col-lg-5">
                                <img src="{{ asset($tour->package_image) }}" class="h-100 img-fluid card-img-top rounded-4 shadow grow-1">
                              </div>
                              <div class="col-lg-7">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $tour->tour_title }}</h5>
                                  <p class="card-text">{{ Carbon\Carbon::createFromDate($tour->tour_start_date)->diffInDays($tour->tour_end_date) }} Days</p>
                                  @for($i = 1; $i <= 5; $i++)
                                  @if($tour->tour_rating >= $i)
                                      <i class="fa-solid fa-star text-orange"></i>
                                  @else
                                      <i class="fa-regular fa-star text-orange"></i>
                                  @endif
                                 @endfor
                                  <p class="card-text"><span><i class="las la-map-marker"></i></span>{{ $tour->tour_address }}</p>

                                    <p>
                                      <span class="mb-2"><i class="las la-concierge-bell ms-2 me-1  grow-2"></i><strong class="ms-1">Hotel</strong></span>
                                      <span class="mb-2"><i class="las la-camera-retro ms-2 me-1  grow-2"></i></i><strong class="ms-1">Sightseeing</strong></span>
                                      <span class="mb-2"><i class="las la-bus ms-2 me-1  grow-2"></i><strong class="ms-1">Transfer</strong></span>
                                      <span class="mb-2"><i class="las la-utensils ms-2 me-1  grow-2"></i><strong class="ms-1">Meals</strong></span>
                                      <span class="mb-2"><i class="las la-plane-departure ms-2 me-1  grow-2"></i><strong class="ms-1">Flight</strong></span>
                                    </p>

                                    <p>Starting At Just</p>
                                    <div class="row">
                                      <div class="col-8">
                                        @foreach ($lowestPrices as $lowestPrice)
                                          @if($tour->id == $lowestPrice->package_id)
                                            BDT {{($lowestPrice->min_price)}}
                                          @endif
                                        @endforeach
                                      </div>
                                      <div class="col-4">
                                      <button type="button" class="btn btn-md btn-outline-warning text-black fw-bold border-3 grow-3 rounded-3">Book Now</button>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        </a>
                        @endforeach
{{--                        @endforeach--}}

                    </div>
                </div>
                <div class="pagination">
                  <div class="text-end d-flex ">
                      {{-- Previous Page Link --}}
                      @if ($tours->onFirstPage())
                          <li class="disabled btn btn-warning mb-3 mr-1 me-3" aria-disabled="true" aria-label="@lang('pagination.previous')">
                              <span aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
                          </li>
                      @else
                          <li>
                              <a href="{{ $tours->previousPageUrl() }}" rel="prev"  class="btn btn-warning mb-3 mr-1 me-3" aria-label="@lang('pagination.previous')"><i class="fa fa-arrow-left"></i></a>
                          </li>
                      @endif


                      {{-- Next Page Link --}}
                      @if ($tours->hasMorePages())
                          <li class=" text-decoration-none ">
                              <a class="btn btn-warning mb-3 " href="{{ $tours->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <i class="fa fa-arrow-right"></i></a>
                          </li>
                      @else
                          <li class="disabled btn btn-warning mb-3 " aria-disabled="true" aria-label="@lang('pagination.next')">
                              <span aria-hidden="true"> <i class="fa fa-arrow-right"></i></span>
                          </li>
                      @endif
                </div>
              </div>

            </section>
        </div>
    </div>
</div>
@endsection

@push('extra_script')

@endpush
