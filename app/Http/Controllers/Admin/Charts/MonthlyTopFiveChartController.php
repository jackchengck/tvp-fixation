<?php

namespace App\Http\Controllers\Admin\Charts;

use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class MonthlyTopFiveChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MonthlyTopFiveChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

//        $this->chart->type = 'pie';

        $this->chart->labels([
            'Today',
            'B',
            'C'
        ]);

        // MANDATORY. Set the labels for the dataset points
        $this->chart->displayAxes(false);
        $this->chart->displayLegend(true);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/monthly-top-five'));

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
//         $users_created_today = \App\User::whereDate('created_at', today())->count();

         $this->chart->labels([
             'A',
             'B',
             'C'
         ]);

         $this->chart->dataset('Users Created','pie', [10,20,30])
             ->color('rgba(205, 32, 31, 1)')
             ->backgroundColor('rgba(205, 32, 31, 0.4)');
     }
}
