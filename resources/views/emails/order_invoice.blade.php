<div>
    <div>
        Dear {{$order->customer->name}}:
    </div>
    <br>
    <div>
        Order #{{$order->order_num}} created for {{$order->business->title}}
    </div>
    <br>
    {{--    <div>--}}
    {{--        Service: {{$booking->service->title}}--}}
    {{--    </div>--}}
    {{--    <div>--}}
    {{--        Order Number: {{$booking->order_num}}--}}
    {{--    </div>--}}
    {{--    <div>--}}
    {{--        Booking date: {{$booking->booking_date}}--}}
    {{--    </div>--}}
    {{--    <div>--}}
    {{--        Booking Time: {{$booking->booking_time}}--}}
    {{--    </div>--}}
    <br>
    <div>
        Order {{$type}} attached.
    </div>
    {{--    <div>--}}
    {{--        Email: {{$booking->customer_email}}--}}
    {{--    </div>--}}
    {{--    <div>--}}
    {{--        Password: {{$booking->customer_password}}--}}
    {{--    </div>--}}
    <br>
    <div>
        Thank you.
    </div>
</div>

<?php>

