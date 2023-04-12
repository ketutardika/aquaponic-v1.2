<?php

namespace Database\Seeders;

use App\Models\TaskList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskListSeeder extends Seeder
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
                'tasklist_name' => 'Check Water and Air Pumps',
                'tasklist_description' => 'Check Water and Air Pumps',
                'interval_value'  => '1',
                'interval_date' => 'Day',
                'start_date' => '2022-08-24 06:31:23',
                'end_date' => '2022-09-24 06:31:23',
                'user_id' => '1',
                'created_at' => '2022-08-24 06:31:23',
                'updated_at' => '2022-08-24 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'tasklist_name' => 'Check Water Flow',
                'tasklist_description' => 'Check Water Flow',
                'interval_value'  => '1',
                'interval_date' => 'Day',
                'start_date' => '2022-08-24 06:31:23',
                'end_date' => '2022-09-24 06:31:23',
                'user_id' => '1',
                'created_at' => '2022-08-24 06:31:23',
                'updated_at' => '2022-08-24 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'tasklist_name' => 'Check Water Level',
                'tasklist_description' => 'Check Water Level',
                'interval_value'  => '1',
                'interval_date' => 'Day',
                'start_date' => '2022-08-24 06:31:23',
                'end_date' => '2022-09-24 06:31:23',
                'user_id' => '1',
                'created_at' => '2022-08-24 06:31:23',
                'updated_at' => '2022-08-24 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'tasklist_name' => 'Check for Leaks',
                'tasklist_description' => 'Check for Leaks',
                'interval_value'  => '1',
                'interval_date' => 'Day',
                'start_date' => '2022-08-24 06:31:23',
                'end_date' => '2022-09-24 06:31:23',
                'user_id' => '1',
                'created_at' => '2022-08-24 06:31:23',
                'updated_at' => '2022-08-24 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'tasklist_name' => 'Check Water Temperature',
                'tasklist_description' => 'Check Water Temperature',
                'interval_value'  => '1',
                'interval_date' => 'Day',
                'start_date' => '2022-08-24 06:31:23',
                'end_date' => '2022-09-24 06:31:23',
                'user_id' => '1',
                'created_at' => '2022-08-24 06:31:23',
                'updated_at' => '2022-08-24 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'tasklist_name' => 'Check Plants',
                'tasklist_description' => 'Check Plants',
                'interval_value'  => '1',
                'interval_date' => 'Day',
                'start_date' => '2022-08-24 06:31:23',
                'end_date' => '2022-09-24 06:31:23',
                'user_id' => '1',
                'created_at' => '2022-08-24 06:31:23',
                'updated_at' => '2022-08-24 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'tasklist_name' => 'Manage Solids and Filters',
                'tasklist_description' => 'Manage Solids and Filters',
                'interval_value'  => '1',
                'interval_date' => 'Day',
                'start_date' => '2022-08-24 06:31:23',
                'end_date' => '2022-09-24 06:31:23',
                'user_id' => '1',
                'created_at' => '2022-08-24 06:31:23',
                'updated_at' => '2022-08-24 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'tasklist_name' => 'Feed Fish (First)',
                'tasklist_description' => 'Feed Fish (First)',
                'interval_value'  => '1',
                'interval_date' => 'Day',
                'start_date' => '2022-08-24 06:31:23',
                'end_date' => '2022-09-24 06:31:23',
                'user_id' => '1',
                'created_at' => '2022-08-24 06:31:23',
                'updated_at' => '2022-08-24 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'tasklist_name' => 'Feed Fish (Second)',
                'tasklist_description' => 'Feed Fish (Second)',
                'interval_value'  => '1',
                'interval_date' => 'Day',
                'start_date' => '2022-08-24 06:31:23',
                'end_date' => '2022-09-24 06:31:23',
                'user_id' => '1',
                'created_at' => '2022-08-24 06:31:23',
                'updated_at' => '2022-08-24 06:31:23',
                'deleted_at' => NULL,
            ],
            [
                'tasklist_name' => 'Test pH',
                'tasklist_description' => 'Test pH',
                'interval_value'  => '1',
                'interval_date' => 'Day',
                'start_date' => '2022-08-24 06:31:23',
                'end_date' => '2022-09-24 06:31:23',
                'user_id' => '1',
                'created_at' => '2022-08-24 06:31:23',
                'updated_at' => '2022-08-24 06:31:23',
                'deleted_at' => NULL,
            ],

        ];
        foreach ($data as $key => $value) {
            TaskList::create($value);
        }
    }
}
