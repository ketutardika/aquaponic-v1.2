<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SensorDevicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sensor_devices')->delete();
        
        \DB::table('sensor_devices')->insert(array (
            0 => 
            array (
                'id' => 1,
                'device_id' => 'HJHR5O2ZWM',
                'device_name' => 'Temperature Sensor 1',
                'device_notes' => 'Temperature Sensor 1 DHT 11',
                'device_measurement' => 'C',
                'device_last_value' => 24.0,
                'device_last_check' => '2022-09-07 16:58:08',
                'device_pin' => NULL,
                'device_status' => 0,
                'device_api_key' => '38176c1b6b86d7babf80acde3d4eb34b',
                'type_id' => 1,
                'section_id' => 1,
                'farm_id' => NULL,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:12:03',
                'updated_at' => '2022-08-26 06:12:03',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'device_id' => '16OIVIJ2BF',
                'device_name' => 'Humidity Sensor 1',
                'device_notes' => 'Humidity Sensor 1 DHT 11',
                'device_measurement' => '%',
                'device_last_value' => 20.0,
                'device_last_check' => '2022-09-07 16:58:08',
                'device_pin' => NULL,
                'device_status' => 0,
                'device_api_key' => 'b543a3093c19c5df95b0c94989e3e618',
                'type_id' => 2,
                'section_id' => 1,
                'farm_id' => NULL,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:12:40',
                'updated_at' => '2022-08-26 06:12:40',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'device_id' => 'UUZE3VETVN',
                'device_name' => 'Temperature Sensor 2',
                'device_notes' => 'Temperature Sensor 2 DHT 11',
                'device_measurement' => 'C',
                'device_last_value' => 33.0,
                'device_last_check' => '2022-09-07 16:58:08',
                'device_pin' => NULL,
                'device_status' => 0,
                'device_api_key' => '52d4fe11ada86048e29b2c011f53c108',
                'type_id' => 1,
                'section_id' => 2,
                'farm_id' => NULL,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:12:40',
                'updated_at' => '2022-08-26 06:12:40',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'device_id' => '8LWIFDL76T',
                'device_name' => 'Humidity Sensor 2',
                'device_notes' => 'Humidity Sensor 2 DHT 11',
                'device_measurement' => '%',
                'device_last_value' => 43.0,
                'device_last_check' => '2022-09-07 16:58:08',
                'device_pin' => NULL,
                'device_status' => 0,
                'device_api_key' => '7aef4e67f07e26d1b02493a1689d748f',
                'type_id' => 2,
                'section_id' => 2,
                'farm_id' => NULL,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:12:40',
                'updated_at' => '2022-08-26 06:12:40',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'device_id' => 'YU1S26H7PB',
                'device_name' => 'TDS Sensor',
                'device_notes' => 'TDS Sensor',
                'device_measurement' => 'ppm',
                'device_last_value' => 6.0,
                'device_last_check' => '2022-09-07 16:58:08',
                'device_pin' => NULL,
                'device_status' => 0,
                'device_api_key' => 'e11bf3115d0bfd43249585d135096c34',
                'type_id' => 4,
                'section_id' => 6,
                'farm_id' => NULL,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:24:54',
                'updated_at' => '2022-08-26 06:24:54',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'device_id' => 'VKYQTF707Z',
                'device_name' => 'Turbidity Sensor',
                'device_notes' => 'Turbidity Sensor',
                'device_measurement' => 'ntu',
                'device_last_value' => 608.0,
                'device_last_check' => '2022-09-07 16:58:08',
                'device_pin' => NULL,
                'device_status' => 0,
                'device_api_key' => 'cf125a53edf908006cb57e3615f99deb',
                'type_id' => 4,
                'section_id' => 6,
                'farm_id' => NULL,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:18:29',
                'updated_at' => '2022-08-26 06:18:29',
                'deleted_at' => NULL,
            ),
            
            6 => 
            array (
                'id' => 7,
                'device_id' => '2J39DW54KC',
                'device_name' => 'Water Temperature',
                'device_notes' => 'Water Temperature',
                'device_measurement' => 'C',
                'device_last_value' => 0.0,
                'device_last_check' => '2022-09-07 16:58:08',
                'device_pin' => NULL,
                'device_status' => 0,
                'device_api_key' => 'f0ea1327e6ffda9e30c373d41ef7a4c3',
                'type_id' => 7,
                'section_id' => 6,
                'farm_id' => NULL,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:26:19',
                'updated_at' => '2022-08-26 06:26:19',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'device_id' => 'NVGFJ9Y36S',
                'device_name' => 'PH Water Sensor',
                'device_notes' => 'PH Water Sensor',
                'device_measurement' => 'ph',
                'device_last_value' => 7.0,
                'device_last_check' => '2022-09-07 16:58:08',
                'device_pin' => NULL,
                'device_status' => 0,
                'device_api_key' => 'a353e28392798cd84764536691d1d0fd',
                'type_id' => 10,
                'section_id' => 6,
                'farm_id' => NULL,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:26:58',
                'updated_at' => '2022-08-26 06:27:10',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}