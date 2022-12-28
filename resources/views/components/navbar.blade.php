

<div class="container">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand mb-0 h1" href="#">{{$business->title}} {{$si->title}}</a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="/booking">{{$business->lang=='zh'?'預約':'Create Booking'}}</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary" href="/get-ticket">{{$business->lang=='zh'?'取得預約卷':'Get Ticket'}}</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
