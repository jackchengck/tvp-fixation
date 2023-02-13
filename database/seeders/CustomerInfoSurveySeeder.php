<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerInfoSurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $districts = [
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
        $occupations = [
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
        $age_group = [
            "15-20",
            "21-30",
            "31-40",
            "41-50",
            "其他",
        ];


        $businesses = Business::all();

        foreach ($businesses as $business) {
            for ($x = 0; $x <= rand(12, 20); $x++) {
                $dIndex = rand(0, 17);
                $oIndex = rand(0, 11);
                $agIndex = rand(0, 4);

                DB::table('customer_info_surveys')->insert([
                    'occupation' => $occupations[$oIndex],
                    'district' => $districts[$dIndex],
                    'age_group' => $age_group[$agIndex],
                    'business_id' => $business->id,

                ]);
            }
        }

    }
}
