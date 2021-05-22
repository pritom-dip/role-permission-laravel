<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Dominion;

class Process extends Model
{
    protected $fillable = [
    	'dominion_id', 'guard', 'name', 'route_name'
    ];

    public function dominion(){
    	return $this->belongsTo('App\Model\Dominion');
    }

    public function menus(){
        return $this->hasMany('App\Model\Menu');
    }
}
