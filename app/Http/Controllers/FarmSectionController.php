<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FarmSection;
use App\Models\SensorDevice;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FarmSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    function __construct()
    {
         $this->middleware('permission:farm-section-list|farm-section-create|farm-section-edit|farm-section-delete', ['only' => ['index','store']]);
         $this->middleware('permission:farm-section-create', ['only' => ['create','store']]);
         $this->middleware('permission:farm-section-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:farm-section-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $farmsections = FarmSection::oldest()->get();
        $allsensors = SensorDevice::where('device_active', '=', 1)->oldest()->get();
        return view('module.farmsection.index', compact('farmsections','allsensors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sensordevices = SensorDevice::where('device_active', '=', 1)->oldest()->get();
        return view('module.farmsection.create', compact('sensordevices'));
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
            'section_name'     => 'required',
            'section_type'     => 'required',
        ]);

        $user_id = Auth::user()->id;

        $farmsections = FarmSection::create([
            'section_name'     => $request->section_name,
            'section_type'     => $request->section_type,
            'section_description'   => $request->section_description,
            'sensor_devices' => json_encode($request->sensor_devices),
            'user_id' => $user_id,
        ])->sensordevicefarms()->sync($request->sensor_devices);

        if ($farmsections) {
            return redirect()
                ->route('farm-section.index')
                ->with([
                    'success' => 'New Farm Section has been created successfully'
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
        $farmsections = FarmSection::findOrFail($id);
        $sensor_devices = json_decode($farmsections->sensor_devices,TRUE);
        $allsensors = SensorDevice::where('device_active', '=', 1)->oldest()->get();
        $sensors = SensorDevice::whereIn('id', json_decode($farmsections->sensor_devices))->get();
        return view('module.farmsection.edit', compact('farmsections','sensor_devices','allsensors','sensors'));
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
            'section_name'     => 'required',
            'section_type'     => 'required',
        ]);

        $farmsections = FarmSection::findOrFail($id);

        $user_id = Auth::user()->id;

        $farmsections->update([
            'section_name'     => $request->section_name,
            'section_type'     => $request->section_type,
            'section_description'   => $request->section_description,
            'sensor_devices' => json_encode($request->sensor_devices),
            'user_id' => $user_id,
            'updated_at' => Carbon::now(),
        ]);

        DB::table('sensor_device_farm')->where('section_id',$id)->delete();

        $farmsections->sensordevicefarms()->sync($request->sensor_devices);

        if ($farmsections) {
            return redirect()
                ->route('farm-section.index')
                ->with([
                    'success' => 'Data Farm Section has been edited successfully'
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
        $farmsections = FarmSection::findOrFail($id);
        $farmsections->delete();
        DB::table('sensor_device_farm')->where('section_id',$id)->delete();

        if($farmsections){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
