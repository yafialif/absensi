<?php

namespace App\Model;

use FontLib\Table\Type\post;
use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;
use Illuminate\Http\Request;
use Schema;


class Jamaah extends Model
{
    //

    protected $table    = 'jamaah';

    protected $fillable = [
        'name',
        'tlpn',
        'jenis_kelamin',
        'alamat',
        'kategori',
        'image',
        'tlpn_saudara',
        'tgl_lahir',


    ];

    public function InsertData(Request $request){
        $post = Jamaah::create($request->all());
        return $post;
    }


    public static function boot()
    {
        parent::boot();

        Jamaah::observe(new UserActionsObserver);
    }


}
