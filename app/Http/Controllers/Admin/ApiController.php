<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //

    public function request(Request $request){


        $data = [
            'status'=>200,
            'response'=>true,
            'id_device'=>$request->id_device,
            'id_hex'=>$request->id_hex,
            'led'=>'green',
            'msg'=>'Data is Accepted'

        ];

        $respond = ["data"=>$data];

        return response()->json($respond,200);

    }
}
