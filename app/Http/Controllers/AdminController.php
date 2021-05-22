<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUpdateRequest;
use App\Http\Requests\AdminCreateRequest;
use App\Admin;
use App\Model\Role;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('admin.admin');
    }

    public function profileView(Admin $admin)
    {
        if( Auth::id() == $admin->id ){
            return view('admin.profile.profile', compact('admin'));
        } 
        return redirect()->back()->with('error', 'You are not authorized to do this');
    }

    public function updateProfile(AdminUpdateRequest $request, Admin $admin)
    {

        if( Auth::id() == $admin->id ){

           $admin->update($request->all());

           // If admin upload Image condition

            if($request->hasFile('image')){
                Admin::UploadImage($request->image);   
            } 

            return redirect()->back()->with('success', 'Profile updating successfull'); 
        } 
        
        return redirect()->back()->with('error', 'You are not authorized to do this');  
    }

    public function index(){
        $admins = Admin::paginate(10);
        return view('admin.admin.index', compact('admins'));
    }

    public function create(){
        $roles = Role::all();
        return view('admin.admin.create', compact('roles'));
    }

    public function store(AdminCreateRequest $request){ 
        Admin::create($request->all());
        return redirect()->route('admin.index')->with('success','Admin successfully created');
    }

    public function show(Admin $admin){
        return view('admin.admin.show', compact('admin'));
    }

    public function edit(Admin $admin){
        $roles = Role::get();
        return view('admin.admin.edit', compact('admin', 'roles'));
    }

    public function update(AdminCreateRequest $request, Admin $admin){
        $admin->update($request->all());
        return redirect()->back()->with('success', 'Admin successfully updated');
    }

    public function destroy(Admin $admin){
        $admin->delete();
        return redirect()->back()->with('success', 'Admin deleted successfully');
    }
}
