<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //

    public function request(Request $request){

        $data = [
            'id_device'=>$request->id_device,
            'id_hex'=>$request->id_hex

        ];

        $respond = ["data"=>$data];

        return response()->json($respond,200);

    }
}
