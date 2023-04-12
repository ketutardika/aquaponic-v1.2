<?php

namespace App\Http\Controllers;

use DataTables;
use Carbon\Carbon;
use App\Models\Crop;
use App\Models\User;
use App\Models\FarmBlock;
use App\Models\CropRecord;
use App\Models\SensorData;
use App\Models\FarmSection;
use App\Models\SensorDevice;
use App\Models\TaskActivity;
use Illuminate\Http\Request;
use App\Models\SensorDatalog;
use App\Exports\ExportDataCrops;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:crops-list|crops-create|crops-edit|crops-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:crops-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:crops-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:crops-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $crops = Crop::all();
        return view('module.crops.index', compact('crops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $farmblocks = FarmBlock::all();
        return view('module.crops.create', compact('farmblocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'crop_name' => 'required',
            'farm_block' => 'required',
        ]);

        $user_id = Auth::user()->id;

        $crops = Crop::create([
            'crop_name'     => $request->crop_name,
            'qty_plant'     => $request->qty_plant,
            'crop_description' => $request->crop_description,
            'block_id' => $request->farm_block,
            'summary' => $request->summary,
            'growing' => $request->growing,
            'harvesting' => $request->harvesting,
            'day_min_air_temperature' => $request->day_min_air_temperature,
            'day_max_air_temperature' => $request->day_max_air_temperature,
            'night_min_air_temperature' => $request->night_min_air_temperature,
            'night_max_air_temperature' => $request->night_max_air_temperature,
            'min_humidity' => $request->min_humidity,
            'max_humidity' => $request->max_humidity,
            'min_water_temperature' => $request->min_air_temperature,
            'max_water_temperature' => $request->max_air_temperature,
            'min_ph' => $request->min_ph,
            'max_ph' => $request->max_ph,
            'min_growing_time' => $request->min_growing_time,
            'max_growing_time' => $request->max_growing_time,
            'min_width' => $request->min_width,
            'max_width' => $request->max_width,
            'min_height' => $request->min_height,
            'max_height' => $request->max_height,
            'nutrient_needs' => $request->nutrient_needs,
            'high_risk' => $request->high_risk,
            'disease' => $request->disease,
            'user_id' => $user_id,
        ]);

        if ($crops) {
            return redirect()
                ->route('crops.index')
                ->with([
                    'success' => 'New Crops has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crops = Crop::findOrFail($id);
        $farmsections = FarmSection::leftJoin('crops', 'farm_sections.id', '=', 'crops.block_id')->where('crops.id', '=', $id)->orderBy('farm_sections.updated_at', 'asc')->get();
        $sensordevices = SensorDevice::leftJoin('crops', 'sensor_devices.block_id', '=', 'crops.block_id')->select('*', 'sensor_devices.id as sensor_devices_id')->where('crops.id', '=', $id)->orderBy('sensor_devices.updated_at', 'asc')->get();
        return view('module.crops.show', compact('crops', 'farmsections', 'sensordevices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crops = Crop::findOrFail($id);
        $farmblocks = FarmBlock::all();
        return view('module.crops.edit', compact('crops', 'farmblocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'crop_name' => 'required',
            'farm_block' => 'required',
        ]);

        $crops = Crop::findOrFail($id);
        $user_id = Auth::user()->id;

        $crops->update([
            'crop_name'     => $request->crop_name,
            'qty_plant'     => $request->qty_plant,
            'crop_description' => $request->crop_description,
            'block_id' => $request->farm_block,
            'day_min_air_temperature' => $request->day_min_air_temperature,
            'day_max_air_temperature' => $request->day_max_air_temperature,
            'night_min_air_temperature' => $request->night_min_air_temperature,
            'night_max_air_temperature' => $request->night_max_air_temperature,
            'min_humidity' => $request->min_humidity,
            'max_humidity' => $request->max_humidity,
            'min_water_temperature' => $request->min_water_temperature,
            'max_water_temperature' => $request->max_water_temperature,
            'min_ph' => $request->min_ph,
            'max_ph' => $request->max_ph,
            'min_growing_time' => $request->min_growing_time,
            'max_growing_time' => $request->max_growing_time,
            'min_width' => $request->min_width,
            'max_width' => $request->max_width,
            'min_height' => $request->min_height,
            'max_height' => $request->max_height,
            'nutrient_needs' => $request->nutrient_needs,
            'high_risk' => $request->high_risk,
            'disease' => $request->disease,
            'user_id' => $user_id,
        ]);

        if ($crops) {
            return redirect()
                ->route('crops.index')
                ->with([
                    'success' => 'Data Crops has been edited successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $crops = Crop::findOrFail($id);
        $crops->delete();

        if ($crops) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
    public function data($unique_id, $type)
    {
        if ($type == "live") {
            $sensordevice = SensorDevice::where('id', '=', $unique_id)->firstOrFail();
            $values = round($sensordevice->device_last_value, 2);
            $measurement = $sensordevice->device_measurement;
            $update = date($sensordevice->device_last_check);
            return Response::json(['value' => $values, 'update' => $update, 'measurement' => $measurement]);
        }
    }

    public function record_index($id)
    {
        $crops = Crop::findOrFail($id);
        $records = CropRecord::where('crop_id', '=', $id)->orderBy('updated_at', 'DESC')->get();
        $farmsections = FarmSection::oldest()->get();
        $allsensors = SensorDevice::oldest()->get();
        return view('module.crops.records', compact('crops', 'records', 'farmsections', 'allsensors'));
    }

    public function record_create($id)
    {
        $crops = Crop::findOrFail($id);
        return view('module.crops.record', compact('crops'));
    }

    public function record_store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'crop_id' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $date = $request->date;
        $time =  $request->time;
        $timestamp = $date . $time;

        $crops = CropRecord::create([
            'crop_id' => $request->crop_id,
            'color' => $request->color,
            'width' => $request->width,
            'height' => $request->height,
            'condition' => $request->condition,
            'notes' => $request->notes,
            'created_at' => $timestamp,
            'updated_at' => $timestamp,
        ]);

        $plants = Crop::findOrFail($request->crop_id);

        $activity_name = "Added Data Record Crop " . $plants->crop_name;

        $taskactivities = TaskActivity::create([
            'activity_name' => $activity_name,
            'user_id' => $user_id,
        ]);

        if ($crops) {
            return redirect()
                ->route('crops.record_index', $request->id)
                ->with([
                    'success' => 'New Record on Crops has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    public function record_delete($id, $ids)
    {
        //
        $croprecord = CropRecord::findOrFail($ids);
        $croprecord->delete();

        if ($croprecord) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function record_show($id)
    {
        $crops = Crop::findOrFail($id);
        $farmblocks = FarmBlock::where('id', '=', $crops->block_id)->firstOrFail();
        $farmalassections = FarmSection::where('id', '=', $farmblocks->section_id)->firstOrFail();

        $deviceIds = json_decode($farmalassections->sensor_devices);

        $today = Carbon::now();
        $startOfMonth = $today->subMonth();
        $endOfMonth = carbon::tomorrow();
        $thisMonth = $startOfMonth->format('Y-m-d').' - '.$endOfMonth->format('Y-m-d');

        $datalogs = DB::table('sensor_datalogs')
                        ->select(DB::raw('sensor_datalogs.device_id,sensor_devices.device_name, ROUND(AVG(sensor_datalogs.data_reading),2) as avg_data_reading, DATE(sensor_datalogs.created_at) as date'))
                        ->join('sensor_devices', 'sensor_devices.id', '=', 'sensor_datalogs.device_id')
                        ->where('sensor_devices.device_active', '=' , '1')
                        ->where('sensor_datalogs.data_reading', '!=' , '-1')
                        ->whereIn('sensor_datalogs.device_id', $deviceIds)
                        ->groupBy(DB::raw('sensor_datalogs.device_id, DATE(sensor_datalogs.created_at)'))
                        ->orderBy('sensor_devices.id', 'ASC')
                        ->orderBy('date', 'DESC')
                        ->get()
                        ->groupBy('date');
        return view('module.crops.record_show', compact('crops','thisMonth','datalogs'));
    }

    public function record_show_pivot(Request $request, $id, $startDate=2022-03-01, $endDate=2023-03-01)
    {
        $startDate = Carbon::parse(explode(' - ', $request->date_range)[0]);
        $endDate = Carbon::parse(explode(' - ', $request->date_range)[1]);

        $crops = Crop::findOrFail($id);
        $farmblocks = FarmBlock::where('id', '=', $crops->block_id)->firstOrFail();
        $farmalassections = FarmSection::where('id', '=', $farmblocks->section_id)->firstOrFail();

        $deviceIds = json_decode($farmalassections->sensor_devices);

        $datalogs = DB::table('sensor_datalogs')
                        ->select(DB::raw('sensor_datalogs.device_id,sensor_devices.device_name, ROUND(AVG(sensor_datalogs.data_reading),2) as avg_data_reading, DATE(sensor_datalogs.created_at) as date'))
                        ->join('sensor_devices', 'sensor_devices.id', '=', 'sensor_datalogs.device_id')
                        ->where('sensor_devices.device_active', '=' , '1')
                        ->where('sensor_datalogs.data_reading', '!=' , '-1')
                        ->whereIn('sensor_datalogs.device_id', $deviceIds)
                        ->whereBetween('sensor_datalogs.created_at', [$startDate, $endDate])
                        ->groupBy(DB::raw('sensor_datalogs.device_id, DATE(sensor_datalogs.created_at)'))
                        ->orderBy('sensor_devices.id', 'ASC')
                        ->orderBy('date', 'DESC')
                        ->get()
                        ->groupBy('date');
        $data = [];
        foreach ($datalogs as $date => $datalog) {
            $row = ['date' => $date];
            foreach ($datalog as $value) {
                $row[$value->device_id] = $value->avg_data_reading;
            }
            $data[] = $row;
        }

        return DataTables::of($data)->make(true);
    }

    public function record_show_pivot_chart(Request $request, $id, $startDate=2022-03-01, $endDate=2023-03-01)
    {

        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        $crops = Crop::findOrFail($id);
        $farmblocks = FarmBlock::where('id', '=', $crops->block_id)->firstOrFail();
        $farmalassections = FarmSection::where('id', '=', $farmblocks->section_id)->firstOrFail();

        $deviceIds = json_decode($farmalassections->sensor_devices);

        $datalogs = DB::table('sensor_datalogs')
                        ->select(DB::raw('COALESCE(sensor_datalogs.device_id,0) as device_id,COALESCE(sensor_devices.device_name,0) as device_name, COALESCE(ROUND(AVG(sensor_datalogs.data_reading),2),0) as avg_data_reading, DATE(sensor_datalogs.created_at) as date'))
                        ->leftJoin('sensor_devices', 'sensor_devices.id', '=', 'sensor_datalogs.device_id')
                        ->where('sensor_devices.device_active', '=' , '1')
                        ->where('sensor_datalogs.data_reading', '!=' , '-1')
                        ->whereIn('sensor_datalogs.device_id', $deviceIds)
                        ->whereBetween('sensor_datalogs.created_at', [$startDate, $endDate])
                        ->groupBy(DB::raw('sensor_datalogs.device_id, DATE(sensor_datalogs.created_at)'))
                        ->orderBy('sensor_devices.id', 'ASC')
                        ->orderBy('date', 'ASC')
                        ->get();




        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');


        $chartLabels = [];
        $chartDatasets = [];

        $deviceIds = $datalogs->pluck('device_name')->unique();
        $colors = array('#6571ff', '#7987a1','#05a34a', '#66d1d1','#fbbc06','#ff3366','#060c17','#7987a1','#817c78','#5c76bc','#5d4b1e','#7d90f0','#1e81fe','#f0128c','#acf38b','#743232','#c60a09','#ea221e','#3d6a55','#db9269','#861c71','#3516aa','#6e6161','#850e5b','#438a38','#b71b02','#05ee64','#658faf','#04b79d','#c7a42f','#ebfd28','#ba7b2f','#16723d','#b9921f','#c0231b','#f5da5b','#831630','#84eb41','#2512c3','#849613','#7a7589','#048c0c','#2a12b7');

        foreach ($datalogs->groupBy('date') as $date => $data) {
            $chartLabels[] = $date;

            foreach ($deviceIds as $deviceId) {
                $color = $colors[array_rand($colors)];
                $chartDatasets[$deviceId]['label'] = $deviceId;
                $avgReading = $data->where('device_name', $deviceId)->first();
                if ($avgReading) {
                    $chartDatasets[$deviceId]['data'][] = $avgReading->avg_data_reading;
                } else {
                    $chartDatasets[$deviceId]['data'][] = null;
                    $chartDatasets[$deviceId]['pointLabel'][] = 'Data not available';
                }
                $chartDatasets[$deviceId]['fill'] = false;
                $devicesIs = $avgReading->device_id ?? 0;
                if ($devicesIs % 2 == 0) {                    
                    $chartDatasets[$deviceId]['backgroundColor'] = $color;
                    $chartDatasets[$deviceId]['borderColor'] = $color;
                    $chartDatasets[$deviceId]['pointBackgroundColor'] = $color;
                    $chartDatasets[$deviceId]['pointBorderColor'] = $color;
                } else {
                    $chartDatasets[$deviceId]['backgroundColor'] = $color;
                    $chartDatasets[$deviceId]['borderColor'] = $color;                    
                    $chartDatasets[$deviceId]['pointBackgroundColor'] = $color;
                    $chartDatasets[$deviceId]['pointBorderColor'] = $color;
                    
                }
                $chartDatasets[$deviceId]['pointRadius'] = 2;
                $chartDatasets[$deviceId]['borderWidth'] = 2;

                
            }
        }


        $chartData = [
            'labels' => $chartLabels,
            'datasets' => array_values($chartDatasets),

        ];

        return response()->json($chartData);

    }


    public function record_export(Request $request, $id)
    {
        $date = Carbon::now();
        return Excel::download(new ExportDataCrops($id), 'export-data-' . $date . '.xlsx');
    }

    public function exportExcel($id)
    {
        $date = Carbon::now();
        $crops = Crop::findOrFail($id);
        $farmblocks = FarmBlock::where('id', '=', $crops->block_id)->firstOrFail();
        $farmalassections = FarmSection::where('id', '=', $farmblocks->section_id)->firstOrFail();

        $deviceIds = json_decode($farmalassections->sensor_devices);

        $datalogs = DB::table('sensor_datalogs')
                        ->select(DB::raw('sensor_devices.device_name, COALESCE(ROUND(AVG(sensor_datalogs.data_reading),2),0) as avg_data_reading, DATE_FORMAT(FROM_UNIXTIME((UNIX_TIMESTAMP(sensor_datalogs.created_at) DIV 3600) * 3600), "%Y-%m-%d %H:%i:00") as date'))
                        ->join('sensor_devices', 'sensor_devices.id', '=', 'sensor_datalogs.device_id')
                        ->where('sensor_devices.device_active', '=' , '1')
                        ->where('sensor_datalogs.data_reading', '!=' , '-1')
                        ->whereIn('sensor_datalogs.device_id', $deviceIds)
                        ->groupBy(DB::raw('sensor_datalogs.device_id'), 'date')
                        ->orderBy('sensor_devices.id', 'ASC')
                        ->orderBy('date', 'DESC')
                        ->get()
                        ->groupBy('date');

        return Excel::download(new ExportDataCrops($datalogs,$crops), 'export-data-crops' . $date . '.xlsx');
    }
}
