<?php
$title = "Documents";
?>
@extends(backpack_view('blank'))
{{--@if(backpack_user()->can('view reports and docs'))--}}

{{--@section('title','Documents')--}}
{{--@else--}}

{{--    @section('title','Forbidden.')--}}

{{--@endif--}}

@php
    $export_formats = ['xlsx', 'csv', 'tsv', 'ods', 'xls'];
@endphp

@section('content')
    {{--    @if(backpack_user()->can('view reports and docs'))--}}
    <h1>All Documents</h1>
    <ul>
        <h2>PDFs</h2>
        <li>
            Daily Sales Statement
            <form action="{{ backpack_url('documents/daily_sales_statement_pdf') }}">
                <input type="date" name="date" required>
                <input type="submit" formtarget="_blank" value="Submit"/>
            </form>
        </li>
        <li>
            Monthly Sales Statement
            <form action="{{ backpack_url('documents/monthly_sales_statement_pdf') }}">
                <input type="month" name="date" required>
                <input type="submit" formtarget="_blank" value="Submit"/>
            </form>
        </li>

        <li>
            Monthly Employee Sales Records
            <form action="{{ backpack_url('documents/monthly_employee_sales_records_pdf') }}">
                <input type="month" name="date" required>
                <input type="submit" formtarget="_blank" value="Submit"/>
            </form>
        </li> <li>
            Monthly Employee Product Damaged Records
            <form action="{{ backpack_url('documents/monthly_employee_product_damaged_records_pdf') }}">
                <input type="month" name="date" required>
                <input type="submit" formtarget="_blank" value="Submit"/>
            </form>
        </li> <li>
            Monthly Employee Product Consumed Records
            <form action="{{ backpack_url('documents/monthly_employee_product_consumed_records_pdf') }}">
                <input type="month" name="date" required>
                <input type="submit" formtarget="_blank" value="Submit"/>
            </form>
        </li>
        <li>
            Monthly Top 5 Sales Products
            <form action="{{ backpack_url('documents/monthly_top_five_pdf') }}">
                <input type="month" name="date" required>
                <input type="submit" formtarget="_blank" value="Submit"/>
            </form>
        </li>
        <li>
            Monthly Trashed Inventories Records
            <form action="{{ backpack_url('documents/monthly_trashed_inventories_records_pdf') }}">
                <input type="month" name="date" required>
                <input type="submit" formtarget="_blank" value="Submit"/>
            </form>
        </li>
        <li>
            Monthly Damaged Inventories Records
            <form action="{{ backpack_url('documents/monthly_damaged_inventories_records_pdf') }}">
                <input type="month" name="date" required>
                <input type="submit" formtarget="_blank" value="Submit"/>
            </form>
        </li>

        <li>
            Monthly Booking Record List
            <form action="{{ backpack_url('documents/monthly_booking_record_list_pdf') }}">
                <input type="month" name="date" required>
                <input type="submit" formtarget="_blank" value="Submit"/>
            </form>
        </li>
        <li><a href="{{ backpack_url('documents/customer_list_pdf') }}">Customer List
            </a></li>
        {{--        <li><a href="{{ backpack_url('pdf_list/customer_list') }}">Customer List</a></li>--}}
        {{--        <li><a href="{{ backpack_url('pdf_list/employee_list') }}">Employee List</a></li>--}}

        {{--        <li><a href="{{ backpack_url('pdf_list/customer_list_categories') }}">Customer List by Categories</a></li>--}}

        {{--        <li><a href="{{ backpack_url('pdf_list/account_receivable_list_detail') }}">Account Receivable Statement--}}
        {{--                Detail</a>--}}
        {{--        </li>--}}
        {{--        <li><a href="{{ backpack_url('pdf_list/account_receivable_list_summary') }}">Account Receivable Statement--}}
        {{--                Summary</a>--}}
        {{--        </li>--}}
        {{--        <li><a href="{{ backpack_url('pdf_list/account_payable_list_detail') }}">Account Payable Statement--}}
        {{--                Detail</a></li>--}}
        {{--        <li><a href="{{ backpack_url('pdf_list/account_payable_list_summary') }}">Account Payable Statement--}}
        {{--                Summary</a>--}}
        {{--        </li>--}}
        {{--        <li><a href="{{ backpack_url('pdf_list/account_receivable_cheque_list_detail') }}">Account Cheque Receivable--}}
        {{--                Statement</a>--}}
        {{--        </li>--}}
        {{--        <li><a href="{{ backpack_url('pdf_list/sales_details') }}">Sales Detail</a></li>--}}
        {{--        <li><a href="{{ backpack_url('pdf_list/sales_summary') }}">Sales Summary</a></li>--}}
        {{--        <li><a href="{{ backpack_url('pdf_list/purchase_details') }}">Purchase Detail</a></li>--}}
        {{--        <li><a href="{{ backpack_url('pdf_list/purchase_summary') }}">Purchase Summary</a></li>--}}

        {{--        <li><a href="{{ backpack_url('pdf_list/bank_related_statement') }}">Bank Related Statements List</a></li>--}}
        {{--        <li><a href="{{ backpack_url('pdf_list/monthly_statement') }}">Monthly Statement</a></li>--}}
    </ul>
    <ul>
        <h2>PDFs</h2>

        <li>
            Daily Statement
            <form action="{{ backpack_url('documents/daily_statement_export') }}">
                <select name="export_format" required>
                    @foreach($export_formats as $exf)
                        <option value="{{$exf}}">{{$exf}}</option>
                    @endforeach
                </select>
                <input type="date" name="date" required>
                <input type="submit" formtarget="_blank" value="Submit"/>
            </form>
        </li>
        <li>
            Monthly Statement
            <form action="{{ backpack_url('documents/monthly_statement_export') }}">
                <select name="export_format" required>
                    @foreach($export_formats as $exf)
                        <option value="{{$exf}}">{{$exf}}</option>
                    @endforeach
                </select>
                <input type="month" name="date" required>
                <input type="submit" formtarget="_blank" value="Submit"/>
            </form>
        </li>
    </ul>
    {{--    TO BE SELECTABLE--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/monthly_statement') }}">Monthly Statement</a></li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/departmental_monthly_statement') }}">Departmental Monthly Statement</a></li>--}}

    {{--    <ul>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/fixed_assets_details') }}">Fixed Assets - Details</a></li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/fixed_assets_summary') }}">Fixed Assets - Summary</a></li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/fixed_assets_depreciation') }}">Fixed Assets - By Depreciation</a>--}}
    {{--        </li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/fixed_assets_geo') }}">Fixed Assets - By Geo</a></li>--}}
    {{--        --}}{{--        <li><a href="{{ backpack_url('pdf_list/asset_depreciation_details') }}">Declaration of asset depreciation details</a>--}}
    {{--        --}}{{--        </li>--}}
    {{--        --}}{{--        <li><a href="{{ backpack_url('pdf_list/depreciation_receipt') }}">Depreciation Receipt</a></li>--}}
    {{--        --}}{{--        <li><a href="{{ backpack_url('pdf_list/asset_depreciation_list') }}">Depreciation List</a></li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/fixed_assets_checklist') }}">Fixed Assets - Checklist</a></li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/canceled_depreciation_list') }}">Canceled Depreciation List</a></li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/taken_away_list') }}">Taken Away Fixed Assets List</a></li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/taken_away_checklist') }}">Taken Away Fixed Assets Checklist</a></li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/asset_activities') }}">Asset Activities</a></li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/asset_activities_summary') }}">Asset Activities Summary</a></li>--}}
    {{--    </ul>--}}
    {{--    <ul>--}}
    {{--        --}}{{--        <li><a href="{{ backpack_url('pdf_list/service_receipt') }}">Service Receipt</a></li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/service_receipt_list') }}">Service Receipt List</a></li>--}}
    {{--    </ul>--}}
    {{--    <ul>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/trial_balance') }}">Trial Balance</a></li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/income_statement') }}">Income Statement</a></li>--}}
    {{--        --}}{{--        <li><a href="{{ backpack_url('pdf_list/departmental_monthly_statement') }}">Departmental Monthly Statement</a></li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/balance_sheet') }}">Balance Sheet</a></li>--}}

    {{--        <li>--}}
    {{--            Monthly Statement--}}
    {{--            <form action="{{ backpack_url('pdf_list/monthly_statement') }}">--}}
    {{--                <input type="month" name="date" required>--}}
    {{--                <input type="submit" formtarget="_blank" value="Submit"/>--}}
    {{--            </form>--}}
    {{--        </li>--}}

    {{--        <li>--}}
    {{--            Departmental Monthly Statement--}}
    {{--            <form action="{{ backpack_url('documents/departmental_monthly_statement') }}">--}}
    {{--                --}}{{--                    <select name="departmentId" required>--}}
    {{--                --}}{{--                        @foreach(\App\Models\Department::all() as $department)--}}
    {{--                --}}{{--                            <option value="{{$department->id}}">{{$department->title}}</option>--}}
    {{--                --}}{{--                        @endforeach--}}
    {{--                --}}{{--                    </select>--}}
    {{--                <input type="month" name="date" required>--}}
    {{--                <input type="submit" formtarget="_blank" value="Submit"/>--}}
    {{--            </form>--}}
    {{--        </li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/chart_of_accounts') }}">Chart of Accounts</a></li>--}}
    {{--        <li><a href="{{ backpack_url('pdf_list/accounts_credit_list') }}">Accounts Credit List</a></li>--}}

    {{--    </ul>--}}
    {{--    @else--}}

    {{--        @php--}}
    {{--            $error_number = 403;--}}
    {{--        @endphp--}}

    {{--        <div class="row">--}}
    {{--            <div class="col-md-12 text-center">--}}
    {{--                <div class="error_number">--}}
    {{--                    <small>ERROR</small><br>--}}
    {{--                    {{ $error_number }}--}}
    {{--                    <hr>--}}
    {{--                </div>--}}
    {{--                <div class="error_title text-muted">--}}
    {{--                    @yield('title')--}}
    {{--                </div>--}}
    {{--                <div class="error_description text-muted">--}}
    {{--                    <small>--}}
    {{--                        @php--}}
    {{--                            $default_error_message = "Please <a href='javascript:history.back()''>go back</a> or return to <a href='".url('pdf_list/')."'>our homepage</a>.";--}}
    {{--                        @endphp--}}
    {{--                        {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}--}}
    {{--                    </small>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--    @endif--}}

@endsection

<style>
    .error_number {
        font-size: 156px;
        font-weight: 600;
        line-height: 100px;
    }

    .error_number small {
        font-size: 56px;
        font-weight: 700;
    }

    .error_number hr {
        margin-top: 60px;
        margin-bottom: 0;
        width: 50px;
    }

    .error_title {
        margin-top: 40px;
        font-size: 36px;
        font-weight: 400;
    }

    .error_description {
        font-size: 24px;
        font-weight: 400;
    }
</style>
