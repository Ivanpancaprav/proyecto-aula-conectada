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
        $ciclos = $usuario->ciclos()->with('espacios')->get();
        return $ciclos;
    }

    public function update_espacio_didactico(Request $request)
    {
        $validacion = $request->validate([

            'titulo' => 'required|min:5|max:50',
            'color' => 'required|starts_with:#|max:7',
        ]);

       Espacio_Didactico::find($request->id_espacio)->update($validacion);

    }

    public function borrar_espacio_didactico($id_espacio)
    {

        $espacio_didactico = Espacio_Didactico::destroy($id_espacio);

        return response()->json([
            "message" => "El monitor con id =" . $espacio_didactico . " ha sido borrado con éxito"
        ], 201);
    }
}
