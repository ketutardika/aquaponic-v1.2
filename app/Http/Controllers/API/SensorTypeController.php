<?php
   
namespace App\Http\Controllers\API;
   
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\SensorType;
use Validator;
use Illuminate\Http\Request;
   
class SensorTypeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SensorTypes = SensorType::latest()->get();
    
        return response()->json([
            'success'   => true,
            'message'   => 'List Data Sensor Type',
            'data'  => $SensorTypes,
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
            'sensor_type_name' => 'required',
	        'sensor_type_code' => 'required',
	        'sensor_type_measurement' => 'required',
	        'sensor_type_measurement_code' => 'required',
	        'sensor_type_description' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $SensorType = SensorType::create($input);
   
        return response()->json([
            'success'       => true,
            'message'       => 'Sensor Type created successfully.',
            'data'    		=> $SensorType
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
        $SensorType = SensorType::find($id);

        if($SensorType) {

            return response()->json([
                'success' => true,
                'message'   => 'Detail Data Sensor Type',
                'data' => $SensorType
            ], 200);

        } else {

            return response()->json([
                'success' => false,
                'message'   => 'Data Sensor Type Not Found',
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
    public function update(Request $request, SensorType $SensorType)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'sensor_type_name' => 'required',
	        'sensor_type_code' => 'required',
	        'sensor_type_measurement' => 'required',
	        'sensor_type_measurement_code' => 'required',
	        'sensor_type_description' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $SensorType->sensor_type_name = $input['sensor_type_name'];
        $SensorType->sensor_type_code = $input['sensor_type_code'];
        $SensorType->sensor_type_measurement = $input['sensor_type_measurement'];
        $SensorType->sensor_type_measurement_code = $input['sensor_type_measurement_code'];
        $SensorType->sensor_type_description = $input['sensor_type_description'];
        $SensorType->save();

        return response()->json([
            'success'       => true,
            'message'       => 'Sensor Type updated successfully.',
            'data'    		=> $SensorType
        ]);
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SensorType $SensorType)
    {
        $SensorType->delete();
   
        return response()->json([
            'success'       => true,
            'message'       => 'Sensor Type deleted successfully.',
            'data'    		=> $SensorType
        ]);
    }
}