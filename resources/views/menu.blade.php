<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$business->title}} {{$business->lang=='zh'?'客戶':'Questionnaire'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
    @include("components.navbar",['business'=>$business,'si'=>$si])

    <div class="container mt-3 ">
        <div class="row justify-content-center mb-4">
            <h2 class="text-center mb-2">{{$business->lang=='zh'?'其他':'Menu'}}</h2>
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

            <div class="container">
                <div class="row my-3">
                    <div class="col"></div>
                    <div class="col">
                        <div class="navbar bg-body-tertiary mb-2">
                            <div class="container-fluid justify-content-center">
                                <a class="navbar-brand link-primary"  href="/survey">{{$business->lang=='zh'?'客戶跟進表':'Customer Follow up Questionnaire'}}</a>
                            </div>

                        </div>
                        <div class="navbar bg-body-tertiary">
                            <div class="container-fluid justify-content-center">
                                <a class="navbar-brand link-primary" href="/faqs">{{$business->lang=='zh'?'FAQs':'FAQs'}}</a>
                            </div>
                        </div></div>
                    <div class="col"></div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
