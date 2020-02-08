<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;

class ChartController extends Controller
{
    //

    public function indexchart(People $people){
        $data = $people->getdata();

        return response()->json($data,200);
    }
}
