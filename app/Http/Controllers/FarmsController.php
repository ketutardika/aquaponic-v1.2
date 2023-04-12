<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Farm;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FarmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    function __construct()
    {
         $this->middleware('permission:farms-list|farms-create|farms-edit|farms-delete', ['only' => ['index','store']]);
         $this->middleware('permission:farms-create', ['only' => ['create','store']]);
         $this->middleware('permission:farms-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:farms-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $farms = Farm::oldest()->get();
        return view('module.farms.dashboard', compact('farms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('module.farms.create');
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
            'farm_name'     => 'required',
            'farm_type'     => 'required',
        ]);

        $user_id = Auth::user()->id;

        $farms = Farm::create([
            'farm_name'     => $request->farm_name,
            'farm_type'     => $request->farm_type,
            'farm_description'   => $request->farm_description,
            'user_id' => $user_id,
        ]);

        if ($farms) {
            return redirect()
                ->route('farms.index')
                ->with([
                    'success' => 'New Farm has been created successfully'
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
        $farms = Farm::findOrFail($id);
        return view('module.farms.edit', compact('farms'));
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
            'farm_name'     => 'required',
            'farm_type'     => 'required',
        ]);

        $farms = Farm::findOrFail($id);
        $user_id = Auth::user()->id;

        $farms->update([
            'farm_name'     => $request->farm_name,
            'farm_type'     => $request->farm_type,
            'farm_description'   => $request->farm_description,
            'user_id' => $user_id,
            'updated_at' => Carbon::now(),
        ]);

        if ($farms) {
            return redirect()
                ->route('farms.index')
                ->with([
                    'success' => 'Data Farm has been edited successfully'
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
        $farms = Farm::findOrFail($id);
        $farms->delete();

        if($farms){
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
