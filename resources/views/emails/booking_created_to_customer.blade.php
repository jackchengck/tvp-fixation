<div>
    <div>
        Dear {{$booking->customer_name}}:
    </div>
    <br>
    <div>
        Booking created for {{$booking->business->title}}
    </div>
    <br>
    <div>
        Service: {{$booking->service->title}}
    </div>
    <div>
        Order Number: {{$booking->order_num}}
    </div>
    <div>
        Booking date: {{$booking->booking_date}}
    </div>
    <div>
        Booking Time: {{$booking->booking_time}}
    </div>
    <br>
    <div>
        Please use your email and password to retrieve.
    </div>
    <div>
        Email: {{$booking->customer_email}}
    </div>
    <div>
        Password: {{$booking->customer_password}}
    </div>
    <br>
    <div>
        Thank you.
    </div>
</div>

<?php>

