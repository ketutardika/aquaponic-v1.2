<?php
   
namespace App\Http\Controllers\API;
   
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\SensorDatalog;
use Validator;
use Illuminate\Http\Request;
   
class SensorDatalogController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SensorDatalogs = SensorDatalog::latest()->get();

        return response()->json([
            'success'   => true,
            'message'   => 'Sensor Datalog retrieved successfully.',
            'data'  => $SensorDatalogs,
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
            'data_reading' => 'required',
            'data_measurement' => 'required',           
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $SensorDatalog = SensorDatalog::create($input);

        return response()->json([
            'success'       => true,
            'message'       => 'Sensor Datalog created successfully.',
            'data'    		=> $SensorDatalog
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
        $SensorDatalog = SensorDatalog::find($id);
 
        if($SensorDatalog) {

            return response()->json([
                'success' => true,
                'message'   => 'Sensor Datalog retrieved successfully.',
                'data' => $SensorDatalog
            ], 200);

        } else {

            return response()->json([
                'success' => false,
                'message'   => 'Sensor Datalog Device not found.',
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
    public function update(Request $request, SensorDatalog $SensorDatalog)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'device_id' => 'required',
            'data_reading' => 'required',
            'data_measurement' => 'required',     
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $SensorDatalog->device_id = $input['device_id'];
        $SensorDatalog->data_reading = $input['data_reading'];
        $SensorDatalog->data_measurement= $input['data_measurement'];
        $SensorDatalog->save();
   
        return response()->json([
            'success'       => true,
            'message'       => 'Sensor Datalog updated successfully.',
            'data'    		=> $SensorDatalog
        ]);
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SensorDatalog $SensorDatalog)
    {
        $SensorDatalog->delete();
   
        return response()->json([
            'success'       => true,
            'message'       => 'Sensor Config deleted successfully.',
            'data'    		=> $SensorDatalog
        ]);
    }
}