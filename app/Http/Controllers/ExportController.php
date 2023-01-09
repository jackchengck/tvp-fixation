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


        $curUser = backpack_user();
        return Excel::download(new DailyStatementExport($request_date), 'Daily Statement' . " " . date('YmdHi') . '.' . $export_format, $this->identifyFormat($export_format));
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
