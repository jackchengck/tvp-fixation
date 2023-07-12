@extends(backpack_view('blank'))


@section('content')
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <h2 class="mt-4 mb-2">Send Custom Email</h2>

        <div id="form" class="container">
            <form action="/admin/mail/send-custom-email" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Xxxxx">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                    <textarea class="ckeditor form-control" id="content" rows="8" name="content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="mb-5"></div>
    </div>

@endsection
{{--@sc--}}
@push('after_scripts')

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

@endpush
