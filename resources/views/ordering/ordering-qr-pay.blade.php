<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$business->title}} {{$business->lang=='zh'?'下單歷史':'Ordering History'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
    @include("components.ordering-navbar",['business'=>$business,'si'=>$si])


    <div class="container mt-3 ">
        <div class="row justify-content-center mb-4">
            <h2 class="text-center mb-2">{{$business->lang=='zh'?'QR付款':'QR Payment'}}</h2>
            @if($table)
                <h3 class="text-center mb-2">桌號：{{$table->title}}</h3>
            @endif
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="card p-3 col-md-8">
                    <?php
                        $payme_code = $business->payme_code ?? "https://www.google.com.hk/";
                        $alipay_code = $business->alipay_code ?? "https://www.google.com.hk/";
                        $wechatpay_code = $business->wechatpay_code ?? "https://www.google.com.hk/";
                    ?>
                    <div class="flex-column row justify-content-center">
                        <div class="d-flex flex-column justify-content-center">
{{--                            <h2 class="text-center mb-4">Please Scan to Pay</h2>--}}
                            <div class="m-auto">
                                {{--                        @if($business->payme_code)--}}
                                {{--                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(255,255,255)->generate($business->payme_code)!!}--}}
                                {{--                        @endif--}}
                                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(255,255,255)->generate($payme_code)!!}

                                <h2 class="text-center mt-2">PayMe</h2>
                            </div>


{{--                            <h2 class="text-center mb-4">Please Scan to Pay</h2>--}}
                            <div class="m-auto">
                                {{--                        @if($business->alipay_code)--}}
                                {{--                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(255,255,255)->generate($business->alipay_code)!!}--}}
                                {{--                        @endif--}}
                                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(255,255,255)->generate($payme_code)!!}

                                <h2 class="text-center mt-2">Alipay</h2>
                            </div>

{{--                            <h2 class="text-center mb-4">Wechat Pay QR Code</h2>--}}
                            <div class="m-auto">
                                {{--                        @if($business->wechatpay_code)--}}
                                {{--                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(50)->backgroundColor(255,255,255)->generate($business->wechatpay_code)!!}--}}
                                {{--                        @endif--}}
                                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->backgroundColor(255,255,255)->generate($payme_code)!!}

                                <h2 class="text-center mt-2">Wechat Pay</h2>
                            </div>

                            {{--                        @case(null)--}}
                            {{--                        <h2 class="text-center">Please Select Payment Method</h2>--}}
                            {{--                        @break--}}
                            <a class="text-center" href="{{backpack_url('order')}}">返回</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @livewireScripts
</body>
</html>
