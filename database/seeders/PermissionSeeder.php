<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

//$NormalPermission = [
//    'maid',
//    'cafe',
//];

$basicAction = [
    "create",
    "edit",
    "view",
    "delete",
];

$Roles = [
    "superAdmin",
    "admin",
    "normal",
];

$Sections = [
    "bookings",
    "inventory logs",
    "services",
    "products",
    "suppliers",
    "supplier orders",
    "settings",
];

$ExtraPermissions = [
    "authentication",
];

$Permissions = [
];


class PermissionSeeder extends Seeder
{
    public function getBasicPermissionArr($v)
    {

    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $basicActions = [
            "create",
            "edit",
            "view",
            "delete",
        ];

        $Roles = [
            "superAdmin",
            "admin",
            "basic",
        ];

        $Sections = [
            "bookings",
            "inventory logs",
            "services",
            "products",
            "suppliers",
            "supplier orders",
            "settings",
        ];

        $ExtraPermissions = [
            "authentication",
            'view business',
            'edit business'
        ];


        $Permissions = [];

        foreach ($basicActions as $basicAction) {
            foreach ($Sections as $section) {
                array_push($Permissions, $basicAction . " " . $section);
            };
        }


        $superAdminRole = Role::create(['name' => 'superAdmin']);

        $adminRole = Role::create(['name' => 'admin']);

        foreach ($Permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        foreach ($ExtraPermissions as $extraPermission) {
            Permission::create(['name' => $extraPermission]);
        }


        $superAdminRole->givePermissionTo(array_merge($Permissions, $ExtraPermissions));


        User::find(1)->assignRole('superAdmin');
        User::find(2)->assignRole('superAdmin');
        User::find(3)->assignRole('superAdmin');
    }
}
