<?php

namespace Database\Seeders;

use App\Models\SensorType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SensorTypeSeeder extends Seeder
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
                'sensor_type_name'      => 'Temperature Sensor',
                'sensor_type_code'     => 'TS',
                'sensor_type_measurement'  => 'Celcius',
                'sensor_type_measurement_code' => '°C',
                'sensor_type_description'     => 'Temperature Sensor',
                'user_id' => 1,
            ],
            [
                'sensor_type_name'      => 'Humidity Sensor',
                'sensor_type_code'     => 'HS',
                'sensor_type_measurement'  => 'Percent',
                'sensor_type_measurement_code' => '%',
                'sensor_type_description'     => 'Humidity Sensor',
                'user_id' => 1,
            ],
            [
                'sensor_type_name'      => 'Electric Conductivity Sensor',
                'sensor_type_code'     => 'EC',
                'sensor_type_measurement'  => '',
                'sensor_type_measurement_code' => '',
                'sensor_type_description'     => 'Electric Conductivity Sensor',
                'user_id' => 1,
            ],
            [
                'sensor_type_name'      => 'Turbidity Sensor',
                'sensor_type_code'     => 'TRS',
                'sensor_type_measurement'  => 'NTU',
                'sensor_type_measurement_code' => 'NTU',
                'sensor_type_description'     => 'Turbidity Sensor',
                'user_id' => 1,
            ],
            [
                'sensor_type_name'      => 'Total Dissolved Solids Sensor Sensor',
                'sensor_type_code'     => 'TDS',
                'sensor_type_measurement'  => 'ppm/mg/L',
                'sensor_type_measurement_code' => 'ppm/mg/L',
                'sensor_type_description'     => 'Total Dissolved Solids Sensor Sensor',
                'user_id' => 1,
            ],
            [
                'sensor_type_name'      => 'Water Level Sensor',
                'sensor_type_code'     => 'LS',
                'sensor_type_measurement'  => '',
                'sensor_type_measurement_code' => '',
                'sensor_type_description'     => 'Water Level Sensor',
                'user_id' => 1,
            ],
            [
                'sensor_type_name'      => 'Water Temperature',
                'sensor_type_code'     => 'WT',
                'sensor_type_measurement'  => 'Celcius',
                'sensor_type_measurement_code' => '°C',
                'sensor_type_description'     => 'Water Temperature',
                'user_id' => 1,
            ],
            [
                'sensor_type_name'      => 'Ammonia Sensor',
                'sensor_type_code'     => 'AS',
                'sensor_type_measurement'  => '',
                'sensor_type_measurement_code' => '',
                'sensor_type_description'     => 'Ammonia Sensor',
                'user_id' => 1,
            ],
            [
                'sensor_type_name'      => 'Oxygen Sensor',
                'sensor_type_code'     => 'OS',
                'sensor_type_measurement'  => '',
                'sensor_type_measurement_code' => '',
                'sensor_type_description'     => 'Oxygen Sensor',
                'user_id' => 1,
            ],
            [
                'sensor_type_name'      => 'PH Sensor',
                'sensor_type_code'     => 'PH',
                'sensor_type_measurement'  => 'PH',
                'sensor_type_measurement_code' => 'PH',
                'sensor_type_description'     => 'PH Sensor',
                'user_id' => 1,
            ],
        ];
        foreach ($data as $key => $value) {
            SensorType::create($value);
        }
    }
}
