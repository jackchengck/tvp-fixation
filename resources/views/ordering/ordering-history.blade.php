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
            <h2 class="text-center mb-2">{{$business->lang=='zh'?'下單歷史':'Ordering History'}}</h2>
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
                    @if($foodOrders)
                            <?php
                            $statusArr = [
                                'preparing' => '準備中',
                                'delivered' => '已出餐',
                                'paid'      => '已結帳',
                            ];
                            ?>
                        @foreach($foodOrders as $foodOrder)
                            <div class="card p-3 col-md-8 my-3 mx-auto">
                                <div class="row row-cols-3 mb-3" style="border-bottom: 1px #0000001A solid;">
                                    <div class="col">
                                        <span>下單時間 : {{$foodOrder->created_at}} </span>
                                    </div>

                                    <div class="col">
                                        <span>枱號 : {{$foodOrder->table->title}} </span>
                                    </div>

                                    <div class="col">
                                        <p class="" style="text-align: right">狀態
                                            : {{$statusArr[$foodOrder->status]}} </p>
                                    </div>
                                </div>
                                <div>
                                    @foreach($foodOrder->foodOrderItems as $foodOrderItem)
                                        <div
                                            style="display:flex;flex:1;flex-direction: row;justify-content:space-between">
                                            <div>{{$foodOrderItem->dish->title}}</div>
                                            <div>
                                                <span>${{$foodOrderItem->dish->price}}</span><span> x {{$foodOrderItem->quantity}}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach


                        <div class="col-md-12 text-center py-2">
                            <a href="{{url('/ordering/'.$table->id.'/qr-code')}}" class="btn btn-primary py-3 px-5"
                            >櫃枱結帳</a>
                        </div>

                        <div class="col-md-12 text-center py-2">
                            <a class="btn btn-primary py-3 px-5" href="{{ url('/ordering/'.$table->id.'/qr-pay') }}">QR付款</a>
                        </div>

                    @endif
                </div>
            </div>
        </div>

    </div>

    @livewireScripts
</body>
</html>
