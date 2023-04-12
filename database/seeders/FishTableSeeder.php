<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FishTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fish')->delete();
        
        \DB::table('fish')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fish_name' => 'Tilapia Fish',
                'fish_description' => 'Tilapia Fish',
                'section_id' => 6,
                'user_id' => 1,
                'created_at' => '2022-08-26 06:31:23',
                'updated_at' => '2022-08-26 06:31:23',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}