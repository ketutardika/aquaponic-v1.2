<?php
   
namespace App\Http\Controllers\API;
   
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\SensorConfig;
use Validator;
use Illuminate\Http\Request;
   
class SensorConfigController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SensorConfigs = SensorConfig::latest()->get();

        return response()->json([
            'success'   => true,
            'message'   => 'Sensor Configs retrieved successfully.',
            'data'  => $SensorConfigs,
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
            'min_value' => 'required',
            'max_value' => 'required',
            'deepsleep_time' => 'required',            
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $SensorConfig = SensorConfig::create($input);
   
        return response()->json([
            'success'       => true,
            'message'       => 'Sensor Config created successfully.',
            'data'    		=> $SensorConfig
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
        $SensorConfig = SensorConfig::find($id);

        if($SensorConfig) {

            return response()->json([
                'success' => true,
                'message'   => 'Sensor Config retrieved successfully.',
                'data' => $SensorConfig
            ], 200);

        } else {

            return response()->json([
                'success' => false,
                'message'   => 'Sensor Config Device not found.',
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
    public function update(Request $request, SensorConfig $SensorConfig)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'device_id' => 'required',
            'min_value' => 'required',
            'max_value' => 'required',
            'deepsleep_time' => 'required',  
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $SensorConfig->device_id = $input['device_id'];
        $SensorConfig->min_value = $input['min_value'];
        $SensorConfig->max_value = $input['max_value'];
        $SensorConfig->deepsleep_time = $input['deepsleep_time'];
        $SensorConfig->save();

        return response()->json([
            'success'       => true,
            'message'       => 'Sensor Config updated successfully.',
            'data'    		=> $SensorConfig
        ]);
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SensorConfig $SensorConfig)
    {
        $SensorConfig->delete();
   
        return response()->json([
            'success'       => true,
            'message'       => 'Sensor Config deleted successfully.',
            'data'    		=> $SensorConfig
        ]);
    }
}