<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DominionRequest;
use App\Model\Dominion;
use App\Model\Process;

class DominionController extends Controller
{

    public function __construct(){
        // $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dominions = Dominion::paginate();
        return view('admin.system_settings.dominion.index', compact('dominions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.system_settings.dominion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DominionRequest $request)
    {
        $dominion = Dominion::create($request->all());

        if( $dominion ){
            // Save he seven processes when Dominion created
            $this->saveProcesses($dominion);   
        }

        return redirect()->route('dominion.index')->with('success', 'Dominion created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dominion $dominion)
    {
        return view('admin.system_settings.dominion.show', compact('dominion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dominion $dominion)
    {
        return view('admin.system_settings.dominion.edit', compact('dominion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DominionRequest $request, Dominion $dominion)
    {
        $dominion->update($request->all());

        if( $dominion ){
            // update he seven processes when Dominion created
            $this->saveProcesses($dominion);   
        }

        return redirect()->back()->with('success', 'Dominion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dominion $dominion)
    {
        $dominion->delete();
        return redirect(route('dominion.index'))->with('success', 'Dominion deleted');
    }

    protected function saveProcesses($dominion){
        $process    = Dominion::GetAllProcesses();
        $getProcess = Process::where('dominion_id', $dominion->id)->get();

        // Check if Process is already exists or not...

        if( $getProcess->isNotEmpty() ){

            foreach($getProcess as $prop){
                $prop->update([
                    'route_name'    => strtolower($dominion->name) . '.' . strtolower($prop->name)
                ]);
            }

        } else {
            foreach($process as $prop){
                $dominion->processes()->create([ 
                    'name'          => ucfirst($prop),
                    'guard'         => 'admin',
                    'route_name'    => strtolower($dominion->name) . '.' . $prop
                ]);
            }
        }

        return true;
    }
}
