<?php

namespace App\Exports;

use App\Models\InventoryLog;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DailyStatementExport implements FromView
{

    protected $requestDate;

    public function __construct($date)
    {
        $this->requestDate = $date;
    }


    public function view(): View
    {
        $requestDate = $this->requestDate;

//        var_dump($requestDate);

        list($year, $month, $date) = explode('-', $requestDate);
//
//        $from = date($year . "-" . $month . "-" . "1");
//        $to = date($year . "-" . $month + 1 . "-" . "1");

        $InventoryLogs = InventoryLog::whereDate('created_at', $requestDate)->with('product')->with('location')->get();

        // TODO: Implement view() method.

        return view('doc_template.exports.monthly_statement', [
            'inventory_logs' => $InventoryLogs,
            'title' => "Daily Statement",
            'year' => $year,
            'month' => $month,
//            'date' => $this->requestDate,
            'curUser' => backpack_user(),
            'dateTime' => date("YmdHi"),
        ]);
    }
}
