<!-- resources/views/report.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Bookings Report</title>
    <!-- Include Google Fonts for the "Roboto" font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #ffffff;
            text-align: center;
            padding: 20px;
            font-family: 'Roboto', sans-serif; /* Use Roboto font */
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #dddddd;
            text-align: center;
        }

        th, td {
            padding: 10px;
        }

        th {
            background-color: #f2f2f2;
            width: 10%; /* Adjust the width as needed */
        }

        td {
            width: 22%; /* Adjust the width as needed */
        }

        .buttons-row {
            display: flex;
            justify-content: center;
        }

        .action-button {
            margin: 10px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .print-button {
            background-color: #4CAF50;
            color: white;
        }

        .excel-button {
            background-color: #2196F3;
            color: white;
        }

        .pdf-button {
            background-color: #f44336;
            color: white;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #printableArea, #printableArea * {
                visibility: visible;
            }
        }
    </style>

</head>
<body>
    <div id="printableArea" style="text-align: center;">
        <div class="">
            <div style="float: right">
                <img style="width: 50%;height:fit-content; " src="{{ asset('website/images/hotel-invoice.png') }}" alt="">
            </div>
            <div style="float: left;text-align: left;">
                <div for="">{{ $agent->company_name }}</div>
                <div for="">{{ $agent->management_email }}</div>
                <div for="">{{ $agent->management_phone }}</div>
                <div for="">{{ $agent->country }}, {{ $agent->city }}</div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <h1>{{ $head_sentense }}</h1>
        @if ($bookings)
            <table>
                <thead>
                    <tr>
                        <th>Booking Reference Id</th>
                        <th>Guests Names</th>
                        <th>Total Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_reference_id }}</td>
                        <td>{{ $booking->guest_names }}</td>
                        <td>{{ $booking->total_price }} {{ $agent->currency }}</td>
                        <td>{{ $booking->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tr >
                    <td colspan="4"><h4>{{ $sentense }}</h4></td>
                </tr>
            </table>
        @elseif($transactions)
        <table>
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Balance</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->reference }}</td>
                    <td>{{ $transaction->balance }} {{ $transaction->currency }}</td>
                    <td>{{ $transaction->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
                <tr >
                    <td colspan="3"><h4>{{ $sentense }}</h4></td>
                </tr>
            </tbody>
        </table>
        @endif
    </div>
</body>
</html>
