<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FarmBlock;
use App\Models\FarmSection;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FarmBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farmblocks = FarmBlock::all();
        $farmsections = FarmSection::all();
        return view('module.farmblock.index', compact('farmblocks','farmsections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $farmsections = FarmSection::all();
        return view('module.farmblock.create', compact('farmsections'));
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
            'block_name'     => 'required',
            'farm_section'     => 'required',
        ]);

        $user_id = Auth::user()->id;

        $farmblocks = FarmBlock::create([
            'block_name'     => $request->block_name,
            'section_id'     => $request->farm_section,
            'block_description'   => $request->block_description,
            'user_id' => $user_id,
        ]);

        if ($farmblocks) {
            return redirect()
                ->route('farm-block.index')
                ->with([
                    'success' => 'New Farm Block has been created successfully'
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
        $farmblocks = FarmBlock::findOrFail($id);
        $farmsections = FarmSection::all();
        return view('module.farmblock.edit', compact('farmblocks','farmsections'));
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
            'block_name'     => 'required',
            'farm_section'     => 'required',
        ]);

        $farmblocks = FarmBlock::findOrFail($id);

        $user_id = Auth::user()->id;

        $farmblocks->update([
            'block_name'     => $request->block_name,
            'section_id'     => $request->farm_section,
            'block_description'   => $request->block_description,
            'user_id' => $user_id,
            'updated_at' => Carbon::now(),
        ]);

        if ($farmblocks) {
            return redirect()
                ->route('farm-block.index')
                ->with([
                    'success' => 'Data Farm Block has been updated successfully'
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
        $farmblocks = FarmBlock::findOrFail($id);
        $farmblocks->delete();

        if($farmblocks){
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
