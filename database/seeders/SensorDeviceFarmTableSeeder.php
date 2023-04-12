<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SensorDeviceFarmTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sensor_device_farm')->delete();
        
        \DB::table('sensor_device_farm')->insert(array (
            0 => 
            array (
                'section_id' => 1,
                'device_id' => 1,
            ),
            1 => 
            array (
                'section_id' => 1,
                'device_id' => 2,
            ),
            2 => 
            array (
                'section_id' => 1,
                'device_id' => 5,
            ),
            3 => 
            array (
                'section_id' => 1,
                'device_id' => 7,
            ),
            4 => 
            array (
                'section_id' => 1,
                'device_id' => 8,
            ),
            5 => 
            array (
                'section_id' => 2,
                'device_id' => 1,
            ),
            6 => 
            array (
                'section_id' => 2,
                'device_id' => 2,
            ),
            7 => 
            array (
                'section_id' => 2,
                'device_id' => 5,
            ),
            8 => 
            array (
                'section_id' => 2,
                'device_id' => 7,
            ),
            9 => 
            array (
                'section_id' => 2,
                'device_id' => 8,
            ),
            10 => 
            array (
                'section_id' => 3,
                'device_id' => 3,
            ),
            11 => 
            array (
                'section_id' => 3,
                'device_id' => 4,
            ),
            12 => 
            array (
                'section_id' => 3,
                'device_id' => 5,
            ),
            13 => 
            array (
                'section_id' => 3,
                'device_id' => 7,
            ),
            14 => 
            array (
                'section_id' => 3,
                'device_id' => 8,
            ),
            15 => 
            array (
                'section_id' => 4,
                'device_id' => 3,
            ),
            16 => 
            array (
                'section_id' => 4,
                'device_id' => 4,
            ),
            17 => 
            array (
                'section_id' => 4,
                'device_id' => 5,
            ),
            18 => 
            array (
                'section_id' => 4,
                'device_id' => 7,
            ),
            19 => 
            array (
                'section_id' => 4,
                'device_id' => 8,
            ),
            20 => 
            array (
                'section_id' => 5,
                'device_id' => 3,
            ),
            21 => 
            array (
                'section_id' => 5,
                'device_id' => 4,
            ),
            22 => 
            array (
                'section_id' => 5,
                'device_id' => 5,
            ),
            23 => 
            array (
                'section_id' => 5,
                'device_id' => 7,
            ),
            24 => 
            array (
                'section_id' => 5,
                'device_id' => 8,
            ),
            25 => 
            array (
                'section_id' => 6,
                'device_id' => 1,
            ),
            26 => 
            array (
                'section_id' => 6,
                'device_id' => 2,
            ),
            27 => 
            array (
                'section_id' => 6,
                'device_id' => 3,
            ),
            28 => 
            array (
                'section_id' => 6,
                'device_id' => 4,
            ),
            29 => 
            array (
                'section_id' => 6,
                'device_id' => 5,
            ),
            30 => 
            array (
                'section_id' => 6,
                'device_id' => 6,
            ),
            31 => 
            array (
                'section_id' => 6,
                'device_id' => 7,
            ),
            32 => 
            array (
                'section_id' => 6,
                'device_id' => 8,
            ),
        ));
        
        
    }
}