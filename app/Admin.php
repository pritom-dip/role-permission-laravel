<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'mobile', 'address', 'image', 'role_id', 'block', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Model\Role');
    }

    // ------------- Upload Image In admin Profile -----------------------

    public static function UploadImage($image){
        $fileName = $image->getClientOriginalName();
        (new Self())->deleteOldImage();
        $image->storeAs('images', $fileName, 'public');
        Auth::user()->update(['image' => $fileName ]); 
    }

    // ------------ Delete Existing Image From admin Profile ---------------

    private function deleteOldImage(){   
        if(Auth::user()->image){
            Storage::delete('/public/images/' . Auth::user()->image);
        }
    }

    public function setPasswordAttribute($value){
        $this->attributes['password']   = bcrypt($value);
    }

}
