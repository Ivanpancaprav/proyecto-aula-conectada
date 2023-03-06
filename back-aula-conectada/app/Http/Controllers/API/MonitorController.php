<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Monitor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MonitorController extends Controller
{
    public function create(){
        $numRandom =0;
        
        do{
        
        $numRandom = rand(1111111,9999999);
        
        }while(Monitor::where('codigo',$numRandom));
        
        $monitor = new Monitor(['codigo'=>$numRandom,'id_user'=>0]);
    }
}
