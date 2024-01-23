<div>
    <div>
        From {{$instantMessage->business->title}}
    </div>
    <br>
    <div>
        <a href="{{$url}}">To Chatroom</a>
        {{--        Order ${{$booking->order_num}} created for {{$booking->business->title}}--}}
        {{--        {{$instantMessage->}}--}}
    </div>
    <br>
    <h1>Content:</h1>
    <p>{{$instantMessage->content??"No Word Content"}}</p>
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
        {{--        Delivery Status changed from {{$order->payment_status}} to {{$new_status}}--}}
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

<?
	php >

