@extends('layouts.app')
@section('title', 'Edit Package')
@section('body')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Package Edit Form <span class="alert-danger">{{$errors->first()}}</span></h3>
            </div>
            <div class="card-body">
                <p class="text-primary">{{session('message')}}</p>
                <form action="{{route('package.update',['id' => $package->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row mb-4">
                        <label for="tourTitle" class="col-md-3 form-label">Tour Package Title</label>
                        <div class="col-md-9">
                            <input class="border-warning form-control" value="{{$package->tour_title}}" id="tourTitle" name="tour_title" placeholder="Enter your Tour Title" type="text">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="tourRating" class="col-md-3 form-label">Tour Package Rating</label>
                        <div class="col-md-9">
                            <input class="border-warning form-control" value="{{$package->tour_rating}}" id="tourRating" name="tour_rating" placeholder="Enter your Tour Rating" type="text">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="tour_title" class="col-md-3 form-label">Tour Package Address</label>
                        <div class="col-md-9">
                            <textarea class="border-warning form-control" id="tourAddress" name="tour_address" placeholder="Enter Tour Address">{{$package->tour_address}}</textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-md-3 form-label">Choose Category</label>
                        <div class="col-md-9">
                            <select class="form-control border-warning select2-show-search form-select" data-placeholder="Choose one" name="package_category_id">
                                <option value="" selected disabled>Choose Category</option>
                                @foreach($package_categories as $item)
                                    <option value="{{$item->id}}" {{$package->package_category_id == $item->id ? 'selected' : ''}}>{{$item->package_category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">Choose Place</label>
                        <div class="col-md-9">
                            <select class="form-control select2-show-search form-select border-warning" data-placeholder="Choose one" name="place_id">
                                <option value="" selected disabled>Choose Place</option>
                                @foreach($places as $item)
                                    <option value="{{$item->id}}" {{$package->place_id == $item->id ? 'selected' : ''}}>{{$item->place_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="bootstrapDatePicker1" class="col-md-3 form-label">Start Date</label>
                        <div class="col-md-9">
                            <input class="form-control border-warning" value="{{$package->tour_start_date}}" name="tour_start_date" id="startDate" placeholder="DD/MM/YY" type="date">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="start_data" class="col-md-3 form-label">End Date</label>
                        <div class="col-md-9">
                            <input class="form-control border-warning" value="{{$package->tour_end_date}}" name="tour_end_date" id="endDate" placeholder="DD/MM/YY" type="date">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="row">
                                <label for="formFile" class="col-md-3 form-label">Package Image</label>
                                <div class="col-md-9">
                                    <input class="border-warning form-control file-input" type="file" id="packageFile" name="package_image"/>
                                    <img class="my-4" id="blah" src="{{asset($package->package_image)}}" width="100  "/>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <label for="formFile" class="col-md-3 form-label">Package Other Images</label>
                                <div class="col-md-9">
                                    <input class="border-warning form-control file-input" type="file" id="formFile" name="other_image[]" multiple/>
                                    @foreach($package->otherImages as $otherImage)
                                        <img class="my-4" src="{{asset($otherImage->image)}}" width="120" height="100"/>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">

                            <label class="col-md-3 form-label">Package Price</label>
                            <table class="table table-bordered col-md-9">
                                <thead>
                                <tr>
                                    <th>Person</th>
                                    <th>Children</th>
                                    <th>Adult</th>
                                    <th>Hotel Type</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $categories = $hotel_categories; @endphp
                                @foreach($package->packagePrices as $index => $packagePrice)

                                <tr>

                                    <td><input type="number" class="form-control" value="{{$packagePrice->person}}" name="price[{{$index}}][person]"/></td>
                                    <td><input type="number" class="form-control" value="{{$packagePrice->children}}" name="price[{{$index}}][children]"/></td>
                                    <td><input type="number" class="form-control" value="{{$packagePrice->adult}}" name="price[{{$index}}][adult]"/></td>


                                    <td>

                                        <select class="form-control select2-show-search form-select" data-placeholder="Choose one" name="price[{{$index}}][hotel_type]">

                                            @foreach($categories as $category)
                                                <option {{$packagePrice->hotel_type == $category->hotel_category_name ? 'selected' : ''}} value="{{$category->hotel_category_name}}">{{$category->hotel_category_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control" value="{{$packagePrice->price}}" name="price[{{$index}}][price]"/></td>
                                    <td>
                                        @if($index == 0)
                                            <button type="button" class="btn btn-primary" id="addBtn" ><i class="fa fa-plus p-2"></i></button>
                                        @else
                                            <button type="button" class="btn btn-danger remove-btn"><i class="fa fa-minus p-2"></i></button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

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
                                    <h3 class="card-title">Meeting Pickup</h3>
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
                                <button type="submit" class="btn btn-primary mt-3">Update Package Info</button>
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

        document.addEventListener('DOMContentLoaded', function () {
            // Find all the rows in the table
            var rows = document.querySelectorAll('tbody tr');

            // Add event listeners to each row
            rows.forEach(function (row, index) {
                // Find the input fields in the current row
                var childrenInput = row.querySelector('input[name="price[' + index + '][children]"]');
                var adultInput = row.querySelector('input[name="price[' + index + '][adult]"]');
                var personInput = row.querySelector('input[name="price[' + index + '][person]"]');

                // Add event listeners to the children and adult inputs in the current row
                childrenInput.addEventListener('input', updatePerson);
                adultInput.addEventListener('input', updatePerson);

                // Function to update the person input based on children and adult values in the current row
                function updatePerson() {
                    // Parse values as integers, default to 0 if parsing fails
                    var childrenValue = parseInt(childrenInput.value) || 0;
                    var adultValue = parseInt(adultInput.value) || 0;

                    // Calculate the total and update the person input in the current row
                    var totalPersons = childrenValue + adultValue;
                    personInput.value = totalPersons;
                }

                // Initial calculation when the page loads
                updatePerson();
            });

            // Add event listener for dynamically added rows (when "Add" button is clicked)
            document.getElementById('addBtn').addEventListener('click', function () {
                // Code to add a new row dynamically goes here

                // After adding a new row, you may want to update the event listeners for all rows again
                updateEventListeners();
            });

            // Function to update event listeners for all rows
            function updateEventListeners() {
                // Find all the rows again
                rows = document.querySelectorAll('tbody tr');

                // Remove existing event listeners
                rows.forEach(function (row, index) {
                    var childrenInput = row.querySelector('input[name="price[' + index + '][children]"]');
                    var adultInput = row.querySelector('input[name="price[' + index + '][adult]"]');

                    childrenInput.removeEventListener('input', updatePerson);
                    adultInput.removeEventListener('input', updatePerson);
                });

                // Add event listeners again for all rows
                rows.forEach(function (row, index) {
                    var childrenInput = row.querySelector('input[name="price[' + index + '][children]"]');
                    var adultInput = row.querySelector('input[name="price[' + index + '][adult]"]');
                    var personInput = row.querySelector('input[name="price[' + index + '][person]"]');

                    childrenInput.addEventListener('input', updatePerson);
                    adultInput.addEventListener('input', updatePerson);

                    // Function to update the person input based on children and adult values in the current row
                    function updatePerson() {
                        // Parse values as integers, default to 0 if parsing fails
                        var childrenValue = parseInt(childrenInput.value) || 0;
                        var adultValue = parseInt(adultInput.value) || 0;

                        // Calculate the total and update the person input in the current row
                        var totalPersons = childrenValue + adultValue;
                        personInput.value = totalPersons;
                    }

                    // Initial calculation when the page loads
                    updatePerson();
                });
            }
        });

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

    <script>
        var index = 100;
        $(document).on('click', '.remove-btn', function () {
            $(this).closest('tr').remove();
        })
    </script>

@endpush
<p class="text-primary">{{session('message') }}</p>
