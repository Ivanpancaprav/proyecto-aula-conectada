<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ciclo;
use App\Models\Espacio_Didactico;
use App\Models\User;
use Illuminate\Http\Request;

class EspacioDidacticoController extends Controller
{
    public function create(Request $request)
    {
        $validacion = $request->validate([

            'titulo' => 'required|min:5|max:50',
            'color' => 'required|starts_with:#|max:7',
        ]);

        $espacio = Espacio_Didactico::create($validacion);

        $this->insertar_tabla_intermedia($request->id_ciclo, $espacio);
    }

    public function insertar_tabla_intermedia($ids_ciclos, $espacio)
    {
        $ciclos = Ciclo::find($ids_ciclos);
        $espacio->ciclos()->attach($ciclos);
    }

    public function ver_espacio_didactico($id_espacio)
    {

        $espacio = Espacio_Didactico::find($id_espacio);
        return $espacio;
    }

    public function ver_espacios_por_ciclo($id_usuario)
    {
        $usuario = User::find($id_usuario);
      
        $ciclos = $usuario->ciclos;
       
        $espacios_didacticos = $ciclos->espacios();
       
        dd($espacios_didacticos);
        
        return $espacios_didacticos;
    }


    // public function update_perfil(Request $request)
    // {
    //     $validacion = $request->validate([

    //         'nombre'=>'required|min:5|max:50',
    //         'FC' => 'required|numeric|integer|max:150',
    //         'CO2' => 'required|numeric|integer|max:100',
    //         'TA_D' => 'required|numeric|integer|max:200',
    //         'TA_S' => 'required|numeric|integer|max:270',
    //         'SATO2' => 'required|numeric|integer|max:100',
    //     ]);

    //     $perfil = Perfil_Monitor::find($request->id_perfil)->update($validacion);

    // }

    // public function borrar_perfil($id_perfil)
    // {

    //     $perfil = Perfil_Monitor::destroy($id_perfil);

    //     return response()->json([
    //         "message" => "El monitor con id =" . $perfil . " ha sido borrado con éxito"
    //     ], 201);
    // }
}
