<?php

namespace App\Http\Controllers;

use App\Exports\DailyStatementExport;
use App\Exports\MonthlyStatementExport;
use App\Models\InventoryLog;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //

    public function identifyFormat($exF)
    {
        switch ($exF) {

            case 'xls':
                return \Maatwebsite\Excel\Excel::XLS;

            case 'ods':
                return \Maatwebsite\Excel\Excel::ODS;

            case 'tsv':
                return \Maatwebsite\Excel\Excel::TSV;

            case 'csv':
                return \Maatwebsite\Excel\Excel::CSV;
            case 'xlsx':
            default:
                return \Maatwebsite\Excel\Excel::XLSX;
        }
    }



    public function dailyStatementParamExport(Request $request)
    {
        $request_date = $request->date;
        $export_format = $request->export_format ? $request->export_format : 'xlsx';


        list($year, $month, $date) = explode('-', $request_date);

//        $from = new \DateTime($date . "-" . "1");
//        $to = date_add($from, new \DateInterval('P1M'));
//        $from = date($year . "-" . $month . "-" . "1");
//        $to = date($year . "-" . $month + 1 . "-" . "1");
//        var_dump($to);
        $curUser = backpack_user();
        $InventoryLogs = InventoryLog::whereDate('created_at', $request_date)->with('product')->with('location')->get();
        return Excel::download(new DailyStatementExport($date), 'Daily Statement' . " " . date('YmdHi') . '.' . $export_format, $this->identifyFormat($export_format));

//        $sInvoiceArr = SupplierInvoice::whereBetween('created_at', [$from, $to])->get();
//        $cInvoiceArr = CustomerInvoice::whereBetween('created_at', [$from, $to])->get();
//        $pdf = PDF::loadView('doc_template.pdf.dailySalesStatement', ['title' => "Daily Sales Statement", 'curUser' => $curUser, 'inventory_logs' => $InventoryLogs, 'dateTime' => date("Y-m-d h:i:s a"), 'year' => $year, 'month' => $month,]);
//        return $pdf->stream();
    }

    public function monthlyStatementParamExport(Request $request)
    {
        $date = $request->date;
        $export_format = $request->export_format ? $request->export_format : 'xlsx';

        list($year, $month) = explode('-', $date);
        $curUser = backpack_user();
        $InventoryLogs = InventoryLog::whereMonth('created_at', $month)->whereYear('created_at', '=', $year)->with('product')->with('location')->get();
//        $pdf = Pdf::loadView('doc_template.exports.monthly_statement', ['title' => "Monthly Sales Statement", 'curUser' => $curUser, 'inventory_logs' => $InventoryLogs, 'dateTime' => date("Y-m-d h:i:s a"), 'year' => $year, 'month' => $month,]);
//        return $pdf->stream();
        return Excel::download(new MonthlyStatementExport($date), 'Monthly Statement' . " " . date('YmdHi') . '.' . $export_format, $this->identifyFormat($export_format));

    }

}
