<header class="header-one py-2 ">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{route('home')}}">
                            <img src="{{asset('/')}}assets/front/img/whitelogo.png" alt="logo" class="h-100" style="width: 200px;">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav nav-underline mb-2 mb-lg-0">
                                <li class="nav-item"><a href="{{ route('website.package') }}" class="nav-link fs-5 px-2 text-white menuhover"><small>Tour</small></a></li>
                                <li class="nav-item"><a href="{{ route('website.places') }}" class="nav-link fs-5 px-2 text-white menuhover"><small>Places</small></a></li>
                                <li class="nav-item"><a href="{{route('contact')}}" class="nav-link fs-5 px-2 fontfamily text-white menuhover"><small>Contact us</small></a></li>
                                @if(Session::get('customer_id'))
                                    <li class="nav-item dropdown">
                                        <a href="" class="nav-link fs-5 px-2 text-white menuhover dropdown-toggle" data-bs-toggle="dropdown">{{Session::get('customer_name')}}</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{route('customer.dashboard')}}" class="dropdown-item">My Order</a></li>
                                            <li><a href="{{route('customer.logout')}}" class="dropdown-item">Logout</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item"><a href="{{route('customer.login')}}" class="nav-link fs-5 px-2 fontfamily text-white menuhover">Login</a></li>
                                @endif
                                <li class="nav-item"><a href="{{route('website.package')}}" class="btn btn-outline-primary text-white border-3 fw-bolder ms-3 px-4 me-5"><small>BOOK NOW</small></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>



                        <div class="row media-body justify-content-center h-100 pt-5">
                            <div class="card col-lg-6 col-md-6 col-8" style="margin-bottom: -25px;">
                                <div class="container">
                                    <div class="row justify-content-center mx-auto">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="nav">
                                                <p class="nav-link rounded-pill text-center text-black col-6 active fs-lg-5 tour" aria-current="true" >
                                                    Tour Package
                                                </p>
                                                <p class="nav-link rounded-pill text-center text-black col-6 active fs-lg-5 custom-tour" aria-current="true" >
                                                    Custom Tour Package
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-top-0 col-lg-12 col-md-12 col-10 text-center">
                                <div class="card-body tour-body">
                                    <form action="{{ route('website.home.search') }}" method="GET" id="search-form">
                                        @csrf
                                    <div class="row d-flex mt-5 mb-2">
                                        <div class="col-lg-3 col-6 p-2">
                                            <div class="card px-3 p-2">
                                                <label class="form-label" >Place</label>
                                                <select class="form-control select2-show-search" name="place">
                                                    <option value="">Choose One place</option>
                                                    @foreach($places as $place)
                                                        @if($place->status == 1)
                                                            <option name="place" value="{{$place->id}}">{{$place->place_name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6 p-2">
                                            <div class="card px-3 p-2">
                                                <label class="form-label text-start">Journey Date</label>
                                                <input type="date" class="border-0 mb-2 w-100" name="tour_start_date" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6 p-2">
                                            <div class="card px-3 p-2">
                                                <label class="form-label text-start">Return Date</label>
                                                <input type="date" class="border-0 mb-2 w-100" name="tour_end_date"  />
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6 p-2">
                                            <div class="card px-3 p-2">
                                                <label class="form-label text-start">Traveler</label>
                                                <button class="btn btn-secondary text-start btn-sm mb-1 bg-white border-0 text-black" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Person <input type="number" class="w-75" name="person" value="{{$request->input('person')}}" />
                                                </button>
                                                <div class="dropdown-menu w-100">
                                                    <div class="px-3 p-2">
                                                        <label class="form-label text-start">Children</label>
                                                        <input type="number" class="w-100" name="children" value="{{$request->input('children')}}" />
                                                    </div>
                                                    <hr/>
                                                    <div class="px-3 p-2">
                                                        <label class="form-label text-start">Adult</label>
                                                        <input type="number" class="w-100" name="adult" value="{{$request->input('adult')}}"  />
                                                    </div>
                                                    <hr/>
                                                    <div class="text-end me-2">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="dropdown" >Done</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2" style="margin-bottom: -50px;">
                                        <button class="btn btn-primary fs-4 rounded-3" type="submit">Search</button>
                                    </div>
                                    </form>
                                </div>
                                <div class="card-body collapse custom-tour-body">
                                    <h5 class="card-title">Cooming Soon...</h5>
                                </div>

                            </div>
                        </div>

            </div>
        </div>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>

    document.addEventListener('DOMContentLoaded', function () {
        // Find the input fields
        var childrenInput = document.querySelector('input[name="children"]');
        var adultInput = document.querySelector('input[name="adult"]');
        var personInput = document.querySelector('input[name="person"]');

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


    $(document).ready(function () {

        // Add an event listener to the Edit button
        $('.tour').click(function () {
            var tourPackage = $(this).closest('.media-body');

            // Show the edit form and hide the comment text
            tourPackage.find('.tour-body').show();
            tourPackage.find('.custom-tour-body').hide();
        });

        // Add an event listener to the Edit button
        $('.custom-tour').click(function () {
            var tourPackage = $(this).closest('.media-body');

            // Show the edit form and hide the comment text
            tourPackage.find('.tour-body').hide();
            tourPackage.find('.custom-tour-body').show();
        });
    });

</script>
