<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\InventoryLog;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class WeeklySalesChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WeeklySalesChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();


        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels([
            'Ytd',
            'Today',
        ]);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/weekly-sales'));

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
//        $users_created_today = User::whereDate('created_at', today())->count();
        $date = Carbon::now();
        $log_today = InventoryLog::where('type', '=', 'sold')->whereDate('created_at', $date)->get();

        $log_today_sales = 0;

        foreach ($log_today as $item) {
            $q = $item->quantity;
            $log_today_sales += abs($q * $item->product->price);
        }

        $log_ytd = InventoryLog::where('type', '=', 'sold')->whereDate('created_at', (new Carbon($date))->subDay())->get();

        $log_ytd_sales = 0;

        foreach ($log_ytd as $item) {
            $q = $item->quantity;
            $log_ytd_sales += abs($q * $item->product->price);
        }

        $this->chart->dataset('HKD dollar', 'bar', [
//            $users_created_today,
            $log_ytd_sales,
            $log_today_sales,
        ])
            ->color('rgba(0, 54, 153, 1)')
            ->backgroundColor('rgba(0, 54, 153, 0.4)');
    }
}
