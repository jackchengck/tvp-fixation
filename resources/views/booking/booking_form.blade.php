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
</head>
<body>
    @include("components.navbar",['business'=>$business,'si'=>$si])
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand mb-0 h1" href="#">{{$business->title}} {{$si->title}}</a>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link actived" href="/booking">Create Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-secondary" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container">

    </div>

    <?php
    //    dd($business);
    //    dd($business->services);

    //    dd($domain, $si, $business);
    //    dd($si);
    //    dd()
    ?>

    {{--    {{$domain}}--}}

    {{--    {{$si->title}}--}}

    {{--    {{$business->title}}--}}

</body>
</html>
