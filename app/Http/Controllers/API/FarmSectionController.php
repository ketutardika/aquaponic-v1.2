<?php
   
namespace App\Http\Controllers\API;
   
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\FarmSection;
use Validator;
use Illuminate\Http\Request;
   
class FarmSectionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farms = FarmSection::latest()->get();
        return response()->json([
            'success'   => true,
            'message'   => 'List Data Farm Section',
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
            'section_name' => 'required',
            'section_type' => 'required',
            'section_description' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $FarmSection = FarmSection::create($input);
   
        return response()->json([
            'success'       => true,
            'message'       => 'Farm Section created successfully.',
            'data'    		=> $FarmSection
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
        $FarmSection = FarmSection::find($id);

        if($FarmSection) {

            return response()->json([
                'success' => true,
                'message'   => 'Detail Data Farm Section',
                'data' => $FarmSection
            ], 200);

        } else {

            return response()->json([
                'success' => false,
                'message'   => 'Data Farm Section Not Found',
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
    public function update(Request $request, FarmSection $FarmSection)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'section_name' => 'required',
            'section_type' => 'required',
            'section_description' => 'required'

        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $FarmSection->section_name = $input['section_name'];
        $FarmSection->section_type = $input['section_type'];
        $FarmSection->section_description = $input['section_description'];
        $FarmSection->farm_id = $input['farm_id'];
        $FarmSection->user_id = $input['user_id'];
        $FarmSection->save();
   
        return response()->json([
            'success'       => true,
            'message'       => 'Farm Section updated successfully.',
            'data'    		=> $FarmSection
        ]);
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FarmSection $FarmSection)
    {
        $FarmSection->delete();

        return response()->json([
            'success'       => true,
            'message'       => 'Farm Section deleted successfully.',
            'data'    		=> $FarmSection
        ]);
    }
}