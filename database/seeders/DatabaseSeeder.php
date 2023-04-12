<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
	{    	
        $this->call(PermissionTableSeeder::class);
        $this->call(SensorTypeSeeder::class);
        $this->call(FarmsTableSeeder::class);
        $this->call(FarmSectionsTableSeeder::class);
        $this->call(CropsTableSeeder::class);        
        $this->call(FishTableSeeder::class);
        $this->call(SensorDevicesTableSeeder::class);
        $this->call(SensorDevicesAutoTableSeeder::class);
        $this->call(SettingGeneralsTableSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(CropRecordSeeder::class);
        $this->call(TaskListSeeder::class);
        // $this->call(SensorDatalogsTableSeeder::class);
        // $this->call(SensorDataTableSeeder::class);
        $this->call(SensorDeviceFarmTableSeeder::class);
    }
}
