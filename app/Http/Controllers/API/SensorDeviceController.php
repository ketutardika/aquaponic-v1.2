<?php
   
namespace App\Http\Controllers\API;
   
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Response;
use App\Models\SensorDevice;
use App\Models\SensorDatalog;
use App\Models\SensorData;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
   
class SensorDeviceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SensorDevices = SensorDevice::latest()->get();
    
        return response()->json([
            'success'   => true,
            'message'   => 'Sensor Devices retrieved successfully.',
            'data'  => $SensorDevices,
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'device_id' => 'required',
	        'device_name' => 'required',
	        'type_id' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $SensorDevice = SensorDevice::create($input);
   
        return response()->json([
            'success'       => true,
            'message'       => 'Sensor Device created successfully.',
            'data'    		=> $SensorDevice
        ]);
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SensorDevice = SensorDevice::find($id);

        if($SensorDevice) {

            return response()->json([
                'success' => true,
                'message'   => 'Sensor Device retrieved successfully.',
                'data' => $SensorDevice
            ], 200);

        } else {

            return response()->json([
                'success' => false,
                'message'   => 'Sensor Device not found.',
            ], 404);

        }
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SensorDevice $SensorDevice)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
	        'device_name' => 'required',
	        'type_id' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $SensorDevice->device_id = $input['device_id'];
        $SensorDevice->device_name = $input['device_name'];
        $SensorDevice->device_notes = $input['device_notes'];
        $SensorDevice->device_last_value = $input['device_last_value'];
        $SensorDevice->device_last_check = $input['device_last_check'];
        $SensorDevice->device_status = $input['device_status'];
        $SensorDevice->device_api_key = $input['device_api_key'];
        $SensorDevice->type_id = $input['type_id'];
        $SensorDevice->section_id = $input['section_id'];
        $SensorDevice->farm_id = $input['farm_id'];
        $SensorDevice->user_id = $input['user_id'];
        $SensorDevice->save();
   
        return response()->json([
            'success'       => true,
            'message'       => 'Sensor Device updated successfully.',
            'data'    		=> $SensorDevice
        ]);
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SensorDevice $SensorDevice)
    {
        $SensorDevice->delete();
        return response()->json([
            'success'       => true,
            'message'       => 'Sensor Device deleted successfully.',
            'data'    		=> $SensorDevice
        ]);
    }
    public function data($unique_id, $value, $measurement)
    {
        $datalog_sensor = SensorDevice::where('device_api_key', '=', $unique_id)->first();
        $datalog = new SensorData();        
        $datalog->device_id = $datalog_sensor->id;
        $datalog->data_reading = $value;
        $datalog->data_measurement = $measurement;
        $datalog->created_at = Carbon::now();
        $datalog->updated_at = Carbon::now();
        $datalog->save();

        $datalog = new SensorDatalog();
        $datalog->device_id = $datalog_sensor->id;
        $datalog->device_code = $datalog_sensor->device_id;
        $datalog->data_reading = $value;
        $datalog->data_measurement = $measurement;
        $datalog->created_at = Carbon::now();
        $datalog->updated_at = Carbon::now();
        $datalog->save();

        $sensor = SensorDevice::where('id', '=', $datalog_sensor->id)->first();
        $sensor->device_last_value = $value;
        $sensor->device_last_check = Carbon::now();
        $sensor->save();

        if($datalog) {
            return response()->json([
                'success' => true,
                'message'   => 'Sensor Device Successfully Recorded.',
                'data' => $datalog
            ], 200);

        } else {
            return response()->json([
                'success' => false,
                'message'   => 'Sensor Device not found.',
            ], 404);
        }
    }

    public function datalog_device(Request $request)
    {
        $data = $request->validate([
            'unique_id' => 'required',
            'value' => 'required',
            'measurement' => 'required',
        ]);

        $datalog_sensor = SensorDevice::where('device_api_key', '=', $data['unique_id'])->first();

        $datalog = new SensorDatalog();
        $datalog->device_id = $datalog_sensor->id;
        $datalog->device_code = $datalog_sensor->device_id;
        $datalog->data_reading = $data['value'];
        $datalog->data_measurement = $data['measurement'];
        $datalog->created_at = Carbon::now();
        $datalog->updated_at = Carbon::now();
        $datalog->save();

        $sensor = SensorDevice::where('id', '=', $datalog_sensor->id)->first();
        $sensor->device_last_value = $data['value'];
        $sensor->device_last_check = Carbon::now();
        $sensor->save();

        if($datalog) {
            return response()->json([
                'message'   => 'Sensor Device '.$datalog->device_code.' Successfully Recorded. with value : '.$datalog->data_reading.'°'.$datalog->data_measurement,
            ], 200);

        } else {
            return response()->json([
                'success' => false,
                'message'   => 'Sensor Device not found.',
            ], 404);
        }
    }
}