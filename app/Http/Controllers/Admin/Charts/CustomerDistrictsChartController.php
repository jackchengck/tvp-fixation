<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\CustomerInfoSurvey;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class CustomerDistrictsChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomerDistrictsChartController extends ChartController
{
    public array $districts = [
        "中西區",
        "灣仔",
        "東區",
        "南區",
        "深水埗",
        "油尖旺",
        "九龍城",
        "黃大仙",
        "觀塘",
        "沙田",
        "大埔",
        "北區",
        "元朗",
        "屯門",
        "西貢",
        "離島",
        "荃灣",
        "葵青",
    ];

    public array $color_set = [
        'rgba(255, 0, 0, 0.7)',
        'rgba(0, 255, 0, 0.7)',
        'rgba(0, 0, 255, 0.7)',
        'rgba(255, 255, 0, 0.7)',
        'rgba(0, 255, 255, 0.7)',
        'rgba(255, 0, 255, 0.7)',
        'rgba(128, 0, 0, 0.7)',
        'rgba(0, 128, 0, 0.7)',
        'rgba(0, 0, 128, 0.7)',
        'rgba(128, 128, 0, 0.7)',
        'rgba(0, 128, 128, 0.7)',
        'rgba(128, 0, 128, 0.7)',
        'rgba(255, 165, 0, 0.7)',
        'rgba(165, 42, 42, 0.7)',
        'rgba(173, 216, 230, 0.7)',
        'rgba(144, 238, 144, 0.7)',
        'rgba(211, 211, 211, 0.7)',
        'rgba(255, 105, 180, 0.7)',
        'rgba(189, 183, 107, 0.7)',
        'rgba(255, 215, 0, 0.7)',
    ];

    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels($this->districts);

        $this->chart->displayAxes(false);
        $this->chart->displayLegend(true);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/customer-districts'));

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
        $all_customers = CustomerInfoSurvey::all();


        $countDataset = array();
        foreach ($this->districts as $d) {
            $x = 0;
            foreach ($all_customers as $customer) {
                if ($customer->district == $d) {
                    $x += 1;
                }
            }
            array_push($countDataset, $x);
        }


        $this->chart->dataset('Customer Districts', 'pie',
            $countDataset
        )
            ->color('rgba(255,255,255,1)')
            ->backgroundColor($this->color_set);
    }
}
