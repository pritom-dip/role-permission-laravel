<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Permission extends Model
{
    protected $fillable = [
    	'role_id', 'permissions'
    ];

    public function role(){
    	return $this->belongsTo('App\Model\Role');
    }

    public function setPermissionsAttribute($value){
        $this->attributes['permissions'] = json_encode($value);
    }

    public function getPermissionsAttribute($value){
    	return json_decode($value, true);
    }

    public static function getRollHasPermissionList($role_id)
    {
        $permissions = Permission::where('role_id', $role_id)->first()->permissions;
        
        $processList = [];

        foreach ( $permissions as $permission ) { 

            $permission = json_decode($permission);

            $processList[$permission->id] = $permission->id;

            // $abc = array_combine(array_column(json_decode($permission->permissions, true), 'id'), array_column(json_decode($permissions->permissions, true), 'id'));

            // dd($abc);
        }

        return $processList;
    }

    public static function roleHasSpecificPermission($value){

        $user_permissions   = Auth::user()->role->permission->permissions;
        $specificPermission = false;

        if( Auth::user()->role->name == 'Super Admin' ){
            return true;
        }

        foreach ($user_permissions as $permission) {
           $permission = json_decode($permission);
            if($permission->route_name == $value){
                $specificPermission = true;
                break;
            }
        }

        return $specificPermission;
    }

}
