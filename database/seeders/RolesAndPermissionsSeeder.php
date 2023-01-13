<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Interfaces\PermissionInterface;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds for permission and roles.
     *
     * @return void
     */
    public function run()
    {
        Permission::firstOrCreate(['name' => PermissionInterface::CAN_VIEW_LIBRARIES]);
        Permission::firstOrCreate(['name' => PermissionInterface::CAN_VIEW_PARTICULAR_LIBRARY]);
        Permission::firstOrCreate(['name' => PermissionInterface::CAN_CREATE_LIBRARIES]);
        Permission::firstOrCreate(['name' => PermissionInterface::CAN_UPDATE_LIBRARIES]);
        Permission::firstOrCreate(['name' => PermissionInterface::CAN_DELETE_LIBRARIES]);

        Permission::firstOrCreate(['name' => PermissionInterface::CAN_VIEW_RECORDS]);
        Permission::firstOrCreate(['name' => PermissionInterface::CAN_VIEW_PARTICULAR_RECORD]);
        Permission::firstOrCreate(['name' => PermissionInterface::CAN_CREATE_RECORDS]);
        Permission::firstOrCreate(['name' => PermissionInterface::CAN_UPDATE_RECORDS]);
        Permission::firstOrCreate(['name' => PermissionInterface::CAN_DELETE_RECORDS]);

        Permission::firstOrCreate(['name' => PermissionInterface::CAN_CREATE_USERS]);
        Permission::firstOrCreate(['name' => PermissionInterface::CAN_UPDATE_USERS]);
        Permission::firstOrCreate(['name' => PermissionInterface::CAN_DELETE_USERS]);

        $superAdminRole = Role::firstOrCreate(['name' => 'SuperAdmin']);
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $studentRole = Role::firstOrCreate(['name' => 'Student']);

        $superAdminRole->givePermissionTo(Permission::all());

        $adminRole->givePermissionTo([
            PermissionInterface::CAN_VIEW_PARTICULAR_LIBRARY,
            PermissionInterface::CAN_VIEW_PARTICULAR_RECORD,
            PermissionInterface::CAN_CREATE_RECORDS,
            PermissionInterface::CAN_UPDATE_RECORDS,
            PermissionInterface::CAN_DELETE_RECORDS,
            PermissionInterface::CAN_CREATE_USERS,
            PermissionInterface::CAN_UPDATE_USERS,
            PermissionInterface::CAN_DELETE_USERS,
        ]);

        $studentRole->givePermissionTo([
            PermissionInterface::CAN_VIEW_PARTICULAR_LIBRARY,
            PermissionInterface::CAN_VIEW_PARTICULAR_RECORD,
        ]);
    }
}
