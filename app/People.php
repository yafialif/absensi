<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'people';

    protected $fillable = [
          'pid',
          'nama',
          'foto',
          'title',
          'pasutri',
          'alamat',
          'lng',
          'lat',
          'tgl_lahir',
          'tlpn',
          'jenis_kelamin',
          'lain_lain'
    ];

    public function getdata(){
        $data = People::all();
        return $data;
    }


    public static function boot()
    {
        parent::boot();

        People::observe(new UserActionsObserver);
    }


    /**
     * Set attribute to date format
     * @param $input
     */
    public function setTglLahirAttribute($input)
    {
        if($input != '') {
            $this->attributes['tgl_lahir'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        }else{
            $this->attributes['tgl_lahir'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getTglLahirAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        }else{
            return '';
        }
    }



}
