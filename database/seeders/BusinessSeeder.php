<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('businesses')->insert([
            "title" => "Test 1 Company",
            "phone" => "94183183",
            "email" => "jackchengck+test1@gmail.com",
            "admin_id" => 2,
            "solution_integrator_id" => 1,
        ]);

        DB::table('users')->where('id', 2)->update([
            'business_id' => 1,
        ]);

        DB::table('businesses')->insert([
            "title" => "Test 2 Company",
            "phone" => "94210169",
            "email" => "jackchengck+test2@gmail.com",
            "admin_id" => 3,
            "solution_integrator_id" => 1,
        ]);

        DB::table('users')->where('id', 3)->update([
            'business_id' => 2,
        ]);

    }
}
