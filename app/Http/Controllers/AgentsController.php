<?php

namespace App\Http\Controllers;

use DB;
use DateTime;
use Carbon\Carbon;
use App\Models\Agent;
use App\Models\Message;
use App\Models\Transaction;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\ManualBooking;
use App\Models\SupportTicket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class AgentsController extends Controller
{
    public function getAgent($id)
    {
        $agent = Agent::findOrFail($id);

        $companyEmail = $agent->management_email;
        $companyPhone = $agent->management_phone;
        $companyCurrency = $agent->currency;
        $currentBalance = $agent->balance;
        return response()->json([
            'companyEmail' => $companyEmail,
            'companyPhone' => $companyPhone,
            'companyCurrency' => $companyCurrency,
            'currentBalance' => $currentBalance,
        ]);
    }

    public function getBookingDetails($id)
    {
        $booking = ManualBooking::where('booking_reference_id',$id)->first();
        $payment_status = 'Paid';

        $agent = Auth::guard('agent')->user();

        $agent_price = $booking->agent_price . ' ' . $agent->currency;

        $refund_ability = 'none';
        $RefundDate = '';

        $checkInDate = new DateTime($booking->check_in_date);
        $checkOutDate = new DateTime($booking->check_out_date);

        if($booking->refund_date){
            $RefundDate = new DateTime($booking->refund_date);
            if($checkInDate > $RefundDate){
                $refund_ability = 'yes';
            }
        }

        $nights = $checkInDate->diff($checkOutDate)->days;

        if($booking->booking_status !== 'complete'){
            $payment_status = 'Unpaid';
        }

        return response()->json([
            'booking_id' => $booking->booking_reference_id,
            'agent_email' => $agent->person_email,
            'created_at' => $booking->created_at->format('d/m/Y'),
            'payment_status' => $payment_status,
            'check_in_date' => $booking->check_in_date,
            'check_out_date' => $booking->check_out_date,
            'nights' => $nights,
            'rooms' => $booking->room_numbers,
            'children_number' => $booking->children_number,
            'adult_number' => $booking->adults_number,
            'guest_name' => $booking->guest_names,
            'room_types' => $booking->room_types,
            'Hotel_Name' => $booking->hotel_name,
            'Room_Meal' => $booking->room_meal,
            'Country' => $booking->country,
            'City' => $booking->city,
            'nationality' => $booking->nationality,
            'refund_ability' => $refund_ability,
            'Booking_Status' => $booking->booking_status,
            'Confirmation_Number' => $booking->confirmation_number ?? '-',
            'Total_Price' => $agent_price,
            'Refund_Date' => $booking->refund_date,
            'Cancellation_Policy' => $booking->cancellation_policy,
            // 'agent_name' => $booking->company_name,
        ]);
    }

    public function bookingsFilter(Request $request)
    {

        $currency = Auth::guard('agent')->user()->currency;

        $books = ManualBooking::where('company_name', Auth::guard('agent')->user()->company_name)
            ->orderBy('created_at', 'desc');

        if ($request->booking_id) {
            $books->where('booking_reference_id', $request->booking_id);
        }

        if ($request->guest_name) {
            $books->where('guest_names', 'like', '%' . $request->guest_name . '%');
        }

        if ($request->booking_status !== 'all') {
            $books->where('booking_status', 'like', $request->booking_status);
        }

        if ($request->check_in_status !== 'all') {
            if($request->check_in_status === 'past'){
                $books->where('check_in_date', '<', now()->format('Y-m-d'))->where('check_out_date', '<', now()->format('Y-m-d'));
            }
            if($request->check_in_status === 'future'){
                $books->where('check_in_date', '>', now()->format('Y-m-d'))->where('check_out_date', '>', now()->format('Y-m-d'));
            }
            if($request->check_in_status === 'active-stay'){
                $books->where('check_in_date', '<', now()->format('Y-m-d'))->where('check_out_date', '>', now()->format('Y-m-d'));
            }
        }

        if ($request->booking_from !== 'DD/MM/YYYY' && $request->booking_to !== 'DD/MM/YYYY') {

            $booking_from = Carbon::createFromFormat('d/m/Y', $request->booking_from)->startOfDay();
            $booking_to = Carbon::createFromFormat('d/m/Y', $request->booking_to)->endOfDay();

            if ($booking_from < $booking_to) {
                $books->whereBetween('created_at', [$booking_from, $booking_to]);
            }
        }

        if ($request->check_in_date !== 'DD/MM/YYYY') {
            $check_in_date1 = Carbon::createFromFormat('d/m/Y', $request->check_in_date)->format('Y-m-d');
            $books->where('check_in_date', '=', $check_in_date1);
        }

        if ($request->check_out_date !== 'DD/MM/YYYY') {
            $check_out_date1 = Carbon::createFromFormat('d/m/Y', $request->check_out_date)->format('Y-m-d');
            $books->where('check_out_date', '=', $check_out_date1);
        }

        if ($request->cancellation_date_from !== 'DD/MM/YYYY' && $request->cancellation_date_to !== 'DD/MM/YYYY') {
            $cancellation_date_from = Carbon::createFromFormat('d/m/Y', $request->cancellation_date_from)->format('Y-m-d');
            $cancellation_date_to = Carbon::createFromFormat('d/m/Y', $request->cancellation_date_to)->format('Y-m-d');

            if ($cancellation_date_from < $cancellation_date_to) {
                $books->whereBetween('refund_date', [$cancellation_date_from, $cancellation_date_to]);
            }
        }

        $result = $books->get();

        return response()->json(['books' => $result, 'currency' => $currency]);
    }

    public function getMessages($id)
    {
        $ticket = SupportTicket::findOrFail($id);
        $notification = Notification::where('url',$ticket->ticket_code)->first();
        $notification->isRead = 1;
        $notification->save();
        $messages = Message::where('ticket_id','=',$ticket->id)->get();
        return response()->json([
            'ticket' => $ticket,
            'status' => $ticket->status,
            'messages' => $messages,
        ]);
    }

    public function getMonthlyReport($id)
    {
        $month = '';
        if($id == 1){
            $month = 'January';
        }
        elseif($id == 2){
            $month = 'Febraury';
        }
        elseif($id == 3){
            $month = 'March';
        }
        elseif($id == 4){
            $month = 'April';
        }
        elseif($id == 5){
            $month = 'May';
        }
        elseif($id == 6){
            $month = 'June';
        }
        elseif($id == 7){
            $month = 'July';
        }
        elseif($id == 8){
            $month = 'August';
        }
        elseif($id == 9){
            $month = 'September';
        }
        elseif($id == 10){
            $month = 'October';
        }
        elseif($id == 11){
            $month = 'November';
        }
        else{
            $month = 'December';
        }
        $agent = Auth::guard('agent')->user();
        $currency = $agent->currency;
        $monthReport = ManualBooking::
        where('company_name',$agent->company_name)
        ->where('company_name',$agent->company_name)
            ->whereMonth('created_at', $id)
            ->sum('agent_price');
        return response()->json([
            'monthReport' => $monthReport,
            'month' => $month,
            'currency' => $currency,
        ]);
    }

    public function pay_booking_balance($id)
    {
        $booking = ManualBooking::where('booking_reference_id',$id)->first();
        $agent = Auth::guard('agent')->user();
        if($booking->agent_price <= $agent->balance){
            $agent->balance = $agent->balance-$booking->agent_price;
            $agent->save();
            $booking->booking_status = 'complete';
            $booking->save();

            Transaction::create([
                'reference' => $booking->booking_reference_id,
                'company_name' => $agent->company_name,
                'currency' => $agent->currency,
                'balance' => $booking->agent_price,
                'notes' => '',
                'type' => 'Debit',
            ]);

            Notification::create([
                'type' => 'Pay Booking',
                'user_type' => 'admin',
                'title' => 'A Booking No. '.$booking->booking_reference_id.' with a value of '.$booking->agent_price . $agent->currency .' has been Paid by '.Auth::guard('agent')->user()->company_name,
                'url' => 'manual-bookings/'.$booking->id,
            ]);

            return response()->json([
                'message' => 'Booking Paid Succeffully',
            ]);
        }
        return response()->json([
            'message' => 'Your Balance is Not Enough',
        ]);
    }

    public function confirm_cancel_booking($id)
    {
        $booking = ManualBooking::where('booking_reference_id',$id)->first();
        $transaction = Transaction::where('reference',$booking->booking_reference_id)->first();
        $agent = Auth::guard('agent')->user();
        if($booking->booking_status === 'complete' && $booking->cancellation_policy ==='refundable' &&  Carbon::parse($booking->refund_date)->toDateTime() > now()){
            $booking->booking_status = 'cancelled';
            $booking->save();
            $agent->balance = $agent->balance+$booking->agent_price;
            $agent->save();
            $transaction->delete();
            Notification::create([
                'type' => 'Cancel Booking',
                'user_type' => 'admin',
                'title' => 'A Booking No. '.$booking->booking_reference_id.' with a value of '.$booking->agent_price . $agent->currency .' has been Cancelled by '.Auth::guard('agent')->user()->company_name,
                'url' => 'manual-bookings/'.$booking->id,
            ]);
            return response()->json([
                'message' => 'Booking Cancelled Successfully',
            ]);
        }
        else if($booking->booking_status === 'confirm'){
            $booking->booking_status = 'cancelled';
            $booking->save();
            $transaction->delete();
            Notification::create([
                'type' => 'Cancel Booking',
                'user_type' => 'admin',
                'title' => 'A Booking No. '.$booking->booking_reference_id.' with a value of '.$booking->agent_price . $agent->currency .' has been Cancelled by '.Auth::guard('agent')->user()->company_name,
                'url' => 'manual-bookings/'.$booking->id,
            ]);
            return response()->json([
                'message' => 'Booking Cancelled Successfully',
            ]);
        }else{
            return response()->json([
                'message' => 'This Booking is Non Refundable',
            ]);
        }
    }

    public function check_booking_support($id)
    {
        $ticket = SupportTicket::where('subject',$id)->first();
        if($ticket)
        {
            $messages = Message::where('ticket_id','=',$ticket->id)->get();
            return response()->json([
                'ticket' => $ticket,
                'status' => $ticket->status,
                'message' => 'Found',
                'messages' => $messages,
            ]);
        }
        else
        {
            return response()->json(['message' => 'Not Found',]);
        }
    }

    public function salesReportFilter(Request $request)
    {
        if($request->agent){
            $sum = 0;
        }
        {
            return response()->json(['message' => 'Not Found',]);
        }
    }

    public function salesReportCompanyNameFilter(Request $request)
    {
        if ($request->date_from && $request->date_to) {
            $date_from = Carbon::createFromFormat('Y-m-d', $request->date_from);
            $date_to = Carbon::createFromFormat('Y-m-d', $request->date_to);
            if ($request->date_from < $request->date_to ) {
                $books = ManualBooking::where('company_name', $request->companyName)
                ->where('booking_status','complete')
                ->whereBetween('created_at', [$date_from->addDay(), $date_to->addDay()])
                ->orderBy('created_at', 'desc')->get();
                if($books->count()>0)
                {
                    return response()->json(['books' => $books,]);
                }
                else{
                    return response()->json(['message' => 'No Data Found',]);
                }
            }else{
                return response()->json(['message' => 'Date To Must Be Newer than Date From',]);
            }
        }elseif(!$request->date_from && !$request->date_to){
            $books = ManualBooking::where('company_name', $request->companyName)
                ->where('booking_status','complete')
                ->orderBy('created_at', 'desc')->get();
                if($books->count()>0)
                {
                    return response()->json(['books' => $books,]);
                }
                else{
                    return response()->json(['message' => 'No Data Found',]);
                }
        }else{
            return response()->json(['message' => 'Date From and Date To Must Be Both have Values Or Both Not have Values',]);
        }
    }

    public function salesReportCurrencyFilter(Request $request)
    {
        if ($request->date_from && $request->date_to) {
            $date_from = Carbon::createFromFormat('Y-m-d', $request->date_from);
            $date_to = Carbon::createFromFormat('Y-m-d', $request->date_to);
            if ($request->date_from < $request->date_to ) {
                $books = ManualBooking::where('agent_currency', $request->currency)
                ->where('booking_status','complete')
                ->whereBetween('created_at', [$date_from->addDay(), $date_to->addDay()])
                ->orderBy('created_at', 'desc')->get();
                if($books->count()>0)
                {
                    return response()->json(['books' => $books]);
                }
                else{
                    return response()->json(['message' => 'No Data Found',]);
                }
            }else{
                return response()->json(['message' => 'Date To Must Be Newer than Date From',]);
            }
        }elseif(!$request->date_from && !$request->date_to){
            $books = ManualBooking::where('agent_currency', $request->currency)
                ->where('booking_status','complete')
                ->orderBy('created_at', 'desc')->get();
                if($books->count()>0)
                {
                    return response()->json(['books' => $books,]);
                }
                else{
                    return response()->json(['message' => 'No Data Found',]);
                }
            }else{
            return response()->json(['message' => 'Date From and Date To Must Be Both have Values Or Both Not have Values',]);
        }
    }

    public function salesReportBoxesFilter(Request $request)
    {
        if ($request->date_from && $request->date_to){
            $date_from = Carbon::createFromFormat('Y-m-d', $request->date_from);
            $date_to = Carbon::createFromFormat('Y-m-d', $request->date_to);
            if ($request->date_from < $request->date_to ) {
                $sumByCurrency = ManualBooking::where('booking_status','complete')
                ->groupBy('agent_currency')
                ->select('agent_currency', DB::raw('SUM(total_price) as total_sum'))
                ->whereBetween('created_at', [$date_from->addDay(),$date_to->addDay()])
                ->get();
                if($sumByCurrency->count()>0)
                {
                    return response()->json(['sumByCurrency' => $sumByCurrency,]);
                }else{
                    return response()->json(['EmptyArray' => 'Empty',]);
                }
            }else{
                return response()->json(['message' => 'Date To Must Be Newer than Date From',]);
            }
        }elseif(!$request->date_from && !$request->date_to){
            $sumByCurrency = ManualBooking::where('booking_status','complete')
            ->groupBy('agent_currency')
            ->select('agent_currency', DB::raw('SUM(total_price) as total_sum'))
            ->get();
            return response()->json(['sumByCurrency' => $sumByCurrency,]);
        }else{
            return response()->json(['message' => 'Date From and Date To Must Be Both have Values Or Both Not have Values',]);
        }

    }

    public function getCompanyCurrency($companyName)
    {
        $agent = Agent::where('company_name',$companyName)->first();
        $currency = $agent->currency;
        {
            return response()->json(['companyCurrency' => $currency,]);
        }
    }

    public function bookingStatisticsCompanyNameFilter(Request $request)
    {
        if ($request->date_from && $request->date_to) {
            $date_from = Carbon::createFromFormat('Y-m-d', $request->date_from);
            $date_to = Carbon::createFromFormat('Y-m-d', $request->date_to);
            if ($request->date_from < $request->date_to ) {
                $books = ManualBooking::where('company_name', $request->companyName)
                ->whereBetween('created_at', [$date_from->addDay(), $date_to->addDay()])
                ->orderBy('created_at', 'desc')->get();
                if($books->count()>0)
                {
                    return response()->json(['books' => $books,]);
                }
                else{
                    return response()->json(['message' => 'No Data Found',]);
                }
            }else{
                return response()->json(['message' => 'Date To Must Be Newer than Date From',]);
            }
        }elseif(!$request->date_from && !$request->date_to){
            $books = ManualBooking::where('company_name', $request->companyName)
            ->orderBy('created_at', 'desc')->get();
            if($books->count()>0)
                {
                    return response()->json(['books' => $books,]);
                }
                else{
                    return response()->json(['message' => 'No Data Found',]);
                }
            }else{
                return response()->json(['message' => 'Date From and Date To Must Be Both have Values Or Both Not have Values',]);
            }
    }

    public function bookingStatisticsStatusFilter(Request $request)
    {
        if ($request->date_from && $request->date_to) {
            $date_from = Carbon::createFromFormat('Y-m-d', $request->date_from);
            $date_to = Carbon::createFromFormat('Y-m-d', $request->date_to);
            if ($request->date_from < $request->date_to ) {
                $books = ManualBooking::where('booking_status', $request->status)
                ->whereBetween('created_at', [$date_from->addDay(), $date_to->addDay()])
                ->orderBy('created_at', 'desc')->get();
                if($books->count()>0)
                {
                    return response()->json(['books' => $books]);
                }
                else{
                    return response()->json(['message' => 'No Data Found',]);
                }
            }else{
                return response()->json(['message' => 'Date To Must Be Newer than Date From',]);
            }
        }elseif(!$request->date_from && !$request->date_to){
            $books = ManualBooking::where('booking_status', $request->status)
                ->orderBy('created_at', 'desc')->get();
                if($books->count()>0)
                {
                    return response()->json(['books' => $books,]);
                }
                else{
                    return response()->json(['message' => 'No Data Found',]);
                }
        }else{
            return response()->json(['message' => 'Date From and Date To Must Be Both have Values Or Both Not have Values',]);
        }
    }

    public function bookingStatisticsBoxesFilter(Request $request)
    {
        if ($request->date_from && $request->date_to){
            $date_from = Carbon::createFromFormat('Y-m-d', $request->date_from);
            $date_to = Carbon::createFromFormat('Y-m-d', $request->date_to);
            if ($request->date_from < $request->date_to ) {
                $complete = ManualBooking::where('booking_status','complete')->whereBetween('created_at', [$date_from,$date_to->addDay()])->count();
                $cancelled = ManualBooking::where('booking_status','cancelled')->whereBetween('created_at', [$date_from,$date_to])->count();
                $confirm = ManualBooking::where('booking_status','confirm')->whereBetween('created_at', [$date_from,$date_to->addDay()])->count();
                return response()->json([
                    'complete' => $complete,
                    'confirm' => $confirm,
                    'cancelled' => $cancelled,]);
            }else{
                return response()->json(['message' => 'Date To Must Be Newer than Date From',]);
            }
        }elseif(!$request->date_from && !$request->date_to){
            $complete = ManualBooking::where('booking_status','complete')->count();
            $cancelled = ManualBooking::where('booking_status','cancelled')->count();
            $confirm = ManualBooking::where('booking_status','confirm')->count();
            return response()->json([
                'complete' => $complete,
                'confirm' => $confirm,
                'cancelled' => $cancelled,]);
        }else{
            return response()->json(['message' => 'Date From and Date To Must Be Both have Values Or Both Not have Values',]);
        }

    }

    public function markReadNotification($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->isRead = 1;
        $notification->update();
    }

    public function generateReport(Request $request)
    {
        $specific = Carbon::createFromFormat('d/m/Y', $request->specific);
        $range_from = Carbon::createFromFormat('d/m/Y', $request->range_from)->startOfDay();
        $range_to = Carbon::createFromFormat('d/m/Y', $request->range_to)->endOfDay();

        if($request->date_type === "Range"){
            if($range_to <= $range_from){
                toastr()->error('Date Range To Must Be Highr Than Date Range From','Error');
                return redirect()->back();
            }
        }

        $agent = Auth::guard('agent')->user();
        $transactions =[];
        $head_sentense = '';
        $sentense = '';
        $not_found = 'No Data Found';
        $bookings =[];
        $order = $request->input('order');
        $type = $request->input('type');
        if($order === 'Booking' || $order === 'Sales'){
            if($type === 'all'){
                if($request->date_type === "Range"){
                    $bookings = ManualBooking::where('company_name', $agent->company_name)
                        ->whereBetween('created_at', [
                            $range_from,
                            $range_to,
                        ])
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $head_sentense = 'Total Bookings From '.$request->range_from.' To '.$request->range_to.'';
                }else{
                    $bookings = ManualBooking::where('company_name', $agent->company_name)
                        ->whereDate('created_at', $specific->toDateString())
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $head_sentense = 'Total Bookings On '.$request->specific.'';
                }
                $sentense = 'Total Price: ' . $bookings->sum('total_price') .' '. $agent->currency;
            }
            elseif($type === 'confirm'){
                if($request->date_type === "Range"){
                    $bookings = ManualBooking::where('company_name', $agent->company_name)
                        ->where('booking_status','confirm')
                        ->whereBetween('created_at', [
                            $range_from,
                            $range_to,
                        ])
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $head_sentense = 'Confirm Bookings From '.$request->range_from.' To '.$request->range_to.'';
                }else{
                    $bookings = ManualBooking::where('company_name', $agent->company_name)
                        ->where('booking_status','confirm')
                        ->whereDate('created_at', $specific->toDateString())
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $head_sentense = 'Confirm Bookings On '.$request->specific.'';
                }
                $sentense = 'Total Price: ' . $bookings->sum('total_price') .' '. $agent->currency;

            }
            elseif($type === 'cancel'){
                if($request->date_type === "Range"){
                    $bookings = ManualBooking::where('company_name', $agent->company_name)
                        ->where('booking_status','cancel')
                        ->whereBetween('created_at', [
                            $range_from,
                            $range_to,
                        ])
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $head_sentense = 'Cancel Bookings From '.$request->range_from.' To '.$request->range_to.'';
                }else{
                    $bookings = ManualBooking::where('company_name', $agent->company_name)
                        ->where('booking_status','cancel')
                        ->whereDate('created_at', $specific->toDateString())
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $head_sentense = 'Cancel Bookings On '.$request->specific.'';
                }
                $sentense = 'Total Price: ' . $bookings->sum('total_price') .' '. $agent->currency;
            }
            elseif($type === 'complete'){
                if($request->date_type === "Range"){
                    $bookings = ManualBooking::where('company_name', $agent->company_name)
                        ->where('booking_status','complete')
                        ->whereBetween('created_at', [
                            $range_from,
                            $range_to,
                        ])
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $head_sentense = 'Complete Bookings From '.$request->range_from.' To '.$request->range_to.'';
                }else{
                    $bookings = ManualBooking::where('company_name', $agent->company_name)
                        ->where('booking_status','complete')
                        ->whereDate('created_at', $specific->toDateString())
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $head_sentense = 'Complete Bookings On '.$request->specific.'';
                }
                $sentense = 'Total Price: ' . $bookings->sum('total_price') .' '. $agent->currency;
            }
        }

        if($order === 'Transaction'){
            if($type === 'all'){
                if($request->date_type === "Range"){
                    $transactions = Transaction::where('company_name', $agent->company_name)
                        ->whereBetween('created_at', [
                            $range_from,
                            $range_to,
                        ])
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $head_sentense = 'All Transaction From '.$request->range_from.' To '.$request->range_to.'';
                }else{
                    $transactions = Transaction::where('company_name', $agent->company_name)
                        ->whereDate('created_at', $specific->toDateString())
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $head_sentense = 'Total Transactions On '.$request->specific.'';
                }
                $sentense = 'Total Transactions: ' . $transactions->sum('balance') .' '. $agent->currency;
            }
            elseif($type === 'credit'){
                if($request->date_type === "Range"){
                    $transactions = Transaction::where('company_name', $agent->company_name)
                        ->where('type','credit')
                        ->whereBetween('created_at', [
                            $range_from,
                            $range_to,
                        ])
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $head_sentense = 'Credits Transaction From '.$request->range_from.' To '.$request->range_to.'';
                }else{
                    $transactions = Transaction::where('company_name', $agent->company_name)
                        ->where('type','credit')
                        ->whereDate('created_at', $specific->toDateString())
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $head_sentense = 'Credits Transactions On '.$request->specific.'';
                }
                $sentense = 'Total Credits Transactions: ' . $transactions->sum('balance') .' '. $agent->currency;
            }
            elseif($type === 'debit'){
                if($request->date_type === "Range"){
                    $transactions = Transaction::where('company_name', $agent->company_name)
                        ->where('type','debit')
                        ->whereBetween('created_at', [
                            $range_from,
                            $range_to,
                        ])
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $head_sentense = 'Debits Transaction From '.$request->range_from.' To '.$request->range_to.'';
                }else{
                    $transactions = Transaction::where('company_name', $agent->company_name)
                        ->where('type','debit')
                        ->whereDate('created_at', $specific->toDateString())
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $head_sentense = 'Debits Transactions On '.$request->specific.'';
                }
                $sentense = 'Total Debits Transactions: ' . $transactions->sum('balance') .' '. $agent->currency;
            }
        }
        $data = [
            'bookings' => $bookings,
            'agent' => $agent,
            'transactions' => $transactions,
            'head_sentense' => $head_sentense,
            'sentense' => $sentense
        ];
        $pdf = Pdf::loadView('website.agent.report',$data)->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download(''.$head_sentense.'.pdf');
    }

    public function generate_pdf(){

    }

    public function invoice($id)
    {
        $booking = ManualBooking::where('booking_reference_id',$id)->first();
        return response()->json(['booking' => $booking, 'redirect' => route('agent.show-invoice',$id)]);
    }

    public function show_invoice($id)
    {
        $agent = Auth::guard('agent')->user();
        $booking = ManualBooking::where('booking_reference_id',$id)->first();
        $checkInDate = new DateTime($booking->check_in_date);
        $checkOutDate = new DateTime($booking->check_out_date);
        $nights = $checkInDate->diff($checkOutDate)->days;
        $invoice = $booking->booking_reference_id.\Carbon\Carbon::parse($booking->created_at)->format('d/m/y');
        $charactersToRemove = ["HXM", "/"];
        $invoiceId = str_replace($charactersToRemove, "", $invoice);
        $guests = explode("-", $booking->guest_names);
        $guest_name = $guests[0];
        return view('website.agent.invoice',compact('guest_name','invoiceId','booking','agent','checkInDate','checkOutDate','nights'));

    }

    public function voucher($id)
    {
        $booking = ManualBooking::where('booking_reference_id',$id)->first();
        return response()->json(['booking' => $booking, 'redirect' => route('agent.show-voucher',$id)]);
    }

    public function show_voucher($id)
    {
        $agent = Auth::guard('agent')->user();
        $booking = ManualBooking::where('booking_reference_id',$id)->first();
        $checkInDate = new DateTime($booking->check_in_date);
        $checkOutDate = new DateTime($booking->check_out_date);
        $nights = $checkInDate->diff($checkOutDate)->days;
        return view('website.agent.voucher',compact('booking','agent','checkInDate','checkOutDate','nights'));
    }
}
