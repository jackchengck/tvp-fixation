@extends('doc_template.layouts.main')

@section('title',$title ." " .date('YmdHi'))
@section('body')

    <div class="information">
        <table width="100%">
            <tr>
                <td align="left" style="width: 40%;">
                    <h2 class="company_name">{{$curUser->business->title}}</h2>
                    <p class="company_address">Address: {{$curUser->business->address}}</p>
                    <p class="company_phone">Phone: {{$curUser->business->phone}}</p>
                    <p class="company_email">Email: {{$curUser->business->email}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <h1 class="template_title">{{$title ." " .date('YmdHi')}}</h1>
                </td>
                {{--                <td align="center">--}}
                {{--                    --}}{{--                <img src="/path/to/logo.png" alt="Logo" width="64" class="logo"/>--}}
                {{--                </td>--}}
                <td align="right" style="width: 40%;">
                    {{--                    <h3 class="supplier_name">To: {{ $supplier->name }}</h3>--}}
                    {{--                    <p class="supplier_address">Address: {{$supplier->address}}</p>--}}
                    {{--                    <p class="supplier_phone">Phone: {{$supplier->phone}}</p>--}}
                    {{--                    <p class="supplier_email">Email: {{$supplier->email}}</p>--}}
                </td>
            </tr>
        </table>
        {{--        <table width="100%">--}}
        {{--            <tr>--}}
        {{--                <td style="width: 40%;">--}}
        {{--                    <p class="">Transaction Date: {{$data->transaction_date}}</p>--}}
        {{--                    <p class="">Payment Date: {{$data->payment_date}}</p>--}}
        {{--                    <p class="">Payment Status: {{$data->payment_status}}</p>--}}
        {{--                </td>--}}
        {{--                <td align="right" style="width: 40%;">--}}
        {{--                    <p class="">Department: {{$data->department->title}}</p>--}}
        {{--                    <p class="">Staff Name: {{$data->employee->name}}</p>--}}
        {{--                    <p class="">Staff Position: {{$data->employee->position}}</p>--}}
        {{--                    <p class="">Staff Email: {{$data->employee->email}}</p>--}}
        {{--                </td>--}}
        {{--                <td style="width: 20%;"></td>--}}
        {{--            </tr>--}}
        {{--        </table>--}}
    </div>
    <br/>
    <div class="invoice">
        <h3>{{ $title }} {{$year}}-{{$month}} Specification</h3>
        <table width="95%">

            <thead>
            <tr>
                <th colspan="8"><b>Sales </b></th>
            </tr>
            </thead>
            @foreach($user_inventory_logs as $user_logs)
                <thead>
                <tr>
                    <th colspan="8"><b>{{"User" ." - ". $user_logs->name}} </b></th>
                </tr>
                </thead>

                @foreach($user_logs->inventoryLogs as $log)
                    <thead>
                    <tr>
                        <th colspan="8"><b>{{"Sales Logs" ." #" .date("YmdHi", strtotime($log->created_at))}}
                                {{$log->id}} </b></th>
                    </tr>
                    <tr>
                        <th>Id</th>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Location</th>
                        <th>Handle By</th>
                        <th>Quantity</th>
                        <th>Per Unit Price</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--                    @foreach(json_decode($invoice->supplier_items) as $item)--}}
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td><p>{{$log->created_at}}</p></td>
                        <td>{{$log->product->title}}</td>
                        <td>{{$log->location->title}}</td>
                        <td>{{$log->user->name}}</td>
                        <td>{{-($log->quantity)}}</td>
                        <td>$ {{$log->product->price}}</td>
                        <td>$ {{$log->product->price*(-$log->quantity)}}</td>
                    </tr>
                    {{--                    @endforeach--}}
                    </tbody>
                    {{--                                                    <tfoot>--}}
                    {{--                                                    <tr class="template_conclusion">--}}
                    {{--                                                        <td colspan="6" style="border: none;"></td>--}}
                    {{--                                                        <td align="left" colspan="7" style="text-align: right;">Subtotal</td>--}}
                    {{--                                                        <td align="left" class="gray">${{$invoice->total_amount}}</td>--}}
                    {{--                                                    </tr>--}}
                    {{--                                                    </tfoot>--}}
                @endforeach
                <tfoot>
                <tr class="template_conclusion">
                    <td align="left" colspan="7" style="text-align: right;">Monthly Sales Total</td>
                    <td align="left" class="gray">@php
                            $total =0;
                            foreach ($user_logs->inventoryLogs as $log){
                                $total+=$log->product->price*(-$log->quantity);
                            }
                            echo "$ ".$total;
                        @endphp</td>
                </tr>
                </tfoot>
            @endforeach
        </table>
        {{--        <table width="95%">--}}
        {{--            <thead>--}}
        {{--            <tr>--}}
        {{--                <th colspan="8"><b>Customer Invoices </b></th>--}}
        {{--            </tr>--}}
        {{--            </thead>--}}
        {{--            @foreach($cI as $invoice)--}}
        {{--                <thead>--}}
        {{--                <tr>--}}
        {{--                    <th colspan="8"><b>{{"Invoice" ." #" .date("YmdHi", strtotime($invoice->created_at))}} </b></th>--}}
        {{--                </tr>--}}
        {{--                <tr>--}}
        {{--                    <th>Id</th>--}}
        {{--                    <th>Item</th>--}}
        {{--                    <th>Description</th>--}}
        {{--                    <th>Currency</th>--}}
        {{--                    <th>EXR</th>--}}
        {{--                    <th>Quantity</th>--}}
        {{--                    <th>Per Unit Price</th>--}}
        {{--                    <th>Amount</th>--}}
        {{--                </tr>--}}
        {{--                </thead>--}}
        {{--                <tbody>--}}
        {{--                @foreach(json_decode($invoice->customer_items) as $item)--}}
        {{--                    <tr>--}}
        {{--                        <td>{{$loop->index+1}}</td>--}}
        {{--                        <td>{{$item->item_title}}</td>--}}
        {{--                        <td><p>{{$item->item_description}}</p></td>--}}
        {{--                        <td>{{$item->item_currency}}</td>--}}
        {{--                        <td>{{$item->item_exchange_rate}}</td>--}}
        {{--                        <td>{{$item->item_quantity}}</td>--}}
        {{--                        <td>{{$item->item_price}}</td>--}}
        {{--                        <td>{{$item->item_amount}}</td>--}}
        {{--                    </tr>--}}
        {{--                @endforeach--}}
        {{--                </tbody>--}}
        {{--                <tfoot>--}}
        {{--                <tr class="template_conclusion">--}}
        {{--                    --}}{{--                <td colspan="6" style="border: none;"></td>--}}
        {{--                    <td align="left" colspan="7" style="text-align: right;">Subtotal</td>--}}
        {{--                    <td align="left" class="gray">${{$invoice->total_amount}}</td>--}}
        {{--                </tr>--}}
        {{--                </tfoot>--}}
        {{--            @endforeach--}}
        {{--            <tfoot>--}}
        {{--            <tr class="template_conclusion">--}}
        {{--                <td align="left" colspan="7" style="text-align: right;">Customer Invoices Total</td>--}}
        {{--                <td align="left" class="gray">@php--}}
        {{--                        $total =0;--}}
        {{--                        foreach ($cI as $invoice){--}}
        {{--                            $total+=$invoice->total_amount;--}}
        {{--                        }--}}
        {{--                        echo "$".$total;--}}
        {{--                    @endphp</td>--}}
        {{--            </tr>--}}
        {{--            </tfoot>--}}

        {{--            <tfoot>--}}
        {{--            --}}{{--            <tr class="template_conclusion">--}}
        {{--            --}}{{--                <td align="left" colspan="7" style="text-align: right;">Total</td>--}}
        {{--            --}}{{--                <td align="left" class="gray">@php--}}
        {{--            --}}{{--                        $total =0;--}}
        {{--            --}}{{--                        foreach ($cI as $invoice){--}}
        {{--            --}}{{--                            $total+=$invoice->total_amount;--}}
        {{--            --}}{{--                        }--}}
        {{--            --}}{{--                        foreach ($sI as $invoice){--}}
        {{--            --}}{{--                            $total+=$invoice->total_amount;--}}
        {{--            --}}{{--                        }--}}
        {{--            --}}{{--                        echo "$".$total;--}}
        {{--            --}}{{--                    @endphp</td>--}}
        {{--            --}}{{--            </tr>--}}
        {{--            --}}{{--            </tfoot>--}}
        {{--        </table>--}}
        {{--    </div>--}}
        <div class="remark">
            <table>
                {{--            <tr>--}}
                {{--                <td>Form of Payment:</td>--}}
                {{--                <td>{{$invoice->form_of_payment}}</td>--}}
                {{--            </tr>--}}
                {{--            <tr>--}}
                {{--                <td>Remark:</td>--}}
                {{--                <td><p>{{$invoice->remark}}</p></td>--}}
                {{--            </tr>--}}
                <tr>
                    <td>Printed:</td>
                    <td>{{$dateTime}}</td>
                </tr>
            </table>
        </div>
@endsection
