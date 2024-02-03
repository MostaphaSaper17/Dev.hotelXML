<html dir="ltr">

<head>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        .header {
            font-size: 15px;
            font-weight: 700;
        }

        .secondHeader {
            font-size: 12px;
            font-weight: 500;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1, maximum-scale=2, minimum-scale=1">
        <title>Hotels XML</title>
        <!-- bootstrap css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome css -->
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/fontawesome.min.css" rel="stylesheet">
    <link href="support/linearicon/style.css" rel="stylesheet">
    <link href="support/themify/themify-icons.css" rel="stylesheet">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700|Material+Icons|Poppins:400,600,700"
        rel="stylesheet">
    <!-- custom style css -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/helpers.css" rel="stylesheet">
    <link href="css/search-result.css" rel="stylesheet">
    <link href="css/daterangepicker.css" rel="stylesheet">
    <link href="css/fotorama.css" rel="stylesheet">
</head>

<body style="background-color: #ffffff;;font-size: 12px; font-family: 'Inter', sans-serif;">
    <div style="overflow: auto;">
        <div style="position: relative; width:964px;background-color:white;margin:0 auto; padding:20 100px;">
            <div
                style="opacity: 0.3;font-size: 19px;font-weight: 700;border: 2px solid rgb(101, 77, 239);color:rgb(117, 77, 239);margin: 20px 0;position: absolute ;top:370;border-radius: 50px;right: 160;transform: rotate(-20deg);padding:10px 20px;">
                Paid reservation</div>
            <div class="secondHeader" style="font-size: 14; font-stretch: expanded;text-align: center;margin: 30 0;">
                Reservation Voucher
            </div>
            <div style="display: flex;justify-content: space-between;margin: 40 0 10 0;">
                <div class="secondHeader">
                    <div style="font-weight: 700;">{{ $booking->company_name }}</div>
                    <div>{{ $booking->city }}, {{ $booking->nationality }} </div>
                    <div>{{ $booking->hotel_phone }}</div>
                </div>
                <div style="width: 40%;">
                    <div class="secondHeader" style="font-weight:700;margin-bottom: 2px;">Reservations ID / {{ $booking->booking_reference_id }}
                    </div>

                    <div class="secondHeader">{{ \Carbon\Carbon::parse($booking->created_at)->format('d/m/Y') }}</div>
                </div>
            </div>

            <div style="border: 2px solid rgb(129, 205, 237);margin: 20px 0;">

                <div style=" padding:10px;width: 75%;">
                    <div style="display: flex; justify-items: center;gap:10px">

                        <div>
                            <div>
                                <span class="header" style="font-size: 17px;">{{ $booking->hotel_name }}</span>
                            </div>
                            <div>
                                <span class="secondHeader">{{ $booking->company_name }}</span>
                            </div>
                            <div>
                                <span class="secondHeader">{{ $booking->hotel_phone }}</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div style="display: grid;padding:10px;	grid-template-columns: repeat(3, minmax(0, 1fr));">
                    <div style="padding:8px">
                        <div>
                            <span class="header">Check-in</span>
                            <br>
                            <span style="font-size: 12px;"> <strong>{{ \Carbon\Carbon::parse($checkInDate)->format('d/m/Y') }}</strong> ,from 14:00:00</span>
                        </div>


                    </div>
                    <div style="padding:8px;">
                        <div>
                            <span class="header">Check-out</span>
                            <br>
                            <span style="font-size: 12px;"><strong>{{ \Carbon\Carbon::parse($checkOutDate)->format('d/m/Y') }}</strong> until 11:00:00 Am</span>
                        </div>


                    </div>
                    <div style="padding:8px;">
                        <div>
                            <div style="font-weight: 700;">Nights</div>

                            <div style="font-size: 12px; margin: 4 10;">{{ $nights }}</div>
                        </div>


                    </div>

                </div>
            </div>
            <div class="secondHeader" style="margin: 20px 0;">



                <div style="margin-top: 20px;font-size: 14px;">
                    <div style="display: flex; margin-top: 20px;">
                        <div style="width: 50%; font-weight: 700;">{{ $booking->room_numbers }} Room/s, for {{ $booking->adults_number }} adult/s and {{ $booking->children_number }} child/ren</div>

                        <div style="width: 50%;"><strong>Rooms Types:</strong> {{ $booking->room_types }}</div>

                    </div>

                    <div style="margin-top: 20px;"><strong>Meal Type:</strong> {{ $booking->room_meal }}</div>

                    <div style="margin-top: 20px;"><strong>Guests names:</strong> {{ $booking->guest_names }}
                    </div>


                </div>
            </div>
            <div
                style="display: flex;gap:30px	;align-items: center;  padding: 20px 0;border-top: 2px solid rgb(129, 205, 237);margin: 50px 0;">
                <div style="width: 50%;">
                    <div style="font-size: 14;margin: 10px 0;">
                        <strong>Important notices to guests:</strong>
                    </div>
                    <div style="margin: 10px 0;font-size: 11px;">

                        <div style="margin: 10px 0;">The Hotel may charge additional fees to be paid by the Guest
                            Directly
                            when
                            using additional services, for example, Resort fees, Facilities fees, city tax,
                            and foreigner's accommodation fees, if applicable. </div>

                        <div style="margin: 10px 0;">The agency is not responsible for any issues with the quality of
                            services
                            provided by the hotel. The Client may contact the hotel management
                            directly to claim the existence and quality of the services provided. In case
                            of any issues during check-in or check-out, please contact the agency.</div>
                        <div style="margin: 10px 0;">You must report all complaints you may have to the hotel
                            immediately
                            during your stay, as soon as they arise. We will not be liable for any
                            Compensation for any issue that could have been corrected during
                            the customer's stay had the hotel been aware of it.</div>

                    </div>
                    <div style="font-size: 14;margin: 10px 0;">
                        <strong>Cancellation & Amendment Policy</strong>
                    </div>
                    <div style="font-size: 10px;">
                        <div style="margin: 10px 0;">Modification or cancellation in the booking policy through the
                            guest.
                            a fee or the full amount will be charged in case of non-refund,
                            According to the terms of the contract and the price before booking through
                            the agency. </div>

                        <div style="margin: 10px 0;">Cancellation of reservation or no-show may result in penalties,
                            According to rate and contract terms.
                            Please notify us or the hotel in advance if you expect to check in after 6 pm.
                            The hotel Cancel the reservation and charges the no-show fee in case you
                            don’t Show up by that time.</div>


                    </div>

                </div>
                <div style="width: 50%;">
                    <div style="font-size: 14;margin: 20px 0;width: 100%;">
                        <img style="width: 100%;" src="{{ asset('website/images/map.png') }}" alt="">
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
