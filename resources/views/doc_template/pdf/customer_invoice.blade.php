@extends('doc_template.layouts.main')

@section('title',$title ." #" .date("YmdHi", strtotime($data->created_at)))
@section('body')

    <div class="information">
        <table width="100%">
            <tr>
                <td align="left" style="width: 40%;">
                    <h2 class="company_name">{{$curUser->business->name??""}}</h2>
                    <p class="company_address">Address: {{$curUser->business->address??""}}</p>
                    <p class="company_phone">Phone: {{$curUser->business->phone??""}}</p>
                    <p class="company_email">Email: {{$curUser->business->email??""}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <h1 class="template_title">{{$title ." #" .date("YmdHi", strtotime($data->created_at))}}</h1>
                </td>
                {{--                <td align="center">--}}
                {{--                    --}}{{--                <img src="/path/to/logo.png" alt="Logo" width="64" class="logo"/>--}}
                {{--                </td>--}}
                <td align="right" style="width: 40%;">
                    <h3 class="customer_name">To: {{ $data->customer->name ??""}}</h3>
                    {{--                    <p class="customer_address">Address: {{$data->customer->address??""}}</p>--}}
                    <p class="customer_phone">Phone: {{$data->customer->phone??""}}</p>
                    <p class="customer_email">Email: {{$data->customer->email??""}}</p>
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td style="width: 40%;">
                    {{--                    <p class="">Transaction Date: {{$data->transaction_date??""}}</p>--}}
                    <p class="">Payment Date: {{$data->payment_date??""}}</p>
                    <p class="">Payment Status: {{$data->payment_status??""}}</p>
                </td>
                <td align="right" style="width: 40%;">
                    {{--                    <p class="">Department: {{$data->department->title??""}}</p>--}}
                    {{--                    <p class="">Staff Name: {{$data->employee->name??""}}</p>--}}
                    {{--                    <p class="">Staff Position: {{$data->employee->position??""}}</p>--}}
                    {{--                    <p class="">Staff Email: {{$data->employee->email??""}}</p>--}}
                </td>
                {{--                <td style="width: 20%;"></td>--}}
            </tr>
        </table>
    </div>
    <br/>
    <div class="invoice">
        <h3>{{$title ." #" .date("YmdHi", strtotime($data->created_at))}} specification</h3>
        <table width="95%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Per Unit Price</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            {{--            @php--}}
            {{--                $items = json_decode($data->customer_items);--}}
            {{--                foreach ($items as $item){--}}

            {{--                echo "<tr>";--}}
            {{--                echo "<td>{{$item->item_title}}</td>";--}}

            {{--                echo "</tr>";--}}
            {{--                }--}}
            {{--            @endphp--}}
            @foreach($data->orderItems as $item)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$item->product_title??""}}</td>
                    <td>{{$item->quantity??""}}</td>
                    <td>{{$item->price??""}}</td>
                    <td>{{$item->total??""}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            @if($data->coupon_code)
                <tr class="template_conclusion">
                    <td colspan="4" style="text-align: right;">Coupon:</td>
                    <td class="gray">{{$data->coupon_code}}</td>
                </tr>
            @endif
            @if($data->discount)
                <tr class="template_conclusion">
                    <td colspan="4" style="text-align: right;">Discount:</td>
                    <td
                        class="gray">{{$data->discount_is_percentage?"$".$data->discount:$data->discount."%"}}</td>
                </tr>
            @endif
            <tr class="template_conclusion">
                <td colspan="4" style="text-align: right;">SubTotal:</td>
                <td class="gray">${{$data->subtotal}}</td>
            </tr>

            <tr class="template_conclusion">
                <td colspan="3" style="border: none;"></td>
                <td>Total</td>
                <td class="gray">${{$data->total??""}}</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div class="remark">
        <table>
            <tr>
                <td>Form of Payment:</td>
                <td>{{$data->payment_method??""}}</td>
            </tr>
            <tr>
                <td>Remark:</td>
                <td><p>{{$data->remark??""}}</p></td>
            </tr>
            <tr>
                <td>Printed:</td>
                <td>{{$dateTime}}</td>
            </tr>
        </table>
    </div>
@endsection
