<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dominion extends Model
{
    protected $fillable = ['name'];

    public function processes()
    {
        return $this->hasMany(Process::class);
    }

    public function scopeGetAllProcesses()
    {
        return $processes = [
            'index',
            'create',
            'store',
            'show',
            'edit',
            'update',
            'destroy'
        ];
    }

    public function menus(){
        return $this->hasMany('App\Model\Menu');
    }
}
