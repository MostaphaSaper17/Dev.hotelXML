@extends('layouts.agent')
@section('content')
    <div class="clearfix"></div>

    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12"  >
                    <div class="booking-filter">
                        <div class="tabs">
                            <div class="tab1">Hotels</div>
                        </div>
                         <!-- form complex example -->
                            <div class=" row form-row mt-4">
                                <!-- Account section -->
                                <div class="col-sm-6 pb-3">
                                    <label for="name_hotel" style="font-weight: bold"><span><i class="fa-solid fa-location-dot"></i>  </span> Destination / Hotel Name*</label>
                                    <input type="text" class="form-control" id="name_hotel" placeholder="Enter City Destination / Hotel name">
                                </div>

                                <div class="col-sm-5 pb-3">
                                    <div class="d-flex container-chek">
                                        <div class="w-100 col-2">
                                            <label for="exampleCtrl">Check In -Check Out</label>
                                            <!-- Hidden input to store the selected date range -->
                                            <input type="hidden" name="hiddendaterange" id="hiddendaterange">
                                            <input type="text" id="daterange" class="form-control" name="daterange" value="" />
                                        </div>
                                        <!--<div>
                                            <label for="check_out" style="font-weight: bold">Check Out</label>
                                            <input type="date" class="form-control" id="check_out" placeholder="Check Out">
                                        </div>-->
                                    </div>
                                </div>
                                <div class="col-sm-1 pb-3">
                                    <label for="" style="font-weight: bold"><span><i class="fa-regular fa-moon"></i></span> Nights</label>
                                    <input type="text" disabled class="form-control" id="nights" value="1" placeholder="Nights">
                                </div>
                                <div class="col-sm-6 pb-3" style="position: relative;">
                                    <label for="" style="font-weight: bold"><span><i class="fa-solid fa-bed"></i></span> Room & Guests</label>
                                    <div id="output" class="output-room"></div>
                                    <div class="filter-booking">
                                        <div id="rooms-container">
                                            <!-- Room template that will be cloned for each new room -->
                                            <div class="room" id="room-template">
                                                <div class="room-header">
                                                    <span class="room-title">Room 1</span>
                                                    <button class="remove-room"  style="display: none;">Remove</button>
                                                </div>
                                                <div class="guests">
                                                    <div class="adults">
                                                        <label>Adults</label>
                                                        <div class="d-flex">
                                                            <button class="minus">-</button>
                                                            <input type="text" value="2" readonly class="form-control">
                                                            <button class="plus">+</button>
                                                        </div>
                                                    </div>
                                                    <div class="children">
                                                        <label>Children</label>
                                                        <div class="children-ages"></div>
                                                        <button class="add-child">Add a child</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of Room template -->
                                            <button id="add-room">+ Add a room</button>
                                        </div>
                                        <button id="done">Done</button>

                                    </div>


                                </div>
                                <div class="col-sm-3 pb-3">
                                    <label for="nationality" style="font-weight: bold"><span><i class="fa-solid fa-flag-checkered"></i></span> Nationality</label>
                                    <select name="nationality"  id="select">
                                        <option value="" >-Select Your Country-</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->name }}" >{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3 pb-3">
                                    <label for="hotel_name" style="font-weight: bold">Hotel Name <span>(Optional)</span></label>
                                    <input type="text" class="form-control" id="hotel_name" placeholder="Place Hotel Name">
                                </div>
                                <div class="col-sm-12 pb-3">
                                    <a href="{{ route('agent.hotels') }}" class="btn btn-primary"><i class="fas fa-search"></i> Search Hotel</a>
                                </div>
                            </div>
                    </div>
                </div>
                @if(Auth::guard('agent')->user())
                <div class="col-md-12">
                    <section class="account">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card" >
                                    <div class="card-header" style="background-color: white">
                                        <h2 class="card-title" style="color: rgb(14, 14, 142)"><i class="fas fa-user"></i> Account Details</h2>
                                    </div>
                                    <div class="card-body body-en" style="background-color: white">
                                        <div class="card bg-primary text-white" style="box-shadow: 20px">
                                            <div class="card-body">
                                                <i class="fas fa-wallet fa-2x"></i>
                                                <h5 class="card-title">Balance Available</h5>
                                                <h2 class="card-text"><span style="font-size: 80%" >{{ $agent->balance }} {{ $agent->currency }}</span></h2>
                                            </div>
                                        </div>
                                        <div class="card bg-success text-white">
                                            <div class="card-body">
                                                <i class="fas fa-dollar-sign fa-2x"></i>
                                                <h5 class="card-title">Total paid</h5>
                                                <h2 class="card-text"><span style="font-size: 80%" >{{ $total_paid }} {{ $agent->currency }}</span></h2>
                                            </div>
                                        </div>
                                        <div class="card bg-warning text-white">
                                            <div class="card-body">
                                                <i class="fa-regular fa-clock fa-2x"></i>
                                                <h5 class="card-title">Unpaid Orders</h5>
                                                <h2 class="card-text"><span style="font-size: 80%" >{{ $total_unpaid }} {{ $agent->currency }}</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header" style="background-color: white;">
                                        <h2 class="card-title" style="color: rgb(14, 14, 142)"><i class="fa-solid fa-list"></i> Orders</h2>
                                    </div>
                                    <div class="card-body body-en" style="background-color: white">
                                        <a href="{{ route('agent.booking-list') }}">
                                            <div class="card bg-primary text-white">
                                                <div class="card-body" style="background-color: green">
                                                    <i class="fa-solid fa-check fa-2x" style="color: white"></i>
                                                    <h5 class="card-title" style="color: white">Complete Booking</h5>
                                                    <h2 class="card-text" style="color: white">{{ $complete_bookings_number }}</h2>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="{{ route('agent.booking-list') }}">
                                            <div class="card bg-success text-white">
                                                <div class="card-body" style="background-color: red">
                                                    <i class="fa-solid fa-xmark fa-2x" style="color: white"></i>
                                                    <h5 class="card-title" style="color: white">Cancel Booking</h5>
                                                    <h2 class="card-text" style="color: white">{{ $cancelled_bookings_number }}</h2>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="{{ route('agent.booking-list') }}">
                                            <div class="card bg-warning text-white">
                                                <div class="card-body" style="background-color: rgb(207, 137, 6)">
                                                    <i class="fa-regular fa-clock fa-2x" style="color: white"></i>
                                                    <h5 class="card-title" style="color: white"><span style="font-size: 83%; font-weight: bold" >Unpaid Bookings</span></h5>
                                                    <h2 class="card-text" style="color: white">{{ $unpaid_bookings_number }}</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </section>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="clearfix"></div>
    <!-- Start slider offer By En -->
    <section class="offers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-box">

                        <h2 class="title">Offers & News</h2>
                    </div>
                    <!-- Place somewhere in the <body> of your page -->
                    <div id="offers" class="flexslider carousel">
                        <ul class="slides">
                            @foreach ($offers as $offer)
                                <li>
                                    <div class="card" >
                                        <img src="{{'/offers/'.$offer->image}}" class="card-img-top" loading="lazy" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $offer->offer }}</h5>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- End slider By En -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.29.1/moment.min.js"></script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
          var today = new Date();
          var tomorrow = new Date(today);
          tomorrow.setDate(today.getDate() + 1);

          var formattedTomorrow = tomorrow.toISOString().split('T')[0]; // Format as 'YYYY-MM-DD'

          document.getElementById('check_out').value = formattedTomorrow;
        });
    </script> --}}
    <script>
        $(document).ready(function () {
            $('#daterange').on('change', function () {
                var checkInDate = $('#daterange').val();
                var dateStrings = checkInDate.split(' - ');
                var startDate = moment(dateStrings[0], 'DD/MM/YYYY');
                var endDate = moment(dateStrings[1], 'DD/MM/YYYY');
                var daysDifference = endDate.diff(startDate, 'days') +1;
                $('#nights').val(daysDifference);
            });
        });
    </script>
@endsection
