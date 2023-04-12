<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SensorDevice;
use App\Models\SensorType;
use App\Models\FarmSection;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;


class SensorDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    function __construct()
    {
         $this->middleware('permission:sensor-device-list|sensor-device-create|sensor-device-edit|sensor-device-delete', ['only' => ['index','store']]);
         $this->middleware('permission:sensor-device-create', ['only' => ['create','store']]);
         $this->middleware('permission:sensor-device-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:sensor-device-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $sensordevices = SensorDevice::orderBy('device_active', 'ASC')->latest()->get();
        $sensortypes = SensorType::oldest()->get();
        $farmsections = FarmSection::oldest()->get();
        return view('module.sensordevice.index', compact('sensordevices','sensortypes','farmsections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sensortypes = SensorType::latest()->get();
        $farmsections = FarmSection::oldest()->get();
        $unique_id = strtoupper(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10));
        return view('module.sensordevice.create', compact('sensortypes','farmsections','unique_id'));
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
            'device_id' => 'required',
            'device_name' => 'required',
            'type_id' => 'required',
        ]);

        $apikey = md5(microtime().rand());
        $user_id = Auth::user()->id;

        $sensordevices = SensorDevice::create([
            'device_id'     => $request->device_id,
            'device_name'     => $request->device_name,
            'type_id' => $request->type_id,
            'section_id' => $request->section_id,
            'device_notes' => $request->device_notes,
            'device_status' => '0',
            'device_active' => $request->device_active,
            'device_api_key'=> $apikey,
            'user_id' => $user_id,
        ]);

        if ($sensordevices) {
            return redirect()
                ->route('sensor-device.index')
                ->with([
                    'success' => 'New Sensor Device has been created successfully'
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
        $sensordevices = SensorDevice::findOrFail($id);
        $sensortypes = SensorType::latest()->get();
        $farmsections = FarmSection::oldest()->get();
        return view('module.sensordevice.showapi', compact('sensordevices','sensortypes','farmsections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sensordevices = SensorDevice::findOrFail($id);
        $sensortypes = SensorType::latest()->get();
        $farmsections = FarmSection::oldest()->get();
        return view('module.sensordevice.edit', compact('sensordevices','sensortypes','farmsections'));
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
            'device_id' => 'required',
            'device_name' => 'required',
            'type_id' => 'required',
        ]);

        $sensordevices = SensorDevice::findOrFail($id);
        $user_id = Auth::user()->id;

        $sensordevices->update([
            'device_id'     => $request->device_id,
            'device_name'     => $request->device_name,
            'type_id' => $request->type_id,
            'section_id' => $request->section_id,
            'device_notes' => $request->device_notes,
            'device_active' => $request->device_active,
            'user_id' => $user_id,
            'updated_at' => Carbon::now(),
        ]);

        if ($sensordevices) {
            return redirect()
                ->route('sensor-device.index')
                ->with([
                    'success' => 'Data Sensor Device has been edited successfully'
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
        $sensordevices = SensorDevice::findOrFail($id);
        $sensordevices->delete();

        if($sensordevices){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
    public function data($unique_id, $type)
    {
        if($type=="live")
        {
            $sensor = SensorDevice::where('id', '=', $unique_id)->firstOrFail();
            $device_last_value = round($sensor->device_last_value, 2);
            $time = time() * 1000;

            return Response::json(array(array($time, $device_last_value)));
        }

    }
}
