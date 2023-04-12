<?php
   
namespace App\Http\Controllers\API;
   
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\SettingGeneral;
use Validator;
use Illuminate\Http\Request;

class SettingGeneralController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SettingGenerals = SettingGeneral::latest()->get();

        return response()->json([
            'success'   => true,
            'message'   => 'Setting General retrieved successfully.',
            'data'  => $SettingGenerals,
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
            'general_title' => 'required',
            'general_tagline' => 'required',
            'general_description' => 'required',  
            'general_email' => 'required',
            'general_phone' => 'required',
            'general_theme' => 'required', 
            'general_logo' => 'required',
            'general_favicon' => 'required',
            'general_language' => 'required',
            'general_timezone' => 'required',
            'general_date_format' => 'required',
            'general_time_format' => 'required',  
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $SettingGeneral = SettingGeneral::create($input);

        return response()->json([
            'success'       => true,
            'message'       => 'Setting General created successfully.',
            'data'    		=> $SettingGeneral
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
        $SettingGeneral = SettingGeneral::find($id);

        if($SettingGeneral) {

            return response()->json([
                'success' => true,
                'message'   => 'Setting General retrieved successfully.',
                'data' => $SettingGeneral
            ], 200);

        } else {

            return response()->json([
                'success' => false,
                'message'   => 'Setting General not found.',
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
    public function update(Request $request, SettingGeneral $SettingGeneral)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'general_title' => 'required',
            'general_tagline' => 'required',
            'general_description' => 'required',  
            'general_email' => 'required',
            'general_phone' => 'required',
            'general_theme' => 'required', 
            'general_logo' => 'required',
            'general_favicon' => 'required',
            'general_language' => 'required',
            'general_timezone' => 'required',
            'general_date_format' => 'required',
            'general_time_format' => 'required',  
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $SettingGeneral->general_title = $input['general_title'];
        $SettingGeneral->general_tagline = $input['general_tagline'];
        $SettingGeneral->general_description= $input['general_description'];
        $SettingGeneral->general_email= $input['general_email'];
        $SettingGeneral->general_phone = $input['general_phone'];
        $SettingGeneral->general_theme= $input['general_theme'];
        $SettingGeneral->general_logo = $input['general_logo'];
        $SettingGeneral->general_favicon = $input['general_favicon'];
        $SettingGeneral->general_language= $input['general_language'];
        $SettingGeneral->general_timezone= $input['general_timezone'];
        $SettingGeneral->general_date_format = $input['general_title'];
        $SettingGeneral->general_time_format = $input['general_tagline'];
        $SettingGeneral->save();
   
        return response()->json([
            'success'       => true,
            'message'       => 'Setting General updated successfully.',
            'data'    		=> $SettingGeneral
        ]);
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SettingGeneral $SettingGeneral)
    {
        $SettingGeneral->delete();
   
        return response()->json([
            'success'       => true,
            'message'       => 'Setting General deleted successfully.',
            'data'    		=> $SettingGeneral
        ]);
    }
}