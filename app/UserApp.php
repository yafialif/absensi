<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;
use Illuminate\Support\Facades\Hash; 


use Illuminate\Database\Eloquent\SoftDeletes;

class UserApp extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'user_app';
    
    protected $fillable = [
          'username',
          'nama',
          'category_id',
          'password',
          'deskripsi',
        'user_category'
    ];
    

    public static function boot()
    {
        parent::boot();

        UserApp::observe(new UserActionsObserver);
    }
    
    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }


    /**
     * Hash password
     * @param $input
     */
    public function setPasswordUstadAttribute($input)
    {
        $this->attributes['password_ustad'] = Hash::make($input);
    }


    
    
}