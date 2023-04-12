<?php

namespace App\Exports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Models\Fish;
use App\Models\FishRecord;
use App\Models\User;
use App\Models\FarmSection;
use App\Models\SensorDevice;
use App\Models\SensorDatalog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportDataFishs implements FromCollection,WithHeadings, ShouldAutoSize, WithMapping,WithStyles
{

    public $id;

    public function __construct($id)
    {
    	$this->id=$id;
    }

    public function collection()
       {
       	$farmsections = FarmSection::where('id', '=', $this->id)->firstOrFail();
        $sensorsactive = json_decode($farmsections->sensor_devices);
       	$datare = FishRecord::all();
        $datarecords = DB::table('fish')
        ->leftJoin('farm_sections','farm_sections.id','=','fish.section_id')
        ->leftJoin('sensor_datalogs', function($join){
        $join->whereRaw("find_in_set(sensor_datalogs.device_id, REPLACE(REPLACE(REPLACE(farm_sections.sensor_devices, '\"', ''), '[', ''), ']',''))");
        })
        ->select(DB::raw("
        			sensor_datalogs.device_id, sensor_datalogs.updated_at,farm_sections.section_name, fish.fish_name,
                    AVG(IF(sensor_datalogs.device_id=1, sensor_datalogs.data_reading, NULL)) AS Sub1,
                    AVG(IF(sensor_datalogs.device_id=1, sensor_datalogs.data_reading, NULL)) AS device1,
                    AVG(IF(sensor_datalogs.device_id=2, sensor_datalogs.data_reading, NULL)) AS Sub2,
                    AVG(IF(sensor_datalogs.device_id=2, sensor_datalogs.data_reading, NULL)) AS device2,
                    AVG(IF(sensor_datalogs.device_id=3, sensor_datalogs.data_reading, NULL)) AS Sub3,
                    AVG(IF(sensor_datalogs.device_id=3, sensor_datalogs.data_reading, NULL)) AS device3,
                    AVG(IF(sensor_datalogs.device_id=4, sensor_datalogs.data_reading, NULL)) AS Sub4,
                    AVG(IF(sensor_datalogs.device_id=4, sensor_datalogs.data_reading, NULL)) AS device4,
                    AVG(IF(sensor_datalogs.device_id=5, sensor_datalogs.data_reading, NULL)) AS Sub5,
                    AVG(IF(sensor_datalogs.device_id=5, sensor_datalogs.data_reading, NULL)) AS device5,
                    AVG(IF(sensor_datalogs.device_id=6, sensor_datalogs.data_reading, NULL)) AS Sub6,
                    AVG(IF(sensor_datalogs.device_id=6, sensor_datalogs.data_reading, NULL)) AS device6,
                    AVG(IF(sensor_datalogs.device_id=7, sensor_datalogs.data_reading, NULL)) AS Sub7,
                    AVG(IF(sensor_datalogs.device_id=7, sensor_datalogs.data_reading, NULL)) AS device7,
                    AVG(IF(sensor_datalogs.device_id=8, sensor_datalogs.data_reading, NULL)) AS Sub8,
                    AVG(IF(sensor_datalogs.device_id=8, sensor_datalogs.data_reading, NULL)) AS device8"
        ))
        ->GROUPBY(DB::raw('date(sensor_datalogs.updated_at),HOUR(sensor_datalogs.updated_at)'))
        ->ORDERBY('sensor_datalogs.updated_at', 'desc')
        ->get();
        return $datarecords;
    }

    public function headings(): array
    {
        return [
        	'Fish',
        	'Update at',
            'Temperature 1',
            'Humidity 1',
            'Temperature 2',
            'Humidity 2',
            'TDS Sensor',
            'Turbidity Sensor',            
            'Water Temperature',
            'PH Water Sensor',
            ];
    }

    public function map($datarecords): array
    {
        return [
        	$datarecords->fish_name,
        	$datarecords->updated_at,
            number_format($datarecords->Sub1, 2, '.', ','),
            number_format($datarecords->Sub2, 2, '.', ','),
            number_format($datarecords->Sub3, 2, '.', ','),
            number_format($datarecords->Sub4, 2, '.', ','),
            number_format($datarecords->Sub5, 2, '.', ','),
            number_format($datarecords->Sub6, 2, '.', ','),
            number_format($datarecords->Sub7, 2, '.', ','),
            number_format($datarecords->Sub8, 2, '.', ','),
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:J1')->getFont()->setBold(true);
    }
}
