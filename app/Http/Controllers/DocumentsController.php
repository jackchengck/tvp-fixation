<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CustomerInvoice;
use App\Models\InventoryLog;
use App\Models\SupplierInvoice;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    //
    public function viewDocumentsList()
    {
        return view('admin.documents');
    }


    public function dailySalesStatementParamPdfStream(Request $request)
    {
        $request_date = $request->date;

        list($year, $month, $date) = explode('-', $request_date);

//        $from = new \DateTime($date . "-" . "1");
//        $to = date_add($from, new \DateInterval('P1M'));
//        $from = date($year . "-" . $month . "-" . "1");
//        $to = date($year . "-" . $month + 1 . "-" . "1");
//        var_dump($to);
        $curUser = backpack_user();
        $InventoryLogs = InventoryLog::where('type', '=', 'sold')->whereDate('created_at', $request_date)->with('product')->with('location')->get();

//        $sInvoiceArr = SupplierInvoice::whereBetween('created_at', [$from, $to])->get();
//        $cInvoiceArr = CustomerInvoice::whereBetween('created_at', [$from, $to])->get();
        $pdf = PDF::loadView('doc_template.pdf.dailySalesStatement', ['title' => "Daily Sales Statement", 'curUser' => $curUser, 'inventory_logs' => $InventoryLogs, 'dateTime' => date("Y-m-d h:i:s a"), 'year' => $year, 'month' => $month,]);
        return $pdf->stream();
    }

    public function monthlySalesStatementParamPdfStream(Request $request)
    {
        $date = $request->date;
        list($year, $month) = explode('-', $date);
        $curUser = backpack_user();
        $InventoryLogs = InventoryLog::where('type', '=', 'sold')->whereMonth('created_at', $month)->whereYear('created_at', '=', $year)->with('product')->with('location')->get();
        $pdf = Pdf::loadView('doc_template.pdf.monthlySalesStatement', ['title' => "Monthly Sales Statement", 'curUser' => $curUser, 'inventory_logs' => $InventoryLogs, 'dateTime' => date("Y-m-d h:i:s a"), 'year' => $year, 'month' => $month,]);
        return $pdf->stream();
    }

    public function monthlyEmployeeSalesRecordsParamPdfStream(Request $request)
    {
        $date = $request->date;
        list($year, $month) = explode('-', $date);

        $curUser = backpack_user();
        $userInventoryLogs = User::whereHas('inventoryLogs', function (Builder $query) use ($month, $year) {
            $query->where('type', '=', 'sold')->whereMonth('created_at', $month)->whereYear('created_at', '=', $year)->with('product')->with('location');
        })->with(['inventoryLogs' => function ($query) use ($month, $year) {
            $query->where('type', '=', 'sold')->whereMonth('created_at', $month)->whereYear('created_at', '=', $year)->with('product')->with('location');
        }])->get();
        $pdf = Pdf::loadView('doc_template.pdf.monthlyEmployeeSalesRecords', ['title' => "Monthly Employee Sales Records", 'curUser' => $curUser, 'user_inventory_logs' => $userInventoryLogs, 'dateTime' => date("Y-m-d h:i:s a"), 'year' => $year, 'month' => $month,]);
        return $pdf->stream();
    }

    public function monthlyEmployeeProductDamagedRecordsParamPdfStream(Request $request)
    {
        $date = $request->date;
        list($year, $month) = explode('-', $date);

        $curUser = backpack_user();
        $userInventoryLogs = User::whereHas('inventoryLogs', function (Builder $query) use ($month, $year) {
            $query->where('type', '=', 'damaged')->whereMonth('created_at', $month)->whereYear('created_at', '=', $year)->with('product')->with('location');
        })->with(['inventoryLogs' => function ($query) use ($month, $year) {
            $query->where('type', '=', 'damaged')->whereMonth('created_at', $month)->whereYear('created_at', '=', $year)->with('product')->with('location');
        }])->get();

        $pdf = Pdf::loadView('doc_template.pdf.monthlyEmployeeProductDamagedRecords', ['title' => "Monthly Employee Product Damaged Records", 'curUser' => $curUser, 'user_inventory_logs' => $userInventoryLogs, 'dateTime' => date("Y-m-d h:i:s a"), 'year' => $year, 'month' => $month,]);
        return $pdf->stream();
    }

    public function monthlyEmployeeProductConsumedRecordsParamPdfStream(Request $request)
    {
        $date = $request->date;
        list($year, $month) = explode('-', $date);

        $curUser = backpack_user();
        $userInventoryLogs = User::whereHas('inventoryLogs', function (Builder $query) use ($month, $year) {
            $query->where('type', '=', 'consume')->whereMonth('created_at', $month)->whereYear('created_at', '=', $year)->with('product')->with('location');
        })->with(['inventoryLogs' => function ($query) use ($month, $year) {
            $query->where('type', '=', 'consume')->whereMonth('created_at', $month)->whereYear('created_at', '=', $year)->with('product')->with('location');
        }])->get();

        $pdf = Pdf::loadView('doc_template.pdf.monthlyEmployeeProductDamagedRecords', ['title' => "Monthly Employee Product Consumed Records", 'curUser' => $curUser, 'user_inventory_logs' => $userInventoryLogs, 'dateTime' => date("Y-m-d h:i:s a"), 'year' => $year, 'month' => $month,]);
        return $pdf->stream();
    }


    public function monthlyTrashedInventoryRecordsParamPdfStream(Request $request)
    {
        $date = $request->date;
        list($year, $month) = explode('-', $date);
        $curUser = backpack_user();
        $InventoryLogs = InventoryLog::where('type', '=', 'damaged')->orWhere('type', '=', 'consume')->whereMonth('created_at', $month)->whereYear('created_at', '=', $year)->with('product')->with('location')->get();
        $pdf = Pdf::loadView('doc_template.pdf.monthlySalesStatement', ['title' => "Monthly Trashed Inventory Records", 'curUser' => $curUser, 'inventory_logs' => $InventoryLogs, 'dateTime' => date("Y-m-d h:i:s a"), 'year' => $year, 'month' => $month,]);
        return $pdf->stream();
    }


    public function monthlyDamagedInventoryRecordsParamPdfStream(Request $request)
    {
        $date = $request->date;
        list($year, $month) = explode('-', $date);
        $curUser = backpack_user();
        $InventoryLogs = InventoryLog::where('type', '=', 'damaged')->whereMonth('created_at', $month)->whereYear('created_at', '=', $year)->with('product')->with('location')->get();
        $pdf = Pdf::loadView('doc_template.pdf.monthlySalesStatement', ['title' => "Monthly Damaged Inventory Records", 'curUser' => $curUser, 'inventory_logs' => $InventoryLogs, 'dateTime' => date("Y-m-d h:i:s a"), 'year' => $year, 'month' => $month,]);
        return $pdf->stream();
    }

    public function monthlyBookingRecordsParamPdfStream(Request $request)
    {
        $date = $request->date;
        list($year, $month) = explode('-', $date);
        $curUser = backpack_user();
//        $InventoryLogs = InventoryLog::where('type', '=', 'damaged')->whereMonth('created_at', $month)->whereYear('created_at', '=', $year)->with('product')->with('location')->get();
        $bookings = Booking::whereMonth('booking_date', $month)->whereYear('booking_date', '=', $year)->with('service')->get();
//        return $bookings;
        $pdf = Pdf::loadView('doc_template.pdf.monthlyBookingRecords', ['title' => "Monthly Booking Records", 'curUser' => $curUser, 'bookings' => $bookings, 'dateTime' => date("Y-m-d h:i:s a"), 'year' => $year, 'month' => $month,]);
        return $pdf->stream();
    }

    public function customerListParamPdfStream()
    {
//        $date = $request->date;
//        list($year, $month) = explode('-', $date);

        $curUser = backpack_user();
//        $InventoryLogs = InventoryLog::where('type', '=', 'damaged')->whereMonth('created_at', $month)->whereYear('created_at', '=', $year)->with('product')->with('location')->get();
//        $bookings = Booking::whereMonth('booking_date', $month)->whereYear('booking_date', '=', $year)->with('service')->get();
//        $bookings = Booking::all()->with('service')->unique('customer_email')->get();
        $bookings = Booking::select('customer_name', 'customer_email', 'customer_phone')->distinct('customer_email')->get();
//        return $bookings;
        $pdf = Pdf::loadView('doc_template.pdf.customer_list', ['title' => "Customer List", 'curUser' => $curUser, 'bookings' => $bookings, 'dateTime' => date("Y-m-d h:i:s a"),]);
        return $pdf->stream();
    }
}
