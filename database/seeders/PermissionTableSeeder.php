<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$permissions = [
	       'role-list',
	       'role-create',
	       'role-edit',
	       'role-delete',
	       'user-list',
	       'user-create',
	       'user-edit',
	       'user-delete',
	       'farms-list',
	       'farms-create',
	       'farms-edit',
	       'farms-delete',
	       'farm-section-list',
	       'farm-section-create',
	       'farm-section-edit',
	       'farm-section-delete',
	       'crops-list',
	       'crops-create',
	       'crops-edit',
	       'crops-delete',
	       'fishs-list',
	       'fishs-create',
	       'fishs-edit',
	       'fishs-delete',
	       'sensor-type-list',
	       'sensor-type-create',
	       'sensor-type-edit',
	       'sensor-type-delete',
	       'sensor-device-list',
	       'sensor-device-create',
	       'sensor-device-edit',
	       'sensor-device-delete',
	       'sensor-config-list',
	       'sensor-config-create',
	       'sensor-config-edit',
	       'sensor-config-delete',
	       'sensor-datalog-list',
	       'sensor-datalog-create',
	       'sensor-datalog-edit',
	       'sensor-datalog-delete',
	       'setting-general-list',
	       'setting-general-create',
	       'setting-general-edit',
	       'setting-general-delete',
	    ];
      
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
