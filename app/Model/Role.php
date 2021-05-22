<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class Role extends Model
{
    protected $fillable = [
    	'name', 'guard'
    ];

    public function getCreatedAtAttribute( $value ){
    	return Carbon::parse($value)->format('M d, Y');
    }

    public function admins(){
    	return $this->hasMany('App\Admin');
    }

    public function permission(){
    	return $this->hasOne('App\Model\Permission');
    }

}
