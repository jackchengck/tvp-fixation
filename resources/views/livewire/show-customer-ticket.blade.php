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

                @if($bookings)
                    @foreach($bookings as $booking)
                        <div class="container pl-4 pr-4">
                            <div class="card p-5 mb-2">
                                <div class="card-body d-flex justify-content-center align-center">
                                    <div class="" style="padding-right: 50px">
                                        <h4 class="mb-4">{{$business->lang=='zh'?'項目':'Service'}}
                                            : {{$booking->service->title}}</h4>
                                        <p>{{$business->lang=='zh'?'客戶':'Customer'}}: {{$booking->customer_name}}</p>
                                        <p>{{$business->lang=='zh'?'日期':'Booking Date'}}: {{$booking->booking_date}}</p>
                                        <p>{{$business->lang=='zh'?'時間':'Timeslot'}}: {{$booking->booking_time}}</p>
                                        <p>{{$business->lang=='zh'?'訂單號碼':'Order Number'}}: {{$booking->order_num}}</p>
                                    </div>
                                    <div class="align-self-center pl-4">
                                        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(120)->backgroundColor(255,255,255)->generate($booking->order_num)!!}
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
