<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            "name" => "Core Super Admin",
            "username" => "abcadmin",
            "password" => Hash::make("abcadmin"),
            "isSuperAdmin" => true,
        ]);


        DB::table('users')->insert([
            "name" => "Test 1 Admin",
            "username" => "test1Admin",
            "password" => Hash::make("123456"),
            "isSuperAdmin" => false,
        ]);


        DB::table('users')->insert([
            "name" => "Test 2 Admin",
            "username" => "test2Admin",
            "password" => Hash::make("123456"),
            "isSuperAdmin" => false,
        ]);


        $this->call([
            PermissionSeeder::class,
            SolutionIntegratorSeeder::class,
            BusinessSeeder::class,
            SI1StSeeder::class,
        ]);


    }
}
