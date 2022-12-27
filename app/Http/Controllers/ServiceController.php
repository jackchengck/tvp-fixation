<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }


    public function getBookingSlot(Request $request)
    {
        function SplitTime($start, $end, $duration)
        {
            $returnArr = array();
            $startTime = strtotime($start);
            $endTime = strtotime($end);

            $addMins = $duration * 60;

            while ($startTime <= $endTime && $startTime + $addMins <= $endTime) {
                $returnArr[] = ['start' => date("G:i", $startTime), 'end' => date("G:i", $startTime + $addMins), 'disabled' => false];
                $startTime += $addMins;
            }
            return $returnArr;
        }

        $serviceId = $request->input('service');
//        $doctorId = $request->input('doctor');
        $dateR = $request->input('date');
//        $selectedYear = $request->input('year');
//        $selectedMonth = $request->input('month');
//        $modifiedMonth = intval($selectedMonth) + 1;
//
//        $selectedDate = $request->input('date');
//        $selectedDay = $request->input('day');


        $service = Service::find($serviceId);

        $opening_hours = new OpeningHourCollection(OpeningHour::where('day', '=', $selectedDay)->orderBy('start', 'asc')->get());
//        $holidays = new HolidayCollection(Holiday::where('holiday_date', '=', "{$selectedYear}-{$modifiedMonth}-{$selectedDate}")->get());

        $holidays = new HolidayCollection(Holiday::whereHas('doctors', function ($query) use ($doctorId) {
            return $query->where('doctors.id', '=', $doctorId);
        })->where('holiday_date', '=', "{$selectedYear}-{$modifiedMonth}-{$selectedDate}")->get());

        $wholeDayHoliday = Holiday::whereHas('doctors', function ($query) use ($doctorId) {
            return $query->where('doctors.id', '=', $doctorId);
        })->where('holiday_date', '=', "{$selectedYear}-{$modifiedMonth}-{$selectedDate}")->where('whole_day', '=', true)->get();


        date_default_timezone_set('Asia/Hong_Kong');
//        $date = date("{$selectedYear}-{$modifiedMonth}-{$selectedDate}");
//        $startDateTime = strtotime("{$selectedYear}-{$modifiedMonth}-{$selectedDate}");
//        $endDateTime = strtotime("{$selectedYear}-{$modifiedMonth}-{$x}");

        $x = $selectedDate + 1;
        $startDateTime = new \DateTime("{$selectedYear}-{$modifiedMonth}-{$selectedDate}");
        $endDateTime = new \DateTime("{$selectedYear}-{$modifiedMonth}-{$x}");

//        $Cdate = new Carbon($date);
//        $selectDate = $Cdate->add($dayCount, 'day');
        $bookings = new BookingCollection(Booking::where('service_id', '=', $serviceId)->where('doctor_id', '=', $doctorId)->where('booking_date', '>=', $startDateTime)->where('booking_date', '<=', $endDateTime)->get());

        $timeSlots = [];
        foreach ($opening_hours as $opening_hour) {
            $Data = SplitTime($opening_hour->start, $opening_hour->end, $service->duration);
//            $timeSlots[] = $Data;
            array_push($timeSlots, ...$Data);
        }

        $ohNO = [];
//        CHECK HOLIDAY COLLIDES
        foreach ($holidays as $holiday) {
            $holidayStartTime = strtotime($holiday->start);
            $holidayEndTime = strtotime($holiday->end);

            foreach ($timeSlots as $key => $timeSlot) {
                if (strtotime($timeSlot['start']) >= $holidayStartTime && strtotime($timeSlot['start']) <= $holidayEndTime - 1) {
                    $ohNO[] = ['start_time' => $timeSlot];
                    $timeSlots[$key]['disabled'] = true;
                }
            }
        }

        $bookbook = [];


//        CHECK BOOKING COLLIDES
        foreach ($bookings as $booking) {
            $bookingStartTime = $booking->booking_date;

            foreach ($timeSlots as $key =>  $timeSlot) {
//                if(strtotime($timeSlot['start']))
                if (strtotime("{$selectedYear}-{$modifiedMonth}-{$selectedDate} " . $timeSlot['start']) == strtotime($bookingStartTime)) {
                    $bookbook[] = ['start_time' => strtotime($bookingStartTime), 'time' => $bookingStartTime, 'slot' => $timeSlot];
                    $timeSlots[$key]['disabled'] = true;

                }
            }

        }


        return response()->json([
            'data' => [
//                'book' => $bookbook,
//                'date' => [
//                    $startDateTime,
//                    $endDateTime
//                ],
//                'bookings' => $bookings,
                'timeslots' => $timeSlots,
//                'ohNo' => $ohNO,

                'whole_day_holiday' => count($wholeDayHoliday) > 0 ? true : false,
                'opening_hours' => $opening_hours,
//                'holidays' => $holidays,

//                'received' => [
//                    'service_id' => $serviceId,
//                    'doctor_id' => $doctorId,
//                    'year' => $selectedYear,
//                    'month' => $selectedMonth,
//                    'date' => $selectedDate,
//                    'day' => $selectedDay,
//                ],
                'service' => $service,
//                'test' => new \DateTime($selectedYear . "-" . $selectedMonth . "-" . $selectedDate . " " . $opening_hours[0]->start),
//                'doctor' => $doctor,
//                'weekdays' => $weekdays,

//                'slots'=>[]
            ],
        ]);
    }
}
