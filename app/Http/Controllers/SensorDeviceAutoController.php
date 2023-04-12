<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SensorDevice;
use App\Models\SensorDeviceAuto;
use App\Models\SensorType;
use App\Models\FarmSection;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class SensorDeviceAutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index()
    {
        $sensordevices = SensorDeviceAuto::oldest()->get();
        $sensortypes = SensorType::oldest()->get();
        $farmsections = FarmSection::oldest()->get();
        return view('module.sensordeviceauto.index', compact('sensordevices','sensortypes','farmsections'));
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
        return view('module.sensordeviceauto.create', compact('sensortypes','farmsections','unique_id'));
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

        $sensordevices = SensorDeviceAuto::create([
            'device_id'     => $request->device_id,
            'device_name'     => $request->device_name,
            'device_last_value' => '0',
            'type_id' => $request->type_id,
            'section_id' => $request->section_id,
            'device_notes' => $request->device_notes,
            'device_status' => '0',
            'device_api_key'=> $apikey,
            'user_id' => $user_id,
        ]);

        if ($sensordevices) {
            return redirect()
                ->route('sensor-device-auto.index')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sensordevices = SensorDeviceAuto::findOrFail($id);
        $sensortypes = SensorType::latest()->get();
        $farmsections = FarmSection::oldest()->get();
        return view('module.sensordeviceauto.edit', compact('sensordevices','sensortypes','farmsections'));
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

        $sensordevices = SensorDeviceAuto::findOrFail($id);
        $user_id = Auth::user()->id;

        $sensordevices->update([
            'device_id'     => $request->device_id,
            'device_name'     => $request->device_name,
            'type_id' => $request->type_id,
            'section_id' => $request->section_id,
            'device_notes' => $request->device_notes,
            'user_id' => $user_id,
            'updated_at' => Carbon::now(),
        ]);

        if ($sensordevices) {
            return redirect()
                ->route('sensor-device-auto.index')
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
        $sensordevices = SensorDeviceAuto::findOrFail($id);
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

    public function updateValue($id,$status)
    {
        $sensordevices = SensorDeviceAuto::find($id);
        $sensordevices->device_last_value = $status;
        $sensordevices->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}
