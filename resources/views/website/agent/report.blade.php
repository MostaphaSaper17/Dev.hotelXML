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


    <div class="buttons-row">
        <a href="#" class="action-button print-button" onclick="printReport()"><i class="fas fa-print"></i> PRINT</a>
        <a href="#" class="action-button excel-button" onclick="exportToExcel()"><i class="fas fa-file-excel"></i> EXCEL</a>
        <a href="#" class="action-button pdf-button" onclick="exportToPDF()"><i class="fas fa-file-pdf"></i> PDF</a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
    <script>
        function printReport() {
            // Implement print functionality here
            window.print();
        }

        function exportToExcel() {
        // Create a new workbook and set up the worksheet
            const wb = XLSX.utils.book_new();
            const ws = XLSX.utils.table_to_sheet(document.getElementById('printableArea'));

            // Add the worksheet to the workbook
            XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

            // Save or open the Excel file
            XLSX.writeFile(wb, 'report.xlsx');
        }

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
        function exportToPDF() {
            // Create a new jsPDF instance
            const pdf = new jsPDF();

            // Add a header to the PDF
            pdf.text('Complete Bookings Report', 10, 10);

            // Add a table to the PDF using AutoTable
            pdf.autoTable({
                html: '#printableArea table',
                theme: 'grid', // You can customize the table theme
                styles: { fontSize: 8, fontStyle: 'normal' }, // Customize styles if needed
                headStyles: { fillColor: [200, 200, 200] }, // Customize header styles if needed
            });

            // Save or open the PDF
            pdf.save('bookings_report.pdf');
        }
    </script>
</body>
</html>
