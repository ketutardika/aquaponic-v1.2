<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SensorDevice;
use App\Models\SensorDeviceAuto;
use App\Models\SensorDatalog;
use App\Models\TaskList;
use App\Models\Crop;
use App\Models\Fish;
use App\Models\FarmSection;
use App\Models\User;
use App\Models\TaskActivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       $crops = Crop::oldest()->limit(6)->get();
       $fishs = Fish::oldest()->limit(6)->get();
       $farmsections = FarmSection::oldest()->get();
       $sensordevices = SensorDevice::where('device_active', '1')->oldest()->get();
       $sensorAutoDevices = SensorDeviceAuto::findOrFail(4);
       $tasklists = TaskList::oldest()->limit(5)->get();
       $taskactivities = TaskActivity::latest()->limit(6)->get();
       return view('module.dashboard.index', compact('sensordevices','tasklists','crops','fishs','farmsections','taskactivities', 'sensorAutoDevices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
    }

    public function taskcomplete($id)
    {
        $tasklist = TaskList::findOrFail($id);
        $tasklist->complete = !$tasklist->complete;

        $user_id = Auth::user()->id;

        $taskactivities = TaskActivity::create([
            'activity_name' => $tasklist->tasklist_name,
            'user_id' => $user_id,
        ]);

        $tasklist->save();

        return redirect()
                ->route('dashboard.index')
                ->with([
                    'success' => 'Task updated successfully'
                ]);
    }
}
