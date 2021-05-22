<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use App\Model\Menu;
use App\Model\Dominion;
use App\Model\Process;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate(10);
        return view('admin.system_settings.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentMenus     = Menu::where('parent_id', null )->get();
        $dominions       = Dominion::get();
        $processes       = Process::get();
        return view('admin.system_settings.menu.create', compact( 'parentMenus', 'dominions', 'processes' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $this->getRouteNameAttributes($request);
        Menu::create($request->all());
        return redirect()->route('menu.index')->with('success', 'Menu successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Menu $menu )
    {
        return view('admin.system_settings.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Menu $menu )
    {
        $parentMenus    = Menu::where('parent_id', null )->where('id', '!=', $menu->id)->get();
        $dominions      = Dominion::get();
        $processes      = Process::get();
        return view('admin.system_settings.menu.edit', compact('parentMenus', 'menu', 'dominions', 'processes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        $this->getRouteNameAttributes($request);
        $menu->update($request->all());
        return redirect()->back()->with('success', 'Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Menu $menu )
    {
        $menu->delete();
        return redirect()->back()->with('success', 'Menu deleted successfully');
    }

    public function menuProcess(Request $request){

        if(!empty($request['dominion_id'])){
            $dominion_id = $request['dominion_id']; 
            if( $dominion_id ){
                $processes = Process::where('dominion_id', $dominion_id)->get();
               
                return response()->json(['processes' => $processes]);
            } 
        }
        
        return response()->json(['processes'=>'']);
    }

    private function getRouteNameAttributes($request){
        if(!empty($request->dominion_id) && !empty($request->dominion_id)){
            $dominion_name = strtolower(Dominion::where('id', $request->dominion_id)->pluck('name')->first()); 
            $process_name  = strtolower(Process::where('id', $request->process_id)->pluck('name')->first()); 
        
            return $request['route_name'] = $dominion_name . '.' . $process_name;
        }
        $request['route_name'] = NULL;
    }
}
