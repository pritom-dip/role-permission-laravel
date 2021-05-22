<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
	protected $redirectTo = '/admin';

	public function __construct(){
		$this->middleware('guest:admin')->except('adminLogout');
	}

    public function showLoginForm(){
    	return view('auth.admin.admin-login');
    }

    public function login(Request $request){
        
        $this->validate($request, [
            'email' 	=> 'required|email',
            'password'  => 'required|min:8'
        ]);

        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        $logic = Auth::guard('admin')->attempt($credentials, $request->remember);

        if( $logic ){
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInput(['email', 'remember']);
    }

    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
