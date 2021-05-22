<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProcessRequest;
use App\Model\Process;
use App\Model\Dominion;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcumbs = $this->breadcumbs('Process', 'index');
        $processes  = Process::paginate(10);
        return view('admin.system_settings.process.index', compact('processes', 'breadcumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcumbs = $this->breadcumbs('Process', 'create');
        $dominions  = Dominion::get();
        return view('admin.system_settings.process.create', compact('dominions', 'breadcumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \pp\Http\Requests\ProcessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcessRequest $request)
    {
        $data = $this->setProcessRouteNameAttribute($request->all());
        $process = Process::create($data);
        return redirect()->route('process.index')->with( 'success', 'Process successfully created' );
    }

    /**
     * Display the specified resource.
     *
     * @param  Object  $process
     * @return \Illuminate\Http\Response
     */
    public function show( Process $process )
    {
        $breadcumbs = $this->breadcumbs('Process', 'show');
        return view('admin.system_settings.process.show', compact('process', 'breadcumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Object  $process
     * @return \Illuminate\Http\Response
     */
    public function edit( Process $process )
    {
        $breadcumbs = $this->breadcumbs('Process', 'edit');
        $dominions  = Dominion::get();
        return view('admin.system_settings.process.edit', compact('process', 'dominions', 'breadcumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProcessRequest  $request
     * @param  Object  $process
     * @return \Illuminate\Http\Response
     */
    public function update( ProcessRequest $request, Process $process )
    {
        $data = $this->setProcessRouteNameAttribute($request->all());
        $process->update($data);
        return redirect()->back()->with('success', 'Process updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Object  $process
     * @return \Illuminate\Http\Response
     */
    public function destroy( Process $process )
    {
        $process->delete();
        return redirect()->back()->with('success', 'Process deleted successfully'); 
    }

    private function setProcessRouteNameAttribute( $request ){
        $dominion_name = strtolower(Dominion::find($request['dominion_id'])->name);
        $request['route_name'] = $dominion_name . '.' . strtolower($request['name']); 
        return $request;
    }
}
