<?php

namespace App\Models;

use App\Http\Resources\BookingCollection;
use App\Http\Resources\HolidayCollection;
use App\Http\Resources\OpeningHourCollection;
use App\Traits\MultiTenantable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\RevisionableTrait;

class Service extends Model
{
    use MultiTenantable;
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use RevisionableTrait;

    public function identifiableName()
    {
        return $this->title;
    }

    // If you are using another bootable trait
    // be sure to override the boot method in your model
    public static function boot()
    {
        parent::boot();
    }

    protected $fillable = [
        'title',
        'description',
        'image',
        'cost',
        'price',
        'division',
        'business_id',
    ];


    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function holidays()
    {
        return $this->hasMany(Holiday::class);
    }

    public function test($value, $v2)
    {
        return $value . $v2;
    }

    public function getBookingSlots($bookingDate)
    {
        $serviceId = $this->id;
        $formDate = strtotime($bookingDate);
        $selectedDay = date('w', $formDate);
        $splitDate = explode('-', $bookingDate);


        $selectedYear = $splitDate[0];
        $selectedMonth = $splitDate[1];
        $selectedDate = $splitDate[2];

        $opening_hours = new OpeningHourCollection(OpeningHour::where('business_id', '=', $this->business->id)->where('day', '=', $selectedDay)->orderBy('start', 'asc')->get());

        $holidays = new HolidayCollection(Holiday::where('service_id', '=', $serviceId)->where('holiday_date', '=', "{$bookingDate}")->get());

        $wholeDayHoliday = Holiday::where('service_id', '=', $serviceId)->where('holiday_date', '=', "{$bookingDate}")->where('whole_day', '=', true)->get();


        date_default_timezone_set('Asia/Hong_Kong');

        $x = $selectedDate + 1;
        $startDateTime = new \DateTime("{$bookingDate}");
        $endDateTime = new \DateTime("{$selectedYear}-{$selectedMonth}-{$x}");

        $bookings = new BookingCollection(Booking::where('service_id', '=', $serviceId)->where('booking_date', '>=', $startDateTime)->where('booking_date', '<=', $endDateTime)->get());

        $timeSlots = [];
        foreach ($opening_hours as $opening_hour) {
            $Data = $this->SplitTime($opening_hour->start, $opening_hour->end, $this->division);
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

            foreach ($timeSlots as $key => $timeSlot) {
                if (strtotime("{$selectedYear}-{$selectedMonth}-{$selectedDate} " . $timeSlot['start']) == strtotime($bookingStartTime)) {
                    $bookbook[] = ['start_time' => strtotime($bookingStartTime), 'time' => $bookingStartTime, 'slot' => $timeSlot];
                    $timeSlots[$key]['disabled'] = true;

                }
            }

        }

        return count($wholeDayHoliday) > 0 ? [] : $timeSlots;
    }


    protected function SplitTime($start, $end, $duration)
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
}
