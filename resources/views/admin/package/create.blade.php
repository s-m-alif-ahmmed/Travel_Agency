@extends('layouts.app')
@section('title', 'Add New Role')
@section('body')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">Package Add Form <span class="alert-danger">{{$errors->first()}}</span></h3>

            </div>
            <div class="card-body">

                <p class="text-primary">{{session('message') }}</p>
                <form action="{{route('package.save')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row mb-4">
                        <label for="tour_title" class="col-md-3 form-label">Tour Package Title</label>
                        <div class="col-md-9">
                            <input class="border-warning form-control" id="tourTitle" name="tour_title" placeholder="Enter your Tour Title" type="text">

                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="tour_title" class="col-md-3 form-label">Tour Package Rating</label>
                        <div class="col-md-9">
                            <input class="border-warning form-control" id="tourRating" name="tour_rating" placeholder="Enter your Tour Rating" type="text">

                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="tour_title" class="col-md-3 form-label">Tour Package Address</label>
                        <div class="col-md-9">
                            <textarea class="border-warning form-control" id="tourAddress" name="tour_address" placeholder="Enter Tour Address"></textarea>

                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">Choose Category</label>
                        <div class="col-md-9">
                            <select class="form-control border-warning select2-show-search form-select" data-placeholder="Choose one" name="package_category_id">
                                <option value="" selected disabled>Choose Category</option>
                                @foreach($package_categories as $item)
                                    <option value="{{$item->id}}">{{$item->package_category_name}}</option>
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
                                    <option value="{{$item->id}}">{{$item->place_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for="bootstrapDatePicker1" class="col-md-3 form-label">Start Date</label>
                        <div class="col-md-9">
                            <input class="form-control border-warning" name="tour_start_date" id="startDate" placeholder="DD/MM/YY" type="date">
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for="start_data" class="col-md-3 form-label">End Date</label>
                        <div class="col-md-9">
                            <input class="form-control border-warning" name="tour_end_date" id="endDate" placeholder="DD/MM/YY" type="date">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="formFile" class="col-md-3 form-label">Package Image</label>
                        <div class="col-md-9">
                            <input class="border-warning form-control file-input" type="file" id="packageFile" name="package_image">
                            <img id="blah" width="400px"/>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="formFile" class="col-md-3 form-label">Package Other Images</label>
                        <div class="col-md-9">
                            <input class="border-warning form-control file-input" type="file" id="formFile" name="other_image[]" multiple/>
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
                                <th>Hotel</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="addPriceBody">
                            <tr>
{{--                                @php--}}
{{--                                    $person = ($request->input('children') + $request->input('adult'));--}}
{{--                                @endphp--}}
                                <td><input type="number" class="form-control" name="price[0][person]" /></td>
                                <td><input type="number" class="form-control" name="price[0][children]" value="{{$request->input('children')}}" /></td>
                                <td><input type="number" class="form-control" name="price[0][adult]" value="{{$request->input('adult')}}" /></td>
                                <td>
                                    <select class="form-control select2-show-search form-select" data-placeholder="Choose one" name="price[0][hotel_type]">
                                        <option label="Choose one" disabled selected></option>
                                        @foreach($hotel_categories as $category)
                                        <option value="{{$category->hotel_category_name}}">{{$category->hotel_category_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" class="form-control" name="price[0][price]"/></td>
                                <td><button type="button" class="btn btn-primary" id="addBtn" ><i class="fa fa-plus p-2"></i></button></td>
                            </tr>
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
                                    <textarea name="overview" id="note1" cols="30" rows="4" placeholder="Type Here"></textarea>
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
                                    <textarea name="meeting_pickup" id="note2" cols="30" rows="4" placeholder="Type Here"></textarea>
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
                                    <textarea name="included_excluded" id="note3" cols="30" rows="4" placeholder="Type Here"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">What to Expect</h3>
                                </div>
                                <div class="card-body">
                                    <textarea name="expectations" id="note4" cols="30" rows="4" placeholder="Type Here"></textarea>
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
                                    <textarea name="terms_conditions" id="note5" cols="30" rows="4" placeholder="Type Here"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Create New Package</button>
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
            // Find the input fields
            var childrenInput = document.querySelector('input[name="price[0][children]"]');
            var adultInput = document.querySelector('input[name="price[0][adult]"]');
            var personInput = document.querySelector('input[name="price[0][person]"]');

            // Add event listeners to the children and adult inputs
            childrenInput.addEventListener('input', updatePerson);
            adultInput.addEventListener('input', updatePerson);

            // Function to update the person input based on children and adult values
            function updatePerson() {
                // Parse values as integers, default to 0 if parsing fails
                var childrenValue = parseInt(childrenInput.value) || 0;
                var adultValue = parseInt(adultInput.value) || 0;

                // Calculate the total and update the person input
                var totalPersons = childrenValue + adultValue;
                personInput.value = totalPersons;
            }

            // Initial calculation when the page loads
            updatePerson();
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
        $(document).on('click', '#addBtn', function () {
            var tr = '';
            tr += '<tr>';
                tr += '<td><input type="number" class="form-control" name="price['+index+'][person]"/></td>';
                tr += '<td><input type="number" class="form-control" name="price['+index+'][children]"/></td>';
                tr += '<td><input type="number" class="form-control" name="price['+index+'][adult]"/></td>';
                tr += "<td> <select class='form-control select2-show-search form-select border-secondary' data-placeholder='Choose one' name=price["+index+"][hotel_type]'> <option label='Choose one' disabled selected></option> @foreach($hotel_categories as $category)<option value='{{$category->hotel_category_name}}'>{{$category->hotel_category_name}}</option>@endforeach</select></td>";
                tr += '<td><input type="number" class="form-control" name="price['+index+'][price]"/></td>';

                tr += '<td><button type="button" class="btn btn-danger remove-btn"><i class="fa fa-minus p-2"></i></button></td>';
            tr += '</tr>';
            $('#addPriceBody').append(tr);
            index++;
        })
        $(document).on('click', '.remove-btn', function () {
            $(this).closest('tr').remove();
        })
    </script>
@endpush


<p class="text-primary">{{session('message') }}</p>
