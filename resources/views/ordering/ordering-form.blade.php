<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$business->title}} {{$business->lang=='zh'?'即時下單':'Quick Ordering'}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
    @include("components.ordering-navbar",['business'=>$business,'si'=>$si])
    <div class="container mt-3 ">
        <div class="row justify-content-center mb-4">
            <h2 class="text-center mb-2">{{$business->lang=='zh'?'即時下單':'Quick Ordering'}}</h2>
            @if($table)
                <h3 class="text-center mb-2">桌號：{{$table->title}}</h3>
                {{--            <div class="col">--}}

                <div class="col-md-8">
                    <div class="col-md-12 text-center">
                        <a class="btn nav-link btn-outline-primary p-3 mx-5 my-2"
                           href={{"/ordering/".$table->id."/history"}}>{{$business->lang=='zh'?'查看下單歷史':'Ordering History'}}</a>
                    </div>
                </div>
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
                    <form action="{{'/ordering/'.$table->id}}" method="post">
                        {{csrf_field()}}
                        <div class="row row-cols-2">
                            {{--                    @if($tables)--}}
                            @foreach($dishes as $dish)
                                <div class="col mb-3">
                                    <div class="card p-4 my-2">
                                        <h2 class="mb-3">{{$dish->title}}</h2>
                                        <div class="row">
                                            <div class="col-md-8">
                                                @if($dish->image)
                                                    <img class="img-fluid" src="{{url($dish->image)}}"
                                                         alt="dish image"/>
                                                @endif
                                            </div>
                                        </div>
                                        <p>{{$dish->description}}</p>
                                        <div>
                                            <h3>$ {{$dish->price}}</h3>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">下單數量：</label>
                                            <input class="form-control"
                                                   name="{{$dish->id}}"
                                                   type="number" step="1"
                                                   min="0">
                                        </div>
                                        {{--                            <a href="{{ url('/ordering/'.$table->id) }}">{{$table->title}}</a>--}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary py-3 px-5" type="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

    @livewireScripts
</body>
</html>
