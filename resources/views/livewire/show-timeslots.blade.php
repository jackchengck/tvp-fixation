{{--<div class="container">--}}
<div>
    <div class="mb-3">
        <label for="service" class="form-label">Select Services <span
                style="color: red">*</span></label>
        <select wire:model="serviceSelected" name="service" id="service" class="form-select">
            <option selected disabled>Please select a service</option>
            @foreach($business->services as $service)
                <option value="{{$service->id}}">{{$service->title}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="booking_date" class="form-label">Select a Date <span
                style="color: red">*</span></label>
        <input wire:model="bookingDate" class="form-control" type="date" id="booking_date" name="booking_date">
    </div>


    <?php
    $service = \App\Models\Service::find($serviceSelected);
    //    if ($bookingDate) {
    //        dd($service->getBookingSlots($bookingDate));
    //    }
    ?>
    {{--    <h4>{{$serviceSelected}}</h4>--}}


    <div class="mb-3">
        <label for="service" class="form-label">Select a Timeslot <span
                style="color: red">*</span></label>
        <select name="timeslot" id="timeslot" class="form-select">
            @if($serviceSelected&&$bookingDate)
                <option selected disabled>Please select a timeslot</option>
                @foreach($service->getBookingSlots($bookingDate) as $timeslot)
                    @if(!$timeslot['disabled'])
                        <option
                            {{$timeslot['disabled']=='true'?disabled:null}} value="{{$timeslot['start']}}">{{$timeslot['start']}}
                            ~ {{$timeslot['end']}} {{$timeslot['disabled']}}</option>
                    @endif
                @endforeach
            @else
                <option selected disabled>Please select a date first</option>
            @endif

        </select>
    </div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
</div>
