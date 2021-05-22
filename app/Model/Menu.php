<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
    	'parent_id', 'dominion_id', 'process_id', 'name', 'params', 'icon', 'route_name', 'guard', 'position'
    ];

    public function dominion(){
    	return $this->belongsTo('App\Model\Dominion');
    }

    public function process(){
    	return $this->belongsTo('App\Model\Process');
    }

    public function childrenMenus()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }
    public function allChildrenMenus()
    {
        return $this->childrenMenus()
            ->with('allChildrenMenus')
            ->with('dominion')
            ->with('process')
            ->orderBy('position', 'asc');
    }

}
