@extends('layouts.app')
@section('title', 'Add a New Place')
@section('body')

    <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="card box-shadow-0">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Place Add Form</h4>
                                
                            </div>
                            <p class="alert-danger">{{$errors->first()}}</p>
                            <div class="card-body">
                                <p class="text-primary">{{session('message') }}</p>
                                <form action="{{route('places.save')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="guest_count" class="form-label mb-3">Place Name</label>
                                            <input type="text" class="form-control border-secondary" placeholder="Enter Place Name" name="place_name" value="{{ old('place_name') }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="card">
                                                <label for="guest_count" class="form-label mb-3">Place Description</label>
                                                <div class="card-body">
                                                    <textarea name="place_description" id="summernote" placeholder="Type Here">{{old("place_description")}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="formFile" class="form-label">Place Video</label>
                                            <input class="form-control file-input " type="file" id="formFile" name="place_image">
                                            <video controls id="blah" width="300px" class="mt-4">
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
            focus: true // set focus to editable area after initializing summernote
        });

        formFile.onchange = evt => {
            const [file] = formFile.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
