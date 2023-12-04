@extends('layouts.app')
@section('title', 'Update Hotel')
@section('body')

                <div class="row row-sm mt-5">
                    <div class="col-lg-12 mt-5">
                        <div class="card box-shadow-0 mt-5">
                            <div class="card-header border-bottom mt-5">
                                <h4 class="card-title">Package Add Form</h4>
                            </div>
                            <p class="alert-danger">{{$errors->first()}}</p>
                            <div class="card-body">
                                <p class="text-primary">{{session('message') }}</p>
                                <form action="{{route('hotel.update', ['id' => $hotel->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="form-label mb-3">Select Place</label>
                                            <select class="form-control select2-show-search form-select border-warning" data-placeholder="Choose one" name="place_name">
                                                <option label="Choose one" disabled selected></option>
                                                @foreach($places as $place)
                                                    <option {{$hotel->place_name == $place->place_name ? 'selected' : ''}} value="{{$place->place_name}}">{{$place->place_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="hotel_name" class="form-label mb-3">Hotel Name</label>
                                            <input type="text" class="form-control border-warning" id="exampleInputEmail2" placeholder="Enter Hotel Name" name="hotel_name" value="{{$hotel->hotel_name}}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="hotel_type" class="form-label mb-3">Hotel Type</label>
                                            <input type="text" class="form-control border-warning" id="exampleInputEmail2" placeholder="Enter Type" name="hotel_type" value="{{$hotel->hotel_type}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="hotel_location" class="form-label mb-3">Hotel Location</label>
                                            <input type="text" class="form-control border-warning"  placeholder="Enter Location" name="hotel_location" value="{{$hotel->hotel_location}}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="hotel_location" class="form-label mb-3">Hotel Rating</label>
                                            <input type="number" step="0.1" class="form-control border-warning" placeholder="Enter Rating (For Now)" name="hotel_rating" value="{{$hotel->hotel_rating}}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="formFile" class="form-label mb-3">Package Image</label>
                                            <input class="form-control file-input" type="file" id="formFile" name="hotel_image">
                                        </div>
                                        <div class="col-md-2">
                                            <img src="{{asset($hotel->hotel_image)}}" class="" height="80" width="60">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="hotel_description" class="form-label mb-3">Place Description</label>
                                            <div class="card-body">
                                                <textarea name="hotel_description" id="summernote" placeholder="Type Here">{{$hotel->hotel_description}}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

@endsection


@push('other-js')

    <script>
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 120,
        });
        formFile.onchange = evt => {
            const [file] = formFile.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush