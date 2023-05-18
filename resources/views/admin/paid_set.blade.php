@extends(backpack_view('blank'))

@section('content')
    <a href="{{backpack_url('food-order')}}">< Back </a>
    <div class="container mt-3 ">
        <div class="container">
            <div class="flex-column row justify-content-center">
                <h1 class="text-center mb-4">Food Order #{{$foodOrder->id}} Payment</h1>
                <div class="d-flex flex-column justify-content-center">
                    @switch($foodOrder->payment_method)
                        @case('payme')
                        <h2 class="text-center mb-4">Please Scan to Pay</h2>
                        <div class="m-auto">
                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(255,255,255)->generate($foodOrder->business->payme_code)!!}
                            <h2 class="text-center mt-2">PayMe</h2>
                        </div>
                        @break


                        @case('alipay')
                        <h2 class="text-center mb-4">Please Scan to Pay</h2>
                        <div class="m-auto">
                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(255,255,255)->generate($foodOrder->business->alipay_code)!!}
                            <h2 class="text-center mt-2">Alipay</h2>
                        </div>
                        @break

                        @case('wechatpay')
                        <h2 class="text-center mb-4">Wechat Pay QR Code</h2>
                        <div class="m-auto">
                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(50)->backgroundColor(255,255,255)->generate($foodOrder->business->wechatpay_code)!!}
                            <h2 class="text-center mt-2">Wechat Pay</h2>
                        </div>
                        @break

                        @case(null)
                        <h2 class="text-center">Please Select Payment Method</h2>
                        @break
                    @endswitch
                    <a class="text-center" href="{{backpack_url('food-order')}}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
