<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\CustomerInfoSurvey;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class CustomerOccupationsChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomerOccupationsChartController extends ChartController
{
    public array $occupations = [
        "公務員",
        "無業",
        "退休人士",
        "學生",
        "零售及服務",
        "飲食",
        "運輸、物流及維修",
        "地產及金融",
        "娛樂及藝術",
        "教育及社福",
        "行政、保安、建造",
        "其他",
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

        $this->chart->labels($this->occupations);


        $this->chart->displayAxes(false);
        $this->chart->displayLegend(true);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/customer-occupations'));

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
        foreach ($this->occupations as $oc) {
            $x = 0;
            foreach ($all_customers as $customer) {
                if ($customer->occupation == $oc) {
                    $x += 1;
                }
            }
            array_push($countDataset, $x);
        }


        $this->chart->dataset('Customer Occupations', 'pie',
            $countDataset
        )
            ->color('rgba(255,255,255,1)')
            ->backgroundColor($this->color_set);
    }
}
