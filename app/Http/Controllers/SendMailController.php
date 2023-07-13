<?php

    namespace App\Http\Controllers;

    use App\Mail\BookingCreatedToCustomer;
    use App\Mail\CustomEmail;
    use App\Mail\OrderInvoiceEmail;
    use App\Mail\OrderReceiptEmail;
    use App\Models\Booking;
    use App\Models\Order;
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

        public function customEmail()
        {

            return view('admin.custom_email');
        }

        public function sendCustomEmail(Request $request)
        {
            $business = backpack_user()->business;

            Mail::to($request['email'])->send(new CustomEmail($business, $request['email'], $request['subject'], $request['content']));

//            dd($request['email'],$request['subject'],$request['content']);

            return redirect()->route('mail.custom')->with('status', 'Email Has been sent '.$request['email']);
        }

        public function sendCustomerOrderInvoiceEmail($id)
        {

            $curUser = backpack_user();
            $order = Order::find($id);


            Mail::to($order->customer->email)->send(new OrderInvoiceEmail($order, $curUser));

            return ('Order Invoice for Customer sent');

        }

        public function sendCustomerOrderReceiptEmail($id)
        {

            $curUser = backpack_user();
            $order = Order::find($id);

            Mail::to($order->customer->email)->send(new OrderReceiptEmail($order, $curUser));

            return ('Order Receipt for Customer sent');

        }
    }
