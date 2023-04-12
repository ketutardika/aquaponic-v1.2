<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SensorDevicesAutoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sensor_device_autos')->delete();
        
        \DB::table('sensor_device_autos')->insert(array (
            0 =>
            array (
                'id' => 1,
                'device_id' => 'DP8CLH3GGA',
                'device_name' => 'Water Level Sensor',
                'device_notes' => 'Water Level Sensor',
                'device_last_value' => 0,
                'device_last_check' => NULL,
                'device_pin' => NULL,
                'device_status' => 0,
                'device_api_key' => '9b40008853f96722c3a9bd5e7e14098f',
                'type_id' => 6,
                'farm_id' => NULL,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:25:26',
                'updated_at' => '2022-08-26 06:25:26',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'device_id' => '2JXJPQ5RSW',
                'device_name' => 'Water Flow Sensor',
                'device_notes' => 'Water Flow Sensor',
                'device_last_value' => 0,
                'device_last_check' => NULL,
                'device_pin' => NULL,
                'device_status' => 0,
                'device_api_key' => '779af22a831d6698d46549bcc687137b',
                'type_id' => 6,
                'farm_id' => NULL,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:27:33',
                'updated_at' => '2022-08-26 06:27:33',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}