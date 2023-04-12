<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::create(['name' => 'Admin']);       
        $permissions = Permission::pluck('id','id')->all();     
        $role->syncPermissions($permissions);

       //create roles and assign existing permissions
        $staff= Role::create(['name' => 'Staff']);
        $staff->givePermissionTo('role-list');
        $staff->givePermissionTo('role-create');

        $staff->givePermissionTo('user-list');
        $staff->givePermissionTo('user-create');
        
        $staff->givePermissionTo('farms-list');
        $staff->givePermissionTo('farms-create');
        
        $staff->givePermissionTo('farm-section-list');
        $staff->givePermissionTo('farm-section-create');

        $staff->givePermissionTo('crops-list');
        $staff->givePermissionTo('crops-create');
        
        $staff->givePermissionTo('fishs-list');
        $staff->givePermissionTo('fishs-create');
        
        $staff->givePermissionTo('sensor-type-list');
        $staff->givePermissionTo('sensor-type-create');

        $staff->givePermissionTo('sensor-device-list');
        $staff->givePermissionTo('sensor-device-create');

        $staff->givePermissionTo('sensor-config-list');
        $staff->givePermissionTo('sensor-config-create');

        $staff->givePermissionTo('sensor-datalog-list');
        $staff->givePermissionTo('sensor-datalog-create');

        $staff->givePermissionTo('setting-general-list');      


        $user = User::create([
            'name'      => 'Super Admin',
            'email'     => 'admin@aquamonia.com',
            'password'  => bcrypt('password')
        ]);       
        $user->assignRole([$role->id]);

        $user = User::create([
            'name'      => 'Staff',
            'email'     => 'staff@aquamonia.com',
            'password'  => bcrypt('password')
        ]);       
        $user->assignRole([$staff->id]);

        $user = User::create([
            'name'      => 'Web Developer',
            'email'     => 'ardi@jm-consulting.id',
            'password'  => bcrypt('password')
        ]);       
        $user->assignRole([$role->id]);
    }
}