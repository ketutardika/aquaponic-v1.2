<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FarmSectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('farm_sections')->delete();
        
        \DB::table('farm_sections')->insert(array (
            0 => 
            array (
                'id' => 1,
                'section_name' => 'NFT Line 1',
                'section_type' => 'NFT',
                'section_description' => 'NFT Line 1',
                'farm_id' => NULL,
                'sensor_devices' => '["1","2","5","7","8"]',
                'user_id' => 1,
                'created_at' => '2022-08-26 05:50:51',
                'updated_at' => '2022-09-09 11:01:22',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'section_name' => 'NFT Line 2',
                'section_type' => 'NFT',
                'section_description' => 'NFT Line 2',
                'farm_id' => NULL,
                'sensor_devices' => '["1","2","5","7","8"]',
                'user_id' => 1,
                'created_at' => '2022-08-26 05:51:08',
                'updated_at' => '2022-09-09 11:02:02',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'section_name' => 'Dutch Bucket 1',
                'section_type' => 'Dutch Bucket',
                'section_description' => 'Dutch Bucket 1',
                'farm_id' => NULL,
                'sensor_devices' => '["3","4","5","7","8"]',
                'user_id' => 1,
                'created_at' => '2022-08-26 05:51:38',
                'updated_at' => '2022-09-09 11:02:40',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'section_name' => 'Dutch Bucket 2',
                'section_type' => 'Dutch Bucket',
                'section_description' => 'Dutch Bucket 2',
                'farm_id' => NULL,
                'sensor_devices' => '["3","4","5","7","8"]',
                'user_id' => 1,
                'created_at' => '2022-08-26 05:51:54',
                'updated_at' => '2022-09-09 11:02:58',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'section_name' => 'Dutch Bucket 3',
                'section_type' => 'Dutch Bucket',
                'section_description' => 'Dutch Bucket 3',
                'farm_id' => NULL,
                'sensor_devices' => '["3","4","5","7","8"]',
                'user_id' => 1,
                'created_at' => '2022-08-26 05:52:07',
                'updated_at' => '2022-09-09 11:03:15',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'section_name' => 'Fish House',
                'section_type' => 'Fish House',
                'section_description' => 'Fish House',
                'farm_id' => NULL,
                'sensor_devices' => '["1","2","3","4","5","6","7","8"]',
                'user_id' => 1,
                'created_at' => '2022-08-26 05:53:45',
                'updated_at' => '2022-08-26 05:53:45',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}