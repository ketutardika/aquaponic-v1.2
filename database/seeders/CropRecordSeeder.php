<?php

namespace Database\Seeders;

use App\Models\CropRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CropRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'crop_id' => '1',
                'color' => 'Green',
                'width' => '5',
                'height' => '5',
                'notes' => NULL,
                'user_id' => '1',
                'created_at' => '2022-08-24 06:31:23',
                'updated_at' => '2022-08-24 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'crop_id' => '1',
                'color' => 'Green',
                'width' => '5',
                'height' => '5',
                'notes' => NULL,
                'user_id' => '1',
                'created_at' => '2022-08-25 06:31:23',
                'updated_at' => '2022-08-25 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'crop_id' => '1',
                'color' => 'Green',
                'width' => '5',
                'height' => '5',
                'notes' => NULL,
                'user_id' => '1',
                'created_at' => '2022-08-26 06:31:23',
                'updated_at' => '2022-08-26 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'crop_id' => '1',
                'color' => 'Green',
                'width' => '5',
                'height' => '5',
                'notes' => NULL,
                'user_id' => '1',
                'created_at' => '2022-08-27 06:31:23',
                'updated_at' => '2022-08-27 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'crop_id' => '1',
                'color' => 'Green',
                'width' => '5',
                'height' => '5',
                'notes' => NULL,
                'user_id' => '1',
                'created_at' => '2022-08-28 06:31:23',
                'updated_at' => '2022-08-28 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'crop_id' => '1',
                'color' => 'Green',
                'width' => '5',
                'height' => '5',
                'notes' => NULL,
                'user_id' => '1',
                'created_at' => '2022-08-29 06:31:23',
                'updated_at' => '2022-08-29 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'crop_id' => '1',
                'color' => 'Green',
                'width' => '5',
                'height' => '5',
                'notes' => NULL,
                'user_id' => '1',
                'created_at' => '2022-08-30 06:31:23',
                'updated_at' => '2022-08-30 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'crop_id' => '1',
                'color' => 'Green',
                'width' => '5',
                'height' => '5',
                'notes' => NULL,
                'user_id' => '1',
                'created_at' => '2022-08-31 06:31:23',
                'updated_at' => '2022-08-31 06:31:23',
                'deleted_at' => NULL,
            ],

        ];
        foreach ($data as $key => $value) {
            CropRecord::create($value);
        }
    }
}
