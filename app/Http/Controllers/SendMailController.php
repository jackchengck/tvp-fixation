<?php

namespace App\Http\Controllers;

use App\Mail\BookingCreatedToCustomer;
use App\Models\Booking;
use App\Models\SupplierOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    //

    public function sendSupplierOrderEmail($id)
    {

        $supplierOrder = SupplierOrder::findOrFail($id);

        // Ship the order...

//        Mail::to($supplierOrder->supplier->email)->send(new \App\Mail\SupplierOrder($supplierOrder));
        Mail::to($supplierOrder->supplier->email)->queue(new \App\Mail\SupplierOrder($supplierOrder));

        return ("Supplier Order Email sent");
    }

    public function sendBookingCustomerEmail($id)
    {

        $booking = Booking::findOrFail($id);

        // Ship the order...

//        Mail::to($supplierOrder->supplier->email)->send(new \App\Mail\SupplierOrder($supplierOrder));
        Mail::to($booking->customer_email)->send(new BookingCreatedToCustomer($booking));

        return ("Booking Email to Customer sent");
    }
}
