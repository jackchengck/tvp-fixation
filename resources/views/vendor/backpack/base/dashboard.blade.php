@extends(backpack_view('blank'))

@php
    $widgets['after_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => trans('backpack::base.welcome'),
        'content'     => trans('backpack::base.use_sidebar'),
        'button_link' => backpack_url('logout'),
        'button_text' => trans('backpack::base.logout'),
    ];

    $widgets['after_content'][] = [
        'type'    => 'div',
        'class'   => 'row',
        'content' => [ // widgets
            [
                'type'=>'chart',
                'controller'=>\App\Http\Controllers\Admin\Charts\WeeklySalesChartController::class,
                'class' => 'card mb-2',
                'content' => [
                    'header' => 'Daily Sales',
                    //'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
                    ],

            ],
            [
                'type'=>'chart',
                'controller'=>\App\Http\Controllers\Admin\Charts\MonthlySalesChartController::class,
                'class' => 'card mb-2',
                'content' => [
                    'header' => 'Monthly Sales',
                    //'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
                    ],
            ],
        ]
    ];


    $widgets['after_content'][] = [
        'type'    => 'div',
        'class'   => 'row',
        'content' => [ // widgets
            [
                'type'=>'chart',
                'controller'=>\App\Http\Controllers\Admin\Charts\CustomerOccupationsChartController::class,
                'class' => 'card mb-2',
                'content' => [
                    'header' => 'Customer Occupations',
                    //'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
                    ],

            ],
            [
                'type'=>'chart',
                'controller'=>\App\Http\Controllers\Admin\Charts\CustomerAgeGroupsChartController::class,
                'class' => 'card mb-2',
                'content' => [
                    'header' => 'Customer Age Groups',
                    //'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
                    ],
            ],

            [
                'type'=>'chart',
                'controller'=>\App\Http\Controllers\Admin\Charts\CustomerDistrictsChartController::class,
                'class' => 'card mb-2',
                'content' => [
                    'header' => 'Customer Districts',
                    //'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
                    ],
            ],
        ]
    ];



   /* $widgets['after_content'][] = [
        'type'    => 'div',
        'class'   => 'row',
        'content' => [ // widgets
            [
                'type'=>'chart',
                'controller'=>\App\Http\Controllers\Admin\Charts\MonthlyTopFiveChartController::class,
                'class' => 'card mb-2',
                'content' => [
                    'header' => 'Monthly Top Five Sales',
                    //'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
                    ],
            ],
            [
                'type'=>'chart',
                'controller'=>\App\Http\Controllers\Admin\Charts\MonthlySalesChartController::class,
                'class' => 'card mb-2',
                'content' => [
                    'header' => 'Monthly Sales',
                    //'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
                    ],
            ],
        ]
    ];
   */
@endphp

@section('content')
    <?php
    $now = \Carbon\Carbon::now();

    $bookings = \App\Models\Booking::where('booking_date', \Carbon\Carbon::tomorrow())->get();

    ?>
    <main>

        @if($bookings)
            <div class="alert alert-success" id="tomorrow_reminder" role="alert">
                明日將會有以下預約到期 :
                @foreach($bookings as $booking)
                    {{--                    A simple info alert—check it out!--}}
                    <div class="fs-2">{{$booking->booking_time}} {{$booking->service->title}}
                        -- {{$booking->customer_name}}</div>
                @endforeach
            </div>
        @endif

        <style>
            @keyframes slideInFromTop {
                0% {
                    transform: translateY(-100%);
                }
                100% {
                    transform: translateY(0%);
                }

            }

            #tomorrow_reminder {
                /*background: blue;*/
                animation: 1.5s ease-out 0s 1 slideInFromTop;
            }
        </style>
    </main>

@endsection
