<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Model\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->breadcumbs('Role', 'index');
        
        $roles = Role::paginate(10);
        return view('admin.system_settings.role.index', compact('roles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->breadcumbs('Role', 'create');
        return view('admin.system_settings.role.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        Role::create($request->all());
        return redirect(route('role.index'))->with('success', 'Role successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $title = $this->breadcumbs('Role', 'show');
        return view('admin.system_settings.role.show', compact('role', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $title = $this->breadcumbs('Role', 'edit');
        return view('admin.system_settings.role.edit', compact('role', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\RoleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        return redirect()->back()->with('success', 'Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('role.index'))->with('success', 'Role deleted');
    }
}
