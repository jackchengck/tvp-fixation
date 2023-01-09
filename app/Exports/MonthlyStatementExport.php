<?php

namespace App\Exports;

use App\Models\InventoryLog;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MonthlyStatementExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */


    protected $date;

    public function __construct($date)
    {
        $this->date = $date;
    }


    public function view(): View
    {
        list($year, $month) = explode('-', $this->date);
//
//        $from = date($year . "-" . $month . "-" . "1");
//        $to = date($year . "-" . $month + 1 . "-" . "1");

        $InventoryLogs = InventoryLog::whereDate('created_at', $this->date)->with('product')->with('location')->get();

        // TODO: Implement view() method.

        return view('doc_template.exports.monthly_statement', [
            'inventory_logs'=>$InventoryLogs,
            'title' => "Monthly Statement",
            'year' => $year,
            'month' => $month,
            'curUser' => backpack_user(),
            'dateTime' => date("YmdHi"),
        ]);
    }
}
