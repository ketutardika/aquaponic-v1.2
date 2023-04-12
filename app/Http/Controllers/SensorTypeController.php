<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SensorType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SensorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    function __construct()
    {
         $this->middleware('permission:sensor-type-list|sensor-type-create|sensor-type-edit|sensor-type-delete', ['only' => ['index','store']]);
         $this->middleware('permission:sensor-type-create', ['only' => ['create','store']]);
         $this->middleware('permission:sensor-type-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:sensor-type-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $sensortypes = SensorType::latest()->get();
        return view('module.sensortype.index', compact('sensortypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('module.sensortype.create');
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
            'sensor_type_name'     => 'required',
            'sensor_type_code'     => 'required',
        ]);

        $user_id = Auth::user()->id;

        $sensortypes = SensorType::create([
            'sensor_type_name'     => $request->sensor_type_name,
            'sensor_type_code'     => $request->sensor_type_code,
            'sensor_type_measurement' => $request->sensor_type_measurement,
            'sensor_type_measurement_code' => $request->sensor_type_measurement_code,
            'sensor_type_description'   => $request->sensor_type_description,
            'user_id' => $user_id,
        ]);

        if ($sensortypes) {
            return redirect()
                ->route('sensor-type.index')
                ->with([
                    'success' => 'New Sensor Type has been created successfully'
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
        $sensortypes = SensorType::findOrFail($id);
        return view('module.sensortype.edit', compact('sensortypes'));
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
            'sensor_type_name'     => 'required',
            'sensor_type_code'     => 'required',
        ]);

        $sensortypes = SensorType::findOrFail($id);

        $user_id = Auth::user()->id;

        $sensortypes->update([
            'sensor_type_name'     => $request->sensor_type_name,
            'sensor_type_code'     => $request->sensor_type_code,
            'sensor_type_measurement' => $request->sensor_type_measurement,
            'sensor_type_measurement_code' => $request->sensor_type_measurement_code,
            'sensor_type_description'   => $request->sensor_type_description,
            'user_id' => $user_id,
            'updated_at' => Carbon::now(),
        ]);

        if ($sensortypes) {
            return redirect()
                ->route('sensor-type.index')
                ->with([
                    'success' => 'Data Section Type has been edited successfully'
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
        $sensortypes = SensorType::findOrFail($id);
        $sensortypes->delete();

        if($sensortypes){
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
