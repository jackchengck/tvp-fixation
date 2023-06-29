<?php

namespace App\Http\Controllers;

use App\Mail\BookingCreatedToCustomer;
use App\Models\Booking;
use App\Notifications\BookingCreatedSMS;
use App\Notifications\BookingDueSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendSmsController extends Controller
{
    //

    public function sendBookingCustomerSms($id)
    {

        $booking = Booking::findOrFail($id);

        // Ship the order...

//        Mail::to($supplierOrder->supplier->email)->send(new \App\Mail\SupplierOrder($supplierOrder));
//        Mail::to($booking->customer_email)->queue(new BookingCreatedToCustomer($booking));

        $booking->notify(new BookingCreatedSMS($booking));

        return ("Booking SMS for Customer sent");
    }

    public function sendBookingDueCustomerSms($id)
    {

        $booking = Booking::findOrFail($id);

        // Ship the order...

//        Mail::to($supplierOrder->supplier->email)->send(new \App\Mail\SupplierOrder($supplierOrder));
//        Mail::to($booking->customer_email)->queue(new BookingCreatedToCustomer($booking));

        $booking->notify(new BookingDueSMS($booking));

        return ("Booking Due Sms for Customer sent");
    }
}
