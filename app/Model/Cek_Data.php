<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cek_Data extends Model
{
    //

    protected $table    = 'cek_data';

    protected $fillable = [
        'id',
        'id_rfid'
    ];


    public static function boot()
    {
        parent::boot();

        Jamaah::observe(new UserActionsObserver);
    }
}
