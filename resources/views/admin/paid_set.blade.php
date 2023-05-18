<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3 ">
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="text-center mb-2">Food Order #{{$foodOrder->id}} Payment</h1>
                <div class="d-flex flex-column justify-content-center">
                    @switch($foodOrder->payment_method)

                        @case('payme')
                        <h2 class="text-center mb-4">Please Scan to Pay</h2>
                        <div class="pl-4 m-auto">
                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(255,255,255)->generate($foodOrder->business->payme_code)!!}
                            <h2 class="text-center mt-2">PayMe</h2>
                        </div>
                        @break


                        @case('alipay')
                        <h2 class="text-center mb-4">Please Scan to Pay</h2>
                        <div class="pl-4 m-auto">
                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(255,255,255)->generate($foodOrder->business->alipay_code)!!}
                            <h2 class="text-center mt-2">Alipay</h2>
                        </div>
                        @break

                        @case('wechatpay')
                        <h2 class="text-center mb-4">Wechat Pay QR Code</h2>
                        <div class="pl-4 m-auto">
                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(50)->backgroundColor(255,255,255)->generate($foodOrder->business->wechatpay_code)!!}
                            <h2 class="text-center mt-2">Wechat Pay</h2>
                        </div>
                        @break

                        @case(null)
                        <h2 class="text-center">Please Select Payment Method</h2>
                        @break
                    @endswitch
                </div>
            </div>
        </div>
    </div>
</body>
</html>
