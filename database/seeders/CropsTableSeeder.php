<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CropsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('crops')->delete();
        
        \DB::table('crops')->insert(array (
            0 => 
            array (
                'id' => 1,
                'crop_name' => 'Celery',
                'crop_description' => 'Celery',
                'section_id' => 1,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:28:26',
                'updated_at' => '2022-08-26 06:28:26',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'crop_name' => 'Lettuce',
                'crop_description' => 'Lettuce',
                'section_id' => 2,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:28:58',
                'updated_at' => '2022-08-26 06:28:58',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'crop_name' => 'Tomatoes 1',
                'crop_description' => 'Tomatoes 1',
                'section_id' => 3,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:29:42',
                'updated_at' => '2022-08-26 06:29:42',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'crop_name' => 'Tomatoes 2',
                'crop_description' => 'Tomatoes 2',
                'section_id' => 4,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:30:08',
                'updated_at' => '2022-08-26 06:30:08',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'crop_name' => 'Tomatoes 3',
                'crop_description' => 'Tomatoes 3',
                'section_id' => 5,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:30:45',
                'updated_at' => '2022-08-26 06:30:45',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}