<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TaskList;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TasklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasklists = TaskList::oldest()->get();
        return view('module.tasklist.index', compact('tasklists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('module.tasklist.create');
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
            'tasklist_name' => 'required',
            'interval_value' => 'required',
            'interval_date' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $user_id = Auth::user()->id;

        $tasklists = TaskList::create([
            'tasklist_name'     => $request->tasklist_name,
            'tasklist_description' => $request->tasklist_description,
            'interval_value' => $request->interval_value,
            'interval_date' => $request->interval_date,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => $user_id,
        ]);

        if ($tasklists) {
            return redirect()
                ->route('tasklist.index')
                ->with([
                    'success' => 'New Tasklist has been created successfully'
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
    public function show()
    {
        $tasklists = TaskList::oldest()->get();
        return view('module.tasklist.show', compact('tasklists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasklists = TaskList::findOrFail($id);
        return view('module.tasklist.edit', compact('tasklists'));
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
        //validate form
        $this->validate($request, [
            'tasklist_name' => 'required',
            'interval_value' => 'required',
            'interval_date' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $tasklists = TaskList::findOrFail($id);

        $user_id = Auth::user()->id;

        $tasklists->update([
            'tasklist_name'     => $request->tasklist_name,
            'tasklist_description' => $request->tasklist_description,
            'interval_value' => $request->interval_value,
            'interval_date' => $request->interval_date,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => $user_id,
        ]);

        if ($tasklists) {
            return redirect()
                ->route('tasklist.index')
                ->with([
                    'success' => 'New Tasklist has been created successfully'
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
         //
        $tasklists = TaskList::findOrFail($id);
        $tasklists->delete();

        if($tasklists){
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
