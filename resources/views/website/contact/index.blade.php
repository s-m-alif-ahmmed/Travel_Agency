@extends('website.master')

@section('body')
    <section class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-6">
                    <ul class="nav ">
                        <li><a class="text-dark nav-link px-0 fw-bold" href="{{ route('home') }}">Home</a></li>
                        <li><a class="ps-0 text-dark nav-link" href=""><i class="px-2 fa-solid fa-greater-than"></i> Contacts</a></li>
                    </ul>

                    <div class="card cardspace border-0 card-body">
                        <h4 class="text-primary fw-bold text-uppercase ">Travel Architect</h4>
                        <p class="text-muted">Welcome to Travel Architect, your gateway to personalized adventures! Explore the world with our carefully crafted tour packages designed to cater to every traveler's unique interests and preferences. From cultural immersions to thrilling adventures, our diverse selection allows you to architect your dream getaway. Easily navigate through our user-friendly platform, choose from an array of enticing tour packages, and seamlessly apply for the one that resonates with your wanderlust. Let Travel Architect be your companion in building unforgettable travel experiences tailored just for you. Your journey starts here!</p>

                        <form action="">
                            <div class="">
                                <label class="mb-2 fw-bolder" for="Name">Name :</label>
                                <input class="form-control mb-2" type="text">
                                <label class="mb-2 fw-bolder" for="Name">Email :</label>
                                <input class="form-control mb-2" type="email">
                                <label class="mb-2 fw-bolder" for="Name">Message :</label>
                                <textarea class="form-control mb-2" name="" id="" cols="30" rows="8"></textarea>
                            </div>
                            <div class="">
                                <button class="btn btn-sm btn-warning">Send Now</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!--2nd column section start here-->

                <div class="col-md-6 h-100">
                    <div class=" py-5">
                        <iframe class=" w-100  rounded-corner-10" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d645.4381772346487!2d90.41623118385881!3d23.777683143124854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79c8a03c661%3A0x2a254f17655f9d8b!2sSilkways%20Group!5e0!3m2!1sen!2sbd!4v1690902023802!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                  
                    <p class="text-uppercase">Available at 10am - 9pm</p>
                    <h3 class="fw-bolder mb-5">+ 880 977 0989</h3>

                </div>

                <!--            2nd column section End here-->

            </div>
        </div>
    </section>


@endsection

