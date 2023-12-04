@extends('layouts.app')
@section('title', 'Update The Tour Package')
@section('body')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Package Add Form</h3>
            </div>
            <div class="card-body">
                <p class="text-primary">{{session('message') }}</p>
                <form action="{{route('package.update', ['id' => $package->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="row">
                                <label for="tour_title" class="col-md-3 form-label">Tour Package Title</label>
                                <div class="col-md-9">
                                    <input class="border-warning form-control" id="tourTitle" value="{{$package->tour_title}}" name="tour_title" placeholder="Enter your Tour Title" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <label for="tour_title" class="col-md-3 form-label">Tour Package Address</label>
                                <div class="col-md-9">
                                    <input class="border-warning form-control" id="tourAddress" value="{{$package->tour_address}}" name="tour_address" placeholder="Enter Tour Address" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-3 form-label">Choose Category</label>
                                <div class="col-md-9">
                                    <select class="form-control border-warning select2-show-search form-select" data-placeholder="Choose one" name="package_category_id">
                                        <option label="Choose one" disabled selected></option>
                                        @foreach($package_categories as $item)
                                            <option value="{{$item->id}}" {{ $item->id == $package->package_category_id ? 'selected' : ' '}}>{{$item->package_category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-3 form-label">Choose Category</label>
                                <div class="col-md-9">
                                    <select class="form-control select2-show-search form-select border-warning" data-placeholder="Choose one" name="place_id">

                                        @foreach($places as $item)
                                            <option value="{{$item->id}}" {{ $item->id == $package->place_id ? 'selected' : ' '}}>{{$item->place_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="row">
                                <label for="bootstrapDatePicker1" class="col-md-3 form-label">Start Date</label>
                                <div class="col-md-9">
                                    <input class="form-control border-warning" value="{{$package->tour_start_date}}" name="tour_start_date" id="startDate" placeholder="DD/MM/YY" type="date">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label for="start_data" class="col-md-3 form-label">End Date</label>
                                <div class="col-md-9">
                                    <input class="form-control border-warning" value="{{$package->tour_end_date}}" name="tour_end_date" id="endDate" placeholder="DD/MM/YY" type="date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="row">
                                <label for="tour_title" class="col-md-3 form-label">Tour Package Price</label>
                                <div class="col-md-9">
                                    <input class="border-warning form-control" id="tourPrice" value="{{$package->tour_price}}" name="tour_price" placeholder="Enter Tour Price" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <label for="tour_title" class="col-md-3 form-label">Tour Package Discount</label>
                                <div class="col-md-9">
                                    <input class="border-warning form-control" id="tourDiscount" value="{{$package->tour_discount_price}}" name="tour_discount_price" placeholder="Enter Discount Amount" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="row">
                                <label for="formFile" class="col-md-3 form-label">Package Image</label>
                                <div class="col-md-9">
                                    <input class="border-warning form-control file-input" type="file" id="packageFile" name="package_image">
                                    <div class="col-md-3">
                                        <img src="{{asset($package->package_image)}}" class="" height="80" >
                                    </div>
                                    <img id="blah" width="400px"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <label for="formFile" class="col-md-3 form-label">Package Other Images</label>
                                <div class="col-md-9">
                                    <input class="border-warning form-control file-input" type="file" id="formFile" name="other_image[]" multiple/>
                                </div>
                                <div class="col-md-3">
                                    @foreach($package->otherImages as $otherImage)
                                        <img src="{{asset($otherImage->image)}}" alt="" height="80"/>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="row">
                                <label for="tour_rating" class="col-md-3 form-label">Tour Package Rating</label>
                                <div class="col-md-9">
                                    <input class="border-warning form-control" id="tourRating" value="{{$package->tour_rating}}" name="tour_rating" placeholder="Enter Tour Rating" type="number">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <label for="guest_count" class="col-md-3 form-label">Tour Package Guest</label>
                                <div class="col-md-9">
                                    <input class="border-warning form-control" id="guestCount" value="{{$package->guest_count}}" name="guest_count" placeholder="Guest Amount" type="number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Overview</h3>
                                </div>
                                <div class="card-body">
                                    <textarea name="overview" id="note1" cols="30" rows="4" placeholder="Type Here">{{$package->overview}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Price Description</h3>
                                </div>
                                <div class="card-body">
                                    <textarea name="meeting_pickup" id="note2" cols="30" rows="4" placeholder="Type Here">{{$package->meeting_pickup}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Included and Excluded</h3>
                                </div>
                                <div class="card-body">
                                    <textarea name="included_excluded" id="note3" cols="30" rows="4" placeholder="Type Here">{{$package->included_excluded}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">What to expect</h3>
                                </div>
                                <div class="card-body">
                                    <textarea name="expectations" id="note4" cols="30" rows="4" placeholder="Type Here">{{$package->expectations}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Terms and Conditions</h3>
                                </div>
                                <div class="card-body">
                                    <textarea name="terms_conditions" id="note5" cols="30" rows="4" placeholder="Type Here">{{$package->terms_conditions}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
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
