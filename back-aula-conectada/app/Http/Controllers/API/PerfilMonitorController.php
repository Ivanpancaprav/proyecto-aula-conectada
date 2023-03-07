<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perfil_Monitor;

class PerfilMonitorController extends Controller
{
    //En este link encontramos los valores máximos y mínimos en un monitor de constantes vitales
    //https://www.quirumed.com/es/monitor-de-constantes-vitales-ecg-spo2-nibp-resp-temp-y-capnografia-co2.html
    
    public function create(Request $request)
    {
        $validacion = $request->validate([

            'nombre'=>'required|min:5|max:50',
            'FC' => 'required|numeric|integer|max:150',
            'CO2' => 'required|numeric|integer|max:100',
            'TA_D' => 'required|numeric|integer|max:200',
            'TA_S' => 'required|numeric|integer|max:270',
            'SATO2' => 'required|numeric|integer|max:100',
            'id_user' => 'required'
        ]);

        Perfil_Monitor::create($validacion);
    }

    public function ver_perfil($id_perfil)
    {

        $perfil = Perfil_Monitor::find($id_perfil);
        return $perfil;
    }

    public function update_perfil(Request $request)
    {
        $validacion = $request->validate([

            'nombre'=>'required|min:5|max:50',
            'FC' => 'required|numeric|integer|max:150',
            'CO2' => 'required|numeric|integer|max:100',
            'TA_D' => 'required|numeric|integer|max:200',
            'TA_S' => 'required|numeric|integer|max:270',
            'SATO2' => 'required|numeric|integer|max:100',
        ]);

        $perfil = Perfil_Monitor::find($request->id_perfil)->update($validacion);
        
    }

    public function borrar_perfil($id_perfil)
    {

        $perfil = Perfil_Monitor::destroy($id_perfil);

        return response()->json([
            "message" => "El monitor con id =" . $perfil . " ha sido borrado con éxito"
        ], 201);
    }

}
