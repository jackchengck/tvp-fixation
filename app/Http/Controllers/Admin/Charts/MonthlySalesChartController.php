<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\InventoryLog;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class MonthlySalesChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MonthlySalesChartController extends ChartController
{
//    private $months_list;

    public function setup()
    {
        $this->chart = new Chart();

        $date = Carbon::now();
        Carbon::setlocale(config('app.locale'));
        $month_names = [
            ucfirst((new Carbon($date))->translatedFormat('F'))
        ];

//        $months = [(new Carbon($date))->translatedFormat('n')];

        for ($i = 1; $i <= 5; $i++) {
            $month_names[$i] = ucfirst((new Carbon($date))->subMonth()->translatedFormat('F'));
//            $months[$i] = (new Carbon($date))->subMonth()->translatedFormat('n');
            $date = (new Carbon($date))->subMonth();
        }

        $month_names = array_reverse($month_names);

        $this->chart->labels($month_names);
//        $this->chart->labels($month_names);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/monthly-sales'));

        // OPTIONAL
        // $this->chart->minimalist(false);
        // $this->chart->displayLegend(true);
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
    public function data()
    {

        $date = \Carbon\Carbon::now();

        $months = [
            [
                'month' => (new \Carbon\Carbon($date))->translatedFormat('n'),
                'year' => (new \Carbon\Carbon($date))->translatedFormat('Y'),]
        ];

        for ($i = 1; $i <= 5; $i++) {
            $months[$i] = [
                'month' => (new \Carbon\Carbon($date))->subMonth()->translatedFormat('n'),
                'year' => (new \Carbon\Carbon($date))->subMonth()->translatedFormat('Y'),
            ];
//            $months[$i]['month'] = ;
            $date = (new \Carbon\Carbon($date))->subMonth();
        }


        $monthly_sales = [];
        foreach ($months as $month) {
            $month_sold = \App\Models\InventoryLog::where('type', '=', 'sold')->whereMonth('created_at', $month['month'])->whereYear('created_at', '=', $month['year'])->get();
//	        print_r($month_sold);
//        dd(count($month_sold));
            $month_sale = 0;
            if (count($month_sold) > 0) {
                foreach ($month_sold as $item) {
//	            dd($item);
                    $month_sale += abs($item->quantity * $item->product->price);
                }
            }
            array_push($monthly_sales, $month_sale);
        }

        $monthly_sales = array_reverse($monthly_sales);

//        $this->chart->dataset('HKD dollar', 'bar', $months)
        $this->chart->dataset('HKD dollar', 'bar', $monthly_sales)
            ->color('rgba(0, 54, 153, 1)')
            ->backgroundColor('rgba(0, 54, 153, 0.4)');
    }
}
