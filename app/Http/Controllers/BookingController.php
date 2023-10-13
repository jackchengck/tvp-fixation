<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StoreBookingRequest;
    use App\Http\Requests\UpdateBookingRequest;
    use App\Mail\BookingCreatedToCustomer;
    use App\Models\Booking;
    use App\Models\Customer;
    use App\Models\Service;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;

    class BookingController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        public function storeBooking(Request $request)
        {
            //
//            dd($request);
            $booking = new Booking();
            $booking->order_num = $request->order_num;

//            $customer = new Customer();
//            $customer->name = $request->customer_name;
//            $customer->email = $request->customer_email;
//            $customer->phone = '+852' . $request->customer_phone;
//            $customer->password = $request->customer_password;
//            $customer->save();

            $customer = Customer::firstOrCreate(
                [
                    'email'       => $request->customer_email,
                    'password'    => $request->customer_password,
                    //                    'business_id' => Service::find($request->service)->business->id,
                    'business_id' => intval($request->business_id),

                ],
                [
                    'name'  => $request->customer_name,
                    'phone' => '+852' . $request->customer_phone,
                    'business_id' => intval($request->business_id),

                ]
            );

            $booking->customer_id = $customer->id;
//            $booking->customer_name = $request->customer_name;
//            $booking->customer_email = $request->customer_email;
//            $booking->customer_phone = '+852' . $request->customer_phone;
//            $booking->customer_password = $request->customer_password;
            $booking->booking_date = $request->booking_date;
            $booking->booking_time = $request->timeslot;
            $booking->service_id = $request->service;
//            $booking->business_id = Service::find($request->service)->business->id;
            $booking->business_id = $request->business_id;

            $booking->save();

            Mail::to($booking->customer->email)->send(new BookingCreatedToCustomer($booking));

            return redirect('booking')->with('status', 'Booking Has been created');
        }

        public function getStoreBooking(Request $request)
        {

//            dd($request);
//
//            $booking = new Booking();
//            $booking->order_num = $request->order_num;
//            $booking->customer_name = $request->customer_name;
//            $booking->customer_email = $request->customer_email;
//            $booking->customer_phone = '+852' . $request->customer_phone;
//            $booking->customer_password = $request->customer_password;
//            $booking->booking_date = $request->booking_date;
//            $booking->booking_time = $request->timeslot;
//            $booking->service_id = $request->service;
//            $booking->business_id = Service::find($request->service)->business->id;
//
//            $booking->save();
//
//            Mail::to($booking->customer_email)->send(new BookingCreatedToCustomer($booking));

            return redirect('booking')->with('status', 'Booking Has been created');
        }

        /**
         * Display the specified resource.
         *
         * @param \App\Models\Booking $booking
         * @return \Illuminate\Http\Response
         */
        public function show(Booking $booking)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Models\Booking $booking
         * @return \Illuminate\Http\Response
         */
        public function edit(Booking $booking)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \App\Http\Requests\UpdateBookingRequest $request
         * @param \App\Models\Booking $booking
         * @return \Illuminate\Http\Response
         */
        public function update(UpdateBookingRequest $request, Booking $booking)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Models\Booking $booking
         * @return \Illuminate\Http\Response
         */
        public function destroy(Booking $booking)
        {
            //
        }
    }
