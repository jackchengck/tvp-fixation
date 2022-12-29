<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$business->title}} {{$business->lang=='zh'?'取得預約劵':'Get Ticket Now'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
    @include("components.navbar",['business'=>$business,'si'=>$si])
    <div class="container mt-3 ">

        <div class="row justify-content-center mb-4">
            <h2 class="text-center mb-2">{{$business->lang=='zh'?'取得預約劵':'Get Ticket Now'}}</h2>
        </div>
        <livewire:show-customer-ticket :business="$business"/>
    </div>

    <?php

    ?>

    @livewireScripts
</body>
</html>
