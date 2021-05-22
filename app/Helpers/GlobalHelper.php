<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Auth;

class GlobalHelper extends Model{
	protected static function getGuard(){

		if( Auth::guard('admin')->check() ){
			return "admin";
		} else if(Auth::guard('teacher')->check()){
			return "teacher";
		} else if(Auth::guard('guardian')->check()){
			return "guardian";
		} else {
			return 'web';
		}
		
	}

}