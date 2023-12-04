@extends('layouts.app')
@section('title', 'Update Place')
@section('body')

    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card box-shadow-0">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Place Update Form</h4>
                </div>
                <p class="alert-danger">{{$errors->first()}}</p>
                <div class="card-body">
                    <p class="text-primary">{{session('message') }}</p>
                    <form action="{{route('places.update', ['id' => $place->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="place_name" class="form-label mb-3">Place Name </label>
                                <input type="text" class="form-control border-secondary" placeholder="Enter Place Name" value="{{$place->place_name}}" name="place_name">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="place_description" class="form-label mb-3">Place Description</label>
                                <div class="card-body">
                                    <textarea name="place_description" id="summernote" placeholder="Type Here">{{$place->place_description}}</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="formFile" class="form-label">Place Image</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row mb-3">
                                            <input class="form-control file-input" type="file" id="formFile" name="place_image">
                                        </div>
                                        <div class="row ms-1 mt-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="">Current Video</label>
                                                </div>
                                                <div class="row">
                                                    <video src="{{asset($place->place_image)}}" controls class="" width="300px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ms-1 mt-3">
                                            <div class="col-6">
                                                <div class="row">
                                                    <label for="">Updated Video</label>
                                                </div>
                                                <div class="row">
                                                    <video controls id="blah" width="300px">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
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
