<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$business->title}} Booking Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
    @include("components.navbar",['business'=>$business,'si'=>$si])
    <div class="container mt-3 ">
        <div class="row justify-content-center mb-4">
            <h2 class="text-center mb-2">Booking Form</h2>
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="card p-3 col-md-8">
                    <form name="add-booking-post-form" id="add-booking-post-form" method="post"
                          action="{{url('store-booking')}}">
                        @csrf
                        <div class="container  pt-3">
                            <div class="mb-3">
                                <label for="order_num" class="form-label">Order Number <span
                                        style="color: red">*</span></label>
                                <input class="form-control" type="text" id="order_num" name="order_num">
                            </div>
                            <div class="mb-3">
                                <label for="customer_name" class="form-label">Customer Name <span
                                        style="color: red">*</span></label>
                                <input class="form-control" type="text" id="customer_name" name="customer_name">
                            </div>
                            <div class="mb-3">
                                <label for="customer_email" class="form-label">Customer Email <span
                                        style="color: red">*</span></label>
                                <input class="form-control" type="text" id="customer_email" name="customer_email">
                            </div>
                            <div class="mb-3">
                                <label for="customer_phone" class="form-label">Customer Phone <span
                                        style="color: red">*</span></label>
                                <input class="form-control" type="text" id="customer_phone" name="customer_phone">
                            </div>
                            <div class="mb-3">
                                <label for="customer_password" class="form-label">Customer Password <span
                                        style="color: red">*</span></label>
                                <input class="form-control" type="text" id="customer_password" name="customer_password">
                            </div>
                            <livewire:show-timeslots :business="$business"/>
                            <input type="submit" class="form-control mb-5">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts
</body>
</html>
