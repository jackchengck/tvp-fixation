@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => trans('backpack::base.welcome'),
        'content'     => trans('backpack::base.use_sidebar'),
        'button_link' => backpack_url('logout'),
        'button_text' => trans('backpack::base.logout'),
    ];

    $widgets['before_content'][] = [
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


    $widgets['before_content'][] = [
        'type'    => 'div',
        'class'   => 'row',
        'content' => [ // widgets
            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => '11.456',
                'description'   => 'Registered users.',
                'progress'      => 57, // integer
                'progressClass' => 'progress-bar bg-primary',
                'hint'          => '8544 more until next milestone.',
            ],
        ]
    ];
@endphp

@section('content')
    <p>Your custom HTML can live here</p>
    <?php

    ?>
@endsection
