@extends('website.master')

@section('body')
<div class="container py-5">
    <div class="row ">
    
        <div class="col-lg-12">
            <section class="packages">
                <div class="card border-0 ">
                    <div class="card-header">
                        <div class="card-title">The Destinations We Offer</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($places as $place)
                            <div class="col-lg-4">
                                 <div class="card border-0">
                                     <a class="nav-link " href="">
                                         {{-- <video autoplay muted class="img-fluid pb-2 h-100" preload="metadata" src="{{asset($place->place_image)}}" alt=""> --}}
                                         <video muted class="img-fluid pb-2 h-100" preload="metadata" src="{{asset($place->place_image)}}" alt="">
                                     </a>
                                 </div>
                                 <div class="card-footer border-0 mt-3">
                                     <h5 class="card1 fw-bold text-center card-title ">{{$place->place_name}}</h5>
                                 </div>
                            </div>
                        @endforeach
                        </div>
                       
                    </div>
                </div>
                <div class="pagination">
                  <div class="text-end d-flex ">
                      {{-- Previous Page Link --}}
                      @if ($places->onFirstPage())
                          <li class="disabled btn btn-warning mb-3 mr-1 me-3" aria-disabled="true" aria-label="@lang('pagination.previous')">
                              <span aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
                          </li>
                      @else
                          <li>
                              <a href="{{ $places->previousPageUrl() }}" rel="prev"  class="btn btn-warning mb-3 mr-1 me-3" aria-label="@lang('pagination.previous')"><i class="fa fa-arrow-left"></i></a>
                          </li>
                      @endif
              
                  
                      {{-- Next Page Link --}}
                      @if ($places->hasMorePages())
                          <li class=" text-decoration-none ">
                              <a class="btn btn-warning mb-3 " href="{{ $places->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <i class="fa fa-arrow-right"></i></a>
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
