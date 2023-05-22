<?php

    namespace Database\Seeders;

    use App\Models\User;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;

    class Business2ndBatch extends Seeder
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
                "Grace Beauty（翠屏）-jade",
                "栢誠商業傢具有限公司",
                "Grace Beauty（寶湖）-plover",
                "Beauty Place",
            ];

            $emails = [
                "grace.jade.cs@gmail.com",
                "Papermax.info@gmail.com",
                "grace.plover@gmail.com",
                "cs.beauty.Place0@gmail.com",
            ];
            $contacts = [
                "96860448",
                "94328587",
                "97168808",
                "24908488",
            ];
            $subdomains = [
                "gracejade",
                "papermax",
                "graceplover",
                "beautyplace",
            ];
            $siId = [
                "11",
                "5",
                "12",
                "4",
            ];
            $accounts = [
                "QpoOsAdmin",
                "VTDxJAdmin",
                "cHEUuAdmin",
                "GXuhtAdmin",
            ];
            $passwords = [
                "E88bE5ok",
                "eCbSc84y",
                "1463KEBM",
                "uiE6NHrQ",
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
                    ['title'       => 'Warehouse',
                     'business_id' => $business_id
                    ]
                );

                DB::table('locations')->insert(
                    ['title'       => 'Store',
                     'business_id' => $business_id
                    ]
                );


            }
        }
    }
