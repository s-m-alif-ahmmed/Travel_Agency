@extends('layouts.app')
@section('title', 'Add a New Feedback')
@section('body')

    <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="card box-shadow-0">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Place Add Form</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-primary">{{session('message') }}</p>
                                <form action="{{route('feedback.save')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="guest_count" class="form-label mb-3">Client Name</label>
                                            <input type="text" class="form-control border-secondary" placeholder="Enter Place Name" name="client_name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="guest_count" class="form-label mb-3">Client Designation</label>
                                            <input type="text" class="form-control border-secondary" placeholder="Enter client designation" name="client_designation">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="formFile" class="form-label">Client Image</label>
                                            <input class="form-control file-input" type="file" id="clientFile" name="client_image">
                                            <img id="blah" width="400px"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header border-bottom">
                                                    <h3 class="card-title">Client Description</h3>
                                                </div>
                                                <div class="card-body">
                                                    <textarea class="form-control border-warning" name="client_description" rows="4" placeholder="Type Here"></textarea>
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
        clientFile.onchange = evt => {
            const [file] = clientFile.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
