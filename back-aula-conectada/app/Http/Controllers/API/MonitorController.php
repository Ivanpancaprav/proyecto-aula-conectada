<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Monitor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MonitorController extends Controller{

    //ESTA FUNCION NOS CREA UN MONITOR CON UN NÚMERO ALEATORIO DE 7 DÍGITOS, ANTES DE NADA, 
    //BUSCA EN LA BASE DE DATOS SI ESE CÓDIGO YA EXISTE, EN EL CASO DE QUE EXISTA VUELVE A 
    //GENERAR OTRO CÓDIGO PARA QUE NÚNCA COINCIDA CON UNO YA EXISTENTE.
    
    public function create()
    {
        
        $codigo =0;
        
        do{

        $existe = false;
        $numRandom = rand(1111111,9999999);

            if( DB::select('SELECT codigo FROM monitores where codigo = '.$codigo) ){
                $existe = true;
            }

        }while($existe);
        
        Monitor::create(['codigo' => $numRandom,'id_user' => 0]);

        //TODO -> CUANDO SE CREE EL MONITOR, HAY QUE ASIGNARLE LA RELACIÓN CON LOS PERFILES PREDEFINIDOS
    }

    //ESTA FUNCIÓN BUSCA UN MONITOR POR SU CÓDIGO.
    public function verMonitor($codigoMonitor){
       
        $monitor = Monitor::where('codigo',$codigoMonitor)->get();

        return $monitor;
    }

    //ESTA FUNCIÓN BORRA UN MONITOR DE LA BD, BUSCA POR SU CLAVE PRIMARIA QUE ES LA ID.
    public function borrar_monitor($id_monitor){

        $monitor = Monitor::destroy($id_monitor);

        return response()->json([
            "message" => "El monitor con id =" . $monitor . " ha sido borrado con éxito"
        ], 201);
    }
}
