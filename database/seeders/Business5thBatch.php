<?php

    namespace Database\Seeders;

    use App\Models\User;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;

    class Business5thBatch extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            //
            $businesses = [
                "泰禾美",
            ];

            $emails = [
                "thaiesanrammis@gmail.com",
            ];
            $contacts = [
                "92178588",
            ];
            $subdomains = [
                "thai-order",
            ];
            $siId = [
                "8",
            ];
            $accounts = [
                "adminbRRU83",
            ];
            $passwords = [
                "bjMsIrAg",
            ];

            foreach ($businesses as $key => $value) {
                $business_id = DB::table('businesses')->insertGetId(
                    [
                        "title"                  => $value,
                        "phone"                  => $contacts[$key],
                        'email'                  => $emails[$key],
                        'solution_integrator_id' => $siId[$key],
                        'subdomain'              => $subdomains[$key],
                    ]
                );

                $userId = DB::table('users')->insertGetId(
                    [
                        "name"        => $businesses[$key] . " Admin",
                        "username"    => $accounts[$key],
                        "password"    => Hash::make($passwords[$key]),
                        "business_id" => $business_id,
                    ]
                );

                User::find($userId)->assignRole('superAdmin');

                DB::table('opening_hours')->insert(
                    [
                        [
                            'day'         => '0',
                            'start'       => '10:00',
                            'end'         => '22:00',
                            'business_id' => $business_id
                        ],
                        [
                            'day'         => '1',
                            'start'       => '10:00',
                            'end'         => '22:00',
                            'business_id' => $business_id
                        ],
                        [
                            'day'         => '2',
                            'start'       => '10:00',
                            'end'         => '22:00',
                            'business_id' => $business_id
                        ],
                        [
                            'day'         => '3',
                            'start'       => '10:00',
                            'end'         => '22:00',
                            'business_id' => $business_id
                        ],
                        [
                            'day'         => '4',
                            'start'       => '10:00',
                            'end'         => '22:00',
                            'business_id' => $business_id
                        ],
                        [
                            'day'         => '5',
                            'start'       => '10:00',
                            'end'         => '22:00',
                            'business_id' => $business_id
                        ],
                        [
                            'day'         => '6',
                            'start'       => '10:00',
                            'end'         => '22:00',
                            'business_id' => $business_id
                        ],
                    ]
                );

                $locationId = DB::table('locations')->insertGetId(
                    [
                        'title'       => 'Warehouse',
                        'business_id' => $business_id
                    ]
                );

                DB::table('locations')->insert(
                    [
                        'title'       => 'Store',
                        'business_id' => $business_id
                    ]
                );


            }
        }
    }
