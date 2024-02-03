<html>

<head>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        .invoice-booking-table td,
        th {
            padding: 5px;
            font-weight: 500;
            font-size: 13;
        }

        .invoice-booking-table td,
        th {
            padding: 5px;
        }

        .invoice-booking-table td {
            border: 1px solid rgb(230, 229, 229) !important;
            border-collapse: collapse;
        }

        .invoice-booking-table tbody {
            border: 0px !important;
            border-collapse: collapse;
        }

        /* .seal:after {
            content: "Your Text Here";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);

            color: #000;

            font-family: Arial, sans-serif;
            font-size: 16px;
            font-weight: bold;
        }  */

        .seal {
            position: relative;
            width: 200px;
            height: 200px;
            /* background-color: #008080;  */
            border-radius: 50%;
            overflow: hidden;
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

<body style="background-color: #000;;font-size: 12px; font-family: 'Inter', sans-serif;">
    <div style="overflow: auto;">
        <div style="position: relative; width:964px;background-color:white;margin:0 auto; padding:20 100px;">
            <!-- <div
                style="opacity: 0.3;font-size: 19px;font-weight: 700;border: 2px solid rgb(101, 77, 239);color:rgb(117, 77, 239);margin: 20px 0;position: absolute ;bottom:215;border-radius: 100px;left: 190;transform: rotate(-20deg);padding:10px 20px;">
                Paid reservation</div> -->
            <div class="seal d-flex gap-2"
                style="text-align: center;justify-content: center;flex-flow: column;align-items: center;width: 150px;height: 150px; opacity: 0.3;font-size: 14px;font-weight: 700;border: 4px solid rgb(101, 77, 239);color:rgb(117, 77, 239);margin: 20px 0;position: absolute ;bottom:115;border-radius: 100px;left: 100;padding:10px 20px;">
               <span>{{ Hotelsxml ltd - corporate }}</span> <p>accounting</p> </div>
            <!-- <div class="seal d-flex "
                style="text-align: center;justify-content: center;align-items: center;width: 200px;height: 200px; opacity: 0.3;font-size: 19px;font-weight: 700;border: 2px solid rgb(101, 77, 239);color:rgb(117, 77, 239);margin: 20px 0;position: absolute ;bottom:190;border-radius: 100px;left: 165;padding:10px 20px;">
                Hotelsxml ltd - corporate</div> -->




            <div style="display: flex;justify-content: space-between;margin: 40 0 10 0;">
                <div class="secondHeader" style="width: 75%;">

                    <div style="margin: 0px 0 20px;width: 35%;height: fit-content;">
                        <img style="width: 100%;height:fit-content; " src="{{ asset('website/images/hotel-invoice.png') }}" alt="">
                    </div>


                    <div>Hotelsxml ltd - corporate </div>
                    <div>B2b Hotels reservations network</div>
                </div>
                <div style="width: 25%;gap:20px;display: flex;align-content: center;align-items: center;">
                    <div class="secondHeader" style="margin-top: 65px;">To
                    </div>
                    <div class="w-100">
                        <div class="secondHeader "
                            style="font-weight:700;margin-bottom: 35px;font-size: 30px;color:#595959">INVOICE
                        </div>
                        <div class="secondHeader" style="font-weight:600;margin-bottom: 2px;">Paid on: Date
                        </div>

                        <div class="secondHeader" style="font-weight:600;margin-bottom: 2px;">INVOICE #1000ddmmyy</div>
                        <div style="text-align: end;">
                            <div style="margin-top: 20px;">Company Name </div>
                            <div>Street Address</div>
                            <div>City, ST ZIP Code
                            </div>
                            <div>Phone</div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="invoice-booking-table mt-5">
                <table style="width: 100%;">
                    <thead>

                        <th>Booking Id</th>
                        <th>Check-in Date </th>
                        <th>Nights</th>
                        <th>Paid Type</th>
                    </thead>
                    <tbody style="border: 1px solid black;">
                        <tr>
                            <td>Hxm1001
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="invoice-booking-table mt-5 ">
                <table style="width: 100%;">
                    <thead>

                        <th>Guests Name</th>
                        <th>City </th>
                        <th>Hotel name </th>
                        <th>Room Type</th>
                        <th>Room price</th>
                    </thead>
                    <tbody style="border: 1px solid black; text-align: center;">
                        <tr>
                            <td>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>1000 Usd</td>
                        </tr>
                        <tr>
                            <td style="height: 30px;">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="height: 30px;">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td style="border: 0px !important ;" colspan="3">
                            </td>

                            <td style="border: 0px !important ;">Subtotal </td>
                            <td class="text-center " style="font-weight: 600;"> 1000 <br> Usd </td>
                        </tr>
                        <tr>
                            <td style="border: 0px !important ;" colspan="3" </td>

                            <td style="border: 0px !important ;">Discount Amount </td>
                            <td class="text-center"></td>
                        </tr>
                        <tr>
                            <td style="border: 0px !important ;" colspan="3">
                            </td>

                            <td style="border: 0px !important ;">Total </td>
                            <td class="text-center " style="font-weight: 600;"> 1000 <br> Usd </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="mt-5" style="font-size: 12px;">
                <div class="secondHeader mt-5" style="text-align: center;margin: 10 0;">
                    Pay the due value on the date issued on the invoice
                </div>
                <div class="secondHeader" style="text-align: center;margin: 10 0;">
                    Please remit the payment under the conditions of the Agency contract.
                </div>
                <div class="secondHeader" style="text-align: center;margin: 10 0;">
                    <strong>
                        Thank you for your business!
                    </strong>
                </div>
                <div class="secondHeader" style="text-align: center;margin: 40 0;">
                    <span>To inquire about the invoice, please contact: </span>
                    <a href="sales@hotelsxml.com">sales@hotelsxml.com</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
