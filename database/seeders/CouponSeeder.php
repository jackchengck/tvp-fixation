<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $coupons = [
            [
                'title' => '$50優惠劵-200$可用',
                'code' => "9X6E8A",
                'expiry_date' => '2026-12-31',
            ],

            [
                'title' => "$10優惠劵",
                'code' => "3U5C7D",
                'expiry_date' => '2026-12-31',
            ],
            [
                'title' => "95折優惠劵 (5% off)",
                'code' => "6Y2P3H",
                'expiry_date' => '2026-12-31',
            ],
        ];

        $businesses = Business::all();

        foreach ($businesses as $business) {
            foreach ($coupons as $coupon) {
                DB::table('coupons')->insert([
                    ...$coupon,
                    'business_id' => $business->id,
                ]);
            }
        }
    }
}
