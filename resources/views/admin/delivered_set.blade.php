@extends(backpack_view('blank'))

@section('content')
    <a href="{{backpack_url('food-order')}}">< Back </a>
    <div class="container mt-3 ">
        <div class="container">
            <div class="flex-column row justify-content-center">
                <h1 class="text-center mb-4">Food Order #{{$foodOrder->id}} Delivered</h1>
                <a class="text-center" href="{{backpack_url('food-order')}}">Back</a>

            </div>
        </div>
    </div>
@endsection
