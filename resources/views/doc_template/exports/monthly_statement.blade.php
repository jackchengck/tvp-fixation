@extends('doc_template.layouts.main')

@section('title',$title ." " .date('YmdHi'))
@section('body')

    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;" colspan="9">
                <h2 class="company_name">{{$curUser->business->title}}</h2>
            </td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><p class="company_address">{{$curUser->business->address}}</p></td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td>  <p class="company_phone"> {{$curUser->business->phone}}</p></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><p class="company_email"> {{$curUser->business->email}}</p></td>
        </tr>
        <tr>
            <td colspan="9">
                <h1 class="template_title">{{$title ." " .date('YmdHi')}}</h1>
            </td>
        </tr>
        <tr>
            <td colspan="9">
                <h3>{{ $title }} {{$year}}-{{$month}} Specification</h3>
            </td>
        </tr>
        {{--        <table width="95%">--}}

        {{--        <thead>--}}
        <tr>
            <th colspan="9"><b>Records </b></th>
        </tr>
        {{--        </thead>--}}
        @foreach($inventory_logs as $log)
            <thead>
            <tr>
                <th colspan="9"><b>{{"Logs" ." #" .date("YmdHi", strtotime($log->created_at))}} </b></th>
            </tr>
            <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Type</th>
                <th>Item</th>
                <th>Location</th>
                <th>Handle By</th>
                <th>Quantity</th>
                <th>Per Unit Price</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            {{--                @foreach(json_decode($log->supplier_items) as $item)--}}
            <tr>
                <td>{{$loop->index+1}}</td>
                <td><p>{{$log->created_at}}</p></td>
                <td><p>{{$log->type}}</p></td>
                <td>{{$log->product->title}}</td>
                <td>{{$log->location->title}}</td>
                <td>{{$log->user->name}}</td>
                <td>{{abs($log->quantity)}}</td>
                <td>$ {{$log->product->price}}</td>

                <td>{{($log->type=='move_in'||$log->type=='move_out'?"[":null)}}
                    $ {{$log->product->price*($log->quantity)*($log->type=='sold'?-1:1)}}{{($log->type=='move_in'||$log->type=='move_out'?"]":null)}}</td>
            </tr>
            {{--                @endforeach--}}
            </tbody>
            {{--                <tfoot>--}}
            {{--                <tr class="template_conclusion">--}}
            {{--                    --}}{{--                <td colspan="6" style="border: none;"></td>--}}
            {{--                    <td align="left" colspan="7" style="text-align: right;">Subtotal</td>--}}
            {{--                    <td align="left" class="gray">${{$invoice->total_amount}}</td>--}}
            {{--                </tr>--}}
            {{--                </tfoot>--}}
        @endforeach
        <tfoot>
        <tr class="template_conclusion">
            <td align="left" colspan="8" style="text-align: right;"> Move In</td>
            <td align="left" class="gray">@php
                    $total =0;
                    foreach ($inventory_logs as $log){
                        if($log->type=='move_in'){
                            $total+=$log->product->price*($log->quantity)*($log->type=='move_in'?1:-1);
                        }
                    }
                    echo "$".$total;
                @endphp</td>
        </tr>
        <tr class="template_conclusion">
            <td align="left" colspan="8" style="text-align: right;"> Move Out</td>
            <td align="left" class="gray">@php
                    $total =0;
                    foreach ($inventory_logs as $log){
                        if($log->type=='move_out'){
                            $total+=$log->product->price*($log->quantity)*($log->type=='move_in'?1:-1);
                        }
                    }
                    echo "$".$total;
                @endphp</td>
        </tr>
        <tr class="template_conclusion">
            <td align="left" colspan="8" style="text-align: right;"> Total</td>
            <td align="left" class="gray">@php
                    $total =0;
                    foreach ($inventory_logs as $log){
                        if($log->type=='damaged'||$log->type=='consume'||$log->type=='sold'){
                            $total+=$log->product->price*($log->quantity)*($log->type=='sold'?-1:1);
                        }
                       // $total+=$invoice->total_amount;
                    }
                    echo "$".$total;
                @endphp</td>
        </tr>
        </tfoot>
        {{--        </table>--}}
        <tr>
            <td>Printed:</td>
            <td>{{$dateTime}}</td>
        </tr>
    </table>

@endsection
