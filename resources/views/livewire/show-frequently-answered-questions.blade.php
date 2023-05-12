<div class="container">
    <div class="row justify-content-center">
        <div class="card p-3 col-md-8">
            {{-- Care about people's approval and you will be their prisoner. --}}
            <div class="container">
                <div class="mb-3">
                    <input wire:model="keyword" class="form-control" type="text" id="keyword"
                           name="keyword" placeholder={{$business->lang=='zh'? "Search Keyword":"Search Keyword"}}>
                </div>
                <div class="mb-3">
                    <button type="button" class="form-control btn btn-outline-primary"
                            wire:click="search">{{$business->lang=='zh'?'搜尋':'Search'}}</button>
                </div>
                {{--        </div>--}}
                {{--    <button type="button" class="form-control" wire:click="test">Test</button>--}}
            </div>

            <div class="p-3 mt-5">
                {{--        <h3 class="mb-2">Customer Ticket Result</h3>--}}
{{--                <h5 class="mb-4">{{$result}}</h5>--}}
                {{--        <h4>{{$customer_email}}</h4>--}}
                {{--        <h4>{{$customer_password}}</h4>--}}

                @if($faqs)
{{--                    <h5 class="mb-4">{{$bookingTitle}}</h5>--}}
                    @foreach($faqs as $faq)
                        <div class="container pl-4 pr-4">
                            <div class="card p-5 mb-2">
                                <div class="card-body d-flex justify-content-start align-center">
                                    <div class="" style="padding-right: 50px">
{{--                                        <h4 class="mb-4">{{$business->lang=='zh'?'項目':'Service'}}--}}
{{--                                            : {{$booking->service->title}}</h4>--}}
                                        <p>{{$loop->index+1}}. {{$business->lang=='zh'?'問':'Q'}}: {{$faq->question}}</p>
                                        <p>{{$business->lang=='zh'?'答':'A'}}: {{$faq->answer}}</p>
{{--                                        <p>{{$business->lang=='zh'?'時間':'Timeslot'}}: {{$booking->booking_time}}</p>--}}
{{--                                        <p>{{$business->lang=='zh'?'訂單號碼':'Order Number'}}: {{$booking->order_num}}</p>--}}
                                    </div>
{{--                                    <div class="align-self-center pl-4">--}}
{{--                                        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(120)->backgroundColor(255,255,255)->generate($booking->order_num)!!}--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
