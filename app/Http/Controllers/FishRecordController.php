<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Models\Fish;
use App\Models\FishRecord;
use App\Models\User;
use App\Models\FarmSection;
use App\Models\SensorDevice;
use App\Models\SensorDatalog;
use App\Models\SensorData;
use App\Models\TaskActivity;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportDataFishs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FishRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $fishs = Fish::findOrFail($id);
        $records = FishRecord::where('fish_id', '=', $id)->orderBy('updated_at', 'DESC')->get();
        $farmsections = FarmSection::oldest()->get();
        $allsensors = SensorDevice::oldest()->get();
        return view('module.fishs.records', compact('fishs','records','farmsections','allsensors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $fishs = Fish::findOrFail($id);
        return view('module.fishs.record-create', compact('fishs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fish_id' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $date = $request->date;
        $time =  $request->time;
        $timestamp = $date . $time;

        $fishs = FishRecord::create([
            'fish_id' => $request->fish_id,
            'width' => $request->width, 
            'height' => $request->height,
            'condition' => $request->condition, 
            'notes' => $request->notes,
            'created_at' => $timestamp,
            'updated_at' => $timestamp,
        ]);

        $fish_activity = Fish::findOrFail($request->fish_id);

        $activity_name = "Added Fish Data Record ".$fish_activity->fish_name;

        $taskactivities = TaskActivity::create([
            'activity_name' => $activity_name,
            'user_id' => $user_id,
        ]);

        if ($fishs) {
            return redirect()
                ->route('fishs.record_index',$request->id)
                ->with([
                    'success' => 'New Record on Fishs has been created successfully'
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
        $farmsections = FarmSection::where('id', '=', $fishs->section_id)->firstOrFail();
        $sensorsactive = json_decode($farmsections->sensor_devices);
        $allsensors = SensorDevice::oldest()->get();
        $datas = DB::select(DB::raw(" 
            SELECT  DATE(updated_at) AS date,
                    device_id,
                    updated_at,
                    MINUTE(updated_at)AS MINUTE, 
                    MAX(IF(device_id=1, data_reading, NULL)) AS Sub1,
                    MAX(IF(device_id=1, device_id, NULL)) AS device1,
                    MAX(IF(device_id=2, data_reading, NULL)) AS Sub2,
                    MAX(IF(device_id=2, device_id, NULL)) AS device2,
                    MAX(IF(device_id=3, data_reading, NULL)) AS Sub3,
                    MAX(IF(device_id=3, device_id, NULL)) AS device3,
                    MAX(IF(device_id=4, data_reading, NULL)) AS Sub4,
                    MAX(IF(device_id=4, device_id, NULL)) AS device4,
                    MAX(IF(device_id=5, data_reading, NULL)) AS Sub5,
                    MAX(IF(device_id=5, device_id, NULL)) AS device5,
                    MAX(IF(device_id=6, data_reading, NULL)) AS Sub6,
                    MAX(IF(device_id=6, device_id, NULL)) AS device6,
                    MAX(IF(device_id=7, data_reading, NULL)) AS Sub7,
                    MAX(IF(device_id=7, device_id, NULL)) AS device7,
                    MAX(IF(device_id=8, data_reading, NULL)) AS Sub8,
                    MAX(IF(device_id=8, device_id, NULL)) AS device8
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $ids)
    {
        $fishrecord = FishRecord::findOrFail($ids);
        $fishrecord->delete();

        if($fishrecord){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function record_export(Request $request, $id){
        $date = Carbon::now();
        return Excel::download(new ExportDataFishs($id), 'export-data-fish-'.$date.'.xlsx');
    }
}
