@extends(backpack_view('blank'))

<?php
	$payme_code = $business->payme_code;
	$alipay_code = $business->alipay_code;
	$wechatpay_code = $business->wechatpay_code;

?>

@section('content')
	<a href="{{backpack_url('order')}}">< Back </a>
	<div class="container mt-3 ">
		<div class="container">
			<div class="flex-column row justify-content-center">
				<h1 class="text-center mb-4">QR Payment</h1>
				<div class="d-flex flex-column justify-content-center">
					<h2 class="text-center mb-4">Please Scan to Pay</h2>
					<div class="m-auto p-2">
						{{--                        @if($business->payme_code)--}}
						{{--                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(255,255,255)->generate($business->payme_code)!!}--}}
						{{--                        @endif--}}
						@if($payme_code)
							{!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(255,255,255)->generate($payme_code)!!}
						@endif

						<h2 class="text-center mt-2">PayMe</h2>
					</div>


					<h2 class="text-center mb-4">Please Scan to Pay</h2>
					<div class="m-auto p-2">
						{{--                        @if($business->alipay_code)--}}
						{{--                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(255,255,255)->generate($business->alipay_code)!!}--}}
						{{--                        @endif--}}
						@if($alipay_code)
							{!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(255,255,255)->generate($alipay_code)!!}
						@endif

						<h2 class="text-center mt-2">Alipay</h2>
					</div>

					<h2 class="text-center mb-4">Wechat Pay QR Code</h2>
					<div class="m-auto p-2">
						{{--                        @if($business->wechatpay_code)--}}
						{{--                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(50)->backgroundColor(255,255,255)->generate($business->wechatpay_code)!!}--}}
						{{--                        @endif--}}
						@if($wechatpay_code)
							{!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(255,255,255)->generate($wechatpay_code)!!}
						@endif

						<h2 class="text-center mt-2">Wechat Pay</h2>
					</div>

					{{--                        @case(null)--}}
					{{--                        <h2 class="text-center">Please Select Payment Method</h2>--}}
					{{--                        @break--}}
					<a class="text-center" href="{{backpack_url('order')}}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
