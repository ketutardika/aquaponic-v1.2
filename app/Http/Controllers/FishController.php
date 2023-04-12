<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Fish;
use App\Models\User;
use App\Models\FarmSection;
use App\Models\SensorDevice;
use App\Models\SensorDatalog;
use App\Models\SensorData;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    function __construct()
    {
         $this->middleware('permission:fishs-list|fishs-create|fishs-edit|fishs-delete', ['only' => ['index','store']]);
         $this->middleware('permission:fishs-create', ['only' => ['create','store']]);
         $this->middleware('permission:fishs-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:fishs-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $fishs = Fish::oldest()->get();
        $farmsections = FarmSection::oldest()->get();
        return view('module.fishs.index', compact('fishs','farmsections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $farmsections = FarmSection::oldest()->get();
        return view('module.fishs.create', compact('farmsections'));
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
            'fish_name' => 'required',
            'section_id' => 'required',
        ]);

        $user_id = Auth::user()->id;

        $fishs = Fish::create([
            'fish_name'     => $request->fish_name,
            'fish_description' => $request->fish_description,
            'qty_fish'     => $request->qty_fish,
            'average_weight' => $request->average_weight,
            'habitat' => $request->habitat,
            'growth_weeks' => $request->growth_weeks,
            'harvest_weight' => $request->harvest_weight,
            'daily_feeding_rate' => $request->daily_feeding_rate,
            'min_protein' => $request->min_protein,
            'max_protein' => $request->max_protein,
            'min_dissolved_oxygen' => $request->min_dissolved_oxygen,
            'max_dissolved_oxygen' => $request->max_dissolved_oxygen,
            'section_id' => $request->section_id,            
            'min_air_temperature' => $request->min_air_temperature,
            'max_air_temperature' => $request->max_air_temperature,
            'min_humidity' => $request->min_humidity,
            'max_humidity' => $request->max_humidity,
            'min_turbidity' => $request->min_turbidity,
            'max_turbidity' => $request->max_turbidity,
            'min_tds' => $request->min_tds,
            'max_tds' => $request->max_tds,
            'min_water_temperature' => $request->min_air_temperature,
            'max_water_temperature' => $request->max_air_temperature,
            'min_ph' => $request->min_ph,
            'max_ph' => $request->max_ph,
            'min_width' => $request->min_width,
            'max_width' => $request->max_width,
            'min_height' => $request->min_height,
            'max_height' => $request->max_height,
            'growing' => $request->growing,
            'harvesting' => $request->harvesting,            
            'summary' => $request->summary,
            'user_id' => $user_id,
        ]);

        if ($fishs) {
            return redirect()
                ->route('fishs.index')
                ->with([
                    'success' => 'New Fishs has been created successfully'
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
        $fishs = Fish::findOrFail($id);
        $farmsections = FarmSection::oldest()->get();
        return view('module.fishs.show', compact('fishs','farmsections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fishs = Fish::findOrFail($id);
        $farmsections = FarmSection::oldest()->get();
        return view('module.fishs.edit', compact('fishs','farmsections'));
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
            'fish_name' => 'required',
            'section_id' => 'required',
        ]);

        $fishs = Fish::findOrFail($id);

        $user_id = Auth::user()->id;

        $fishs->update([
            'fish_name'     => $request->fish_name,
            'fish_description' => $request->fish_description,
            'qty_fish'     => $request->qty_fish,
            'average_weight' => $request->average_weight,
            'habitat' => $request->habitat,
            'growth_weeks' => $request->growth_weeks,
            'harvest_weight' => $request->harvest_weight,
            'daily_feeding_rate' => $request->daily_feeding_rate,
            'min_protein' => $request->min_protein,
            'max_protein' => $request->max_protein,
            'min_dissolved_oxygen' => $request->min_dissolved_oxygen,
            'max_dissolved_oxygen' => $request->max_dissolved_oxygen,
            'section_id' => $request->section_id,            
            'min_air_temperature' => $request->min_air_temperature,
            'max_air_temperature' => $request->max_air_temperature,
            'min_humidity' => $request->min_humidity,
            'max_humidity' => $request->max_humidity,
            'min_turbidity' => $request->min_turbidity,
            'max_turbidity' => $request->max_turbidity,
            'min_tds' => $request->min_tds,
            'max_tds' => $request->max_tds,
            'min_water_temperature' => $request->min_air_temperature,
            'max_water_temperature' => $request->max_air_temperature,
            'min_ph' => $request->min_ph,
            'max_ph' => $request->max_ph,
            'min_width' => $request->min_width,
            'max_width' => $request->max_width,
            'min_height' => $request->min_height,
            'max_height' => $request->max_height,
            'growing' => $request->growing,
            'harvesting' => $request->harvesting,            
            'summary' => $request->summary,
            'user_id' => $user_id,
        ]);

        if ($fishs) {
            return redirect()
                ->route('fishs.index')
                ->with([
                    'success' => 'Data Fishs has been edited successfully'
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
        $fishs = Fish::findOrFail($id);
        $fishs->delete();

        if($fishs){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function record_show($id)
    {
        $fishs = Fish::findOrFail($id);
        $farmsections = FarmSection::where('id', '=', $fishs->section_id)->firstOrFail();
        $sensorsactive = json_decode($farmsections->sensor_devices);
        $allsensors = SensorDevice::oldest()->get();
        $datas = DB::select(DB::raw(" 
            SELECT  DATE(updated_at) AS date,
                    device_id,
                    updated_at,
                    MINUTE(updated_at)AS MINUTE, 
                    AVG(IF(device_id=1, data_reading, NULL)) AS Sub1,
                    AVG(IF(device_id=1, device_id, NULL)) AS device1,
                    AVG(IF(device_id=2, data_reading, NULL)) AS Sub2,
                    AVG(IF(device_id=2, device_id, NULL)) AS device2,
                    AVG(IF(device_id=3, data_reading, NULL)) AS Sub3,
                    AVG(IF(device_id=3, device_id, NULL)) AS device3,
                    AVG(IF(device_id=4, data_reading, NULL)) AS Sub4,
                    AVG(IF(device_id=4, device_id, NULL)) AS device4,
                    AVG(IF(device_id=5, data_reading, NULL)) AS Sub5,
                    AVG(IF(device_id=5, device_id, NULL)) AS device5,
                    AVG(IF(device_id=6, data_reading, NULL)) AS Sub6,
                    AVG(IF(device_id=6, device_id, NULL)) AS device6,
                    AVG(IF(device_id=7, data_reading, NULL)) AS Sub7,
                    AVG(IF(device_id=7, device_id, NULL)) AS device7,
                    AVG(IF(device_id=8, data_reading, NULL)) AS Sub8,
                    AVG(IF(device_id=8, device_id, NULL)) AS device8,
                    AVG(IF(device_id=9, data_reading, NULL)) AS Sub9,
                    AVG(IF(device_id=9, device_id, NULL)) AS device9,
                    AVG(IF(device_id=10, data_reading, NULL)) AS Sub10,
                    AVG(IF(device_id=10, device_id, NULL)) AS device10
            FROM sensor_datalogs 
            GROUP BY date(updated_at),HOUR(updated_at)
            ORDER BY updated_at DESC"
        ));
        $dataghraps = DB::select(DB::raw(" 
            SELECT  DATE(updated_at) AS date,
                    device_id,
                    updated_at,
                    MINUTE(updated_at)AS MINUTE, 
                    AVG(IF(device_id=1, data_reading, NULL)) AS Sub1,
                    AVG(IF(device_id=1, device_id, NULL)) AS device1,
                    AVG(IF(device_id=2, data_reading, NULL)) AS Sub2,
                    AVG(IF(device_id=2, device_id, NULL)) AS device2,
                    AVG(IF(device_id=3, data_reading, NULL)) AS Sub3,
                    AVG(IF(device_id=3, device_id, NULL)) AS device3,
                    AVG(IF(device_id=4, data_reading, NULL)) AS Sub4,
                    AVG(IF(device_id=4, device_id, NULL)) AS device4,
                    AVG(IF(device_id=5, data_reading, NULL)) AS Sub5,
                    AVG(IF(device_id=5, device_id, NULL)) AS device5,
                    AVG(IF(device_id=6, data_reading, NULL)) AS Sub6,
                    AVG(IF(device_id=6, device_id, NULL)) AS device6,
                    AVG(IF(device_id=7, data_reading, NULL)) AS Sub7,
                    AVG(IF(device_id=7, device_id, NULL)) AS device7,
                    AVG(IF(device_id=8, data_reading, NULL)) AS Sub8,
                    AVG(IF(device_id=8, device_id, NULL)) AS device8,
                    AVG(IF(device_id=9, data_reading, NULL)) AS Sub9,
                    AVG(IF(device_id=9, device_id, NULL)) AS device9,
                    AVG(IF(device_id=10, data_reading, NULL)) AS Sub10,
                    AVG(IF(device_id=10, device_id, NULL)) AS device10
            FROM sensor_datalogs 
            GROUP BY date(updated_at),HOUR(updated_at)
            ORDER BY updated_at DESC
            LIMIT 7"
        ));
        return view('module.fishs.record_show', compact('fishs','farmsections','allsensors','datas','sensorsactive','dataghraps'));
    }

}
