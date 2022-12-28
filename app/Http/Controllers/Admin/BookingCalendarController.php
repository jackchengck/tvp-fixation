<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingCalendarController extends Controller
{
    /**
     * Handle the incoming request.
     *
     */
    public function __invoke()
    {
        //
        $title = "Booking Calendar";

        $events = [];
        $bookings = Booking::with(['service'])->get();

        foreach ($bookings as $booking) {

            $date = new \DateTime($booking->booking_date);

            $startTime = strtotime($booking->booking_time);

            $start = new \DateTime(date("G:i", $startTime));
//            $startTime = new \DateTime($startTime);
            $addMins = $booking->service->division * 60;
            $end = new \DateTime(date("G:i", $startTime + $addMins));

            $startDateTime = $date->setTime($start->format('H'), $start->format('i'), $start->format('s'))->format("Y-m-d H:i:s");
            $endDateTime = $date->setTime($end->format('H'), $end->format('i'), $end->format('s'))->format("Y-m-d H:i:s");

            $events[] = [
                'title' => $booking->service->title,
                'start' => $startDateTime,
                'end' => $endDateTime,
            ];
        }

        
        return view('admin.booking_calendar', [
            'title' => $title,
            'events' => $events,
        ]);
    }
}
