@extends('layouts.app')
@section('title', 'Edit Package')
@section('body')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Tour Package Details</h3>
                <a href="{{ route('package.edit',['id'=>$package->id]) }}" class="ms-5 btn btn-primary btn-sm"><span class=""><i class="fa fa-edit"></i></span></a>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <label for="tour_title" class="col-md-3 fw-bold">Title : </label>
                    <div class="col-md-9">
                        <p class="">{{$package->tour_title}}</p>
                    </div>
                    <label for="Address" class="col-md-3 fw-bold">Address : </label>
                    <div class="col-md-9">
                        <p class="">{{$package->tour_address}}</p>
                    </div>
                    <label for="Category" class="col-md-3 fw-bold">Category : </label>
                    <div class="col-md-9">
                        @foreach($package_categories as $item)
                            @if($package->package_category_id == $item->id)
                                <p class=""> {{$item->package_category_name}} </p>
                            @endif
                        @endforeach
                    </div>

                    <label for="Place" class="col-md-3 fw-bold">Place : </label>
                    <div class="col-md-9">
                        @foreach($places as $item)
                            @if($package->place_id == $item->id)
                                <p class=""> {{$item->place_name}} </p>
                            @endif
                        @endforeach
                    </div>
                    <label for="Place" class="col-md-3 fw-bold">Starting Date : </label>
                    <div class="col-md-9">
                        <p class=""> {{$package->tour_start_date}} </p>
                    </div>
                    <label for="Place" class="col-md-3 fw-bold">Ending Date : </label>
                    <div class="col-md-9">
                        <p class=""> {{$package->tour_end_date}} </p>
                    </div>
                    <label for="Place" class="col-md-3 fw-bold">Image : </label>
                    <div class="col-md-9">
                        <img id="blah" src="{{asset($package->package_image)}}" width="100  "/>
                    </div>
                    <label for="Place" class="col-md-3 fw-bold">Image Gallery : </label>
                    <div class="col-md-9 mb-5">
                        @foreach($package->otherImages as $otherImage)
                            <img src="{{asset($otherImage->image)}}" width="120" height="100"/>
                        @endforeach
                    </div>
                    @foreach($package->packagePrices as $index => $packagePrice)
                        <label for="Price" class="col-md-3 fw-bold">Price when there is {{$packagePrice->person}} person:</label>
                        <div class="col-md-9">
                            <p class=""> {{$packagePrice->price}} BDT For a {{ $packagePrice->hotel_type }} Hotel</p>
                        </div>
                    @endforeach
                    <label for="Price" class="col-md-3 fw-bold">Overview :</label>
                    <div class="col-md-9">
                        <p class=""> @php echo $package->overview; @endphp </p>
                    </div>
                    <label for="Price" class="col-md-3 fw-bold">Price Description :</label>
                    <div class="col-md-9">
                        <p class=""> @php echo $package->meeting_pickup; @endphp </p>
                    </div>
                    <label for="Price" class="col-md-3 fw-bold">Expectations :</label>
                    <div class="col-md-9">
                        <p class=""> @php echo $package->expectations; @endphp </p>
                    </div>
                    <label for="Price" class="col-md-3 fw-bold">Include/Exclude Information :</label>
                    <div class="col-md-9">
                        <p class=""> @php echo $package->included_excluded; @endphp </p>
                    </div>
                    <label for="Price" class="col-md-3 fw-bold">Policies :</label>
                    <div class="col-md-9">
                        <p class=""> @php echo $package->terms_conditions; @endphp </p>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('other-scripts')
    <!-- Date picker -->
    <script src="{{asset('/')}}assets/js/bootstrap-datepicker.js"></script>
    <script src="{{asset('/')}}assets/js/date-picker.js"></script>
    <script src="{{asset('/')}}assets/js/datepicker.js"></script>
    <script src="{{asset('/')}}assets/js/jquery-ui.js"></script>
@endpush
@push('other-js')
    <script>
        $(document).ready(function() {
            $('#note1').summernote({
                height: 200
            });
            $('#note2').summernote({
                height: 150
            });
            $('#note3').summernote({
                height: 150
            });
            $('#note4').summernote({
                height: 150
            });
            $('#note5').summernote({
                height: 150
            });

        });

        packageFile.onchange = evt => {
            const [file] = packageFile.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
<p class="text-primary">{{session('message') }}</p>
