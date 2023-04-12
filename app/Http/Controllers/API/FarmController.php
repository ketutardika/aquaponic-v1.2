<?php
   
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Farm;
use Validator;
use Illuminate\Http\Request;

class FarmController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;

    public function __construct(Request $request)
    {
        $this->middleware('auth:api');
        $this->user = $request->user();
    }
    
    public function index()
    {
        $farms = Farm::latest()->get();
        return response()->json([
            'success'   => true,
            'message'   => 'List Data Farm',
            'data'  => $farms,
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
            'farm_name' => 'required',
            'farm_type' => 'required',
            'farm_description' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $Farm = Farm::create($input);

        return response()->json([
            'success'       => true,
            'message'       => 'Farm created successfully.',
            'farm'    		=> $Farm
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
        $farm = Farm::find($id);

        if($farm) {

            return response()->json([
                'success' => true,
                'message'   => 'Detail Data Farm',
                'farm' => $farm
            ], 200);

        } else {

            return response()->json([
                'success' => false,
                'message'   => 'Data Farm Not Found',
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
    public function update(Request $request, Farm $Farm)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'farm_name' => 'required',
            'farm_type' => 'required',
            'farm_description' => 'required'

        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $Farm->farm_name = $input['farm_name'];
        $Farm->farm_type = $input['farm_type'];
        $Farm->farm_description = $input['farm_description'];
        $Farm->save();   
        
        return response()->json([
            'success'       => true,
            'message'       => 'Farm updated successfully.',
            'farm'          => $Farm
        ]);
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $Farm)
    {
        $Farm->delete();
   
        return response()->json([
            'success'       => true,
            'message'       => 'Farm deleted successfully.',
            'farm'          => $Farm
        ]);
    }
}