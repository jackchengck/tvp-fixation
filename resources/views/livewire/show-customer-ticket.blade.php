<div class="container">
    <div class="row justify-content-center">
        <div class="card p-3 col-md-8">
            {{-- Care about people's approval and you will be their prisoner. --}}
            <div class="container">
                <div class="mb-3">
                    <label for="customer_email" class="form-label">{{$business->lang=='zh'?'電郵':'Customer Email'}} <span
                            style="color: red">*</span></label>
                    <input wire:model="customer_email" class="form-control" type="text" id="customer_email"
                           name="customer_email">
                </div>
                <div class="mb-3">
                    <label for="customer_password" class="form-label">{{$business->lang=='zh'?'密碼':'Customer Password'}}
                        <span
                            style="color: red">*</span></label>
                    <input wire:model="customer_password" class="form-control" type="text" id="customer_password"
                           name="customer_password">
                </div>


                <div class="mb-3">
                    <button type="button" class="form-control btn btn-outline-primary"
                            wire:click="search">{{$business->lang=='zh'?'進入':'Enter'}}</button>
                </div>
                {{--        </div>--}}
                {{--    <button type="button" class="form-control" wire:click="test">Test</button>--}}
            </div>

            <div class="p-3 mt-5">
                {{--        <h3 class="mb-2">Customer Ticket Result</h3>--}}
                <h5 class="mb-4">{{$result}}</h5>
                {{--        <h4>{{$customer_email}}</h4>--}}
                {{--        <h4>{{$customer_password}}</h4>--}}

                @if($customer)
                    <h5 class="mb-4">{{$business->lang=='zh'?'會員卡':'Membership Card'}}</h5>
                    <div class="card p-2 mb-2 membership-card">
                        <div class="card-body d-flex flex-column justify-content-center align-center">
                            <div class="d-flex flex-column flex-grow-1 justify-content-between mb-2"
                                 style="">
                                <div class="mb-2"
                                    {{--                                     style="width: 80px;height:80px;background: linear-gradient(to right,#fff,#eaeaea);border-radius: 40px;"--}}
                                >
                                    <h4 class="fw-bold ">{{$business->title}}</h4>

                                </div>
                                <div>
                                    {{--                                    <div>--}}

                                    {{--                                        <h4 class="">{{$business->lang=='zh'?'會員名稱':'Member Name'}}--}}
                                    {{--                                            : {{$customer_name}}</h4>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="d-flex flex-column">--}}
                                    {{--                                        <span>{{$business->lang=='zh'?'電郵':'Email'}}: {{$customer_email}}</span>--}}
                                    {{--                                        <span>{{$business->lang=='zh'?'到期日':'Expiry date:'}}: {{$expiry_date}}</span>--}}
                                    {{--                                    </div>--}}
                                </div>
                                {{--                            <p>{{$business->lang=='zh'?'日期':'Booking Date'}}: {{$booking->booking_date}}</p>--}}
                                {{--                            <p>{{$business->lang=='zh'?'時間':'Timeslot'}}: {{$booking->booking_time}}</p>--}}
                                {{--                            <p>{{$business->lang=='zh'?'訂單號碼':'Order Number'}}: {{$booking->order_num}}</p>--}}
                            </div>
                            <div class="d-flex flex-column d-sm-flex flex-sm-row justify-content-between">
                                <div class="d-flex flex-column justify-content-end">
                                    {{--                                    <span>{{$business->title}}</span>--}}
                                    <div>

                                        <h5 class="" onclick="showName()">{{$business->lang=='zh'?'會員名稱':'Member Name'}}
                                            : {{$customer->name}}</h5>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span
                                            onclick="showEmail()">{{$business->lang=='zh'?'電郵':'Email'}}: {{$customer->email}}</span>
                                        <span>{{$business->lang=='zh'?'到期日':'Expiry date:'}}: {{$expiry_date}}</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column pl-4 align-self-end">
                                    <div id="member_card_name_qr" style="display: none">
                                        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(50)->backgroundColor(134,239,172)->generate($customer->name)!!}
                                    </div>
                                    <div id="member_card_name_email">
                                        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(50)->backgroundColor(134,239,172)->generate($customer->email)!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="mb-4">{{$bookingTitle}}</h5>
                    @if($bookings)
                        @foreach($bookings as $booking)
                            <div class="container pl-4 pr-4">
                                <div class="card p-lg-5 mb-2">
                                    <div
                                        class="card-body d-flex flex-column d-sm-flex flex-sm-row justify-content-between align-center">
                                        <div class="d-flex flex-column pr-sm-5">
                                            <h4 class="mb-4">{{$business->lang=='zh'?'項目':'Service'}}
                                                : {{$booking->service->title}}</h4>
                                            <p class="">{{$business->lang=='zh'?'客戶':'Customer'}}
                                                : {{$booking->customer->name}}</p>
                                            <p class="">{{$business->lang=='zh'?'日期':'Booking Date'}}
                                                : {{$booking->booking_date}}</p>
                                            <p>{{$business->lang=='zh'?'時間':'Timeslot'}}: {{$booking->booking_time}}</p>
                                            <p>{{$business->lang=='zh'?'訂單號碼':'Order Number'}}
                                                : {{$booking->order_num}}</p>
                                        </div>
                                        <div class="d-flex flex-column align-self-center pl-4">
                                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(120)->backgroundColor(255,255,255)->generate($booking->order_num)!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endif

                @if($coupons)
                    <h5 class="mb-4">{{$couponTitle}}</h5>
                    @foreach($coupons as $coupon)
                        <div class="container pl-4 pr-4">
                            <div class="card p-lg-5 mb-2">
                                <div
                                    class="card-body d-flex flex-column d-sm-flex flex-sm-row align-center justify-content-between">
                                    <div class=" d-flex flex-column pr-sm-5  ">
                                        <h4 class="mb-4">{{$business->lang=='zh'?'優惠券':'Coupon'}}
                                            : {{$coupon->title}}</h4>
                                        <p>{{$business->lang=='zh'?'優惠碼':'Customer'}}: {{$coupon->code}}</p>
                                        <p>{{$business->lang=='zh'?'到期日':'Expiry Date'}}: {{$coupon->expiry_date}}</p>
                                        {{--                                        <p>{{$business->lang=='zh'?'時間':'Timeslot'}}: {{$booking->booking_time}}</p>--}}
                                        {{--                                        <p>{{$business->lang=='zh'?'訂單號碼':'Order Number'}}: {{$booking->order_num}}</p>--}}
                                    </div>
                                    <div class=" d-flex flex-column align-self-center pl-4">
                                        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(120)->backgroundColor(255,255,255)->generate($coupon->code)!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<style>
    .membership-card {
        background: #86efac;
        max-width: 500px;
    }
</style>

<script>
    function showName() {
        document.getElementById("member_card_name_qr").style.display = "block";
        document.getElementById("member_card_name_email").style.display = "none";
    }

    function showEmail() {
        document.getElementById("member_card_name_qr").style.display = "none";
        document.getElementById("member_card_name_email").style.display = "block";
    }
</script>
