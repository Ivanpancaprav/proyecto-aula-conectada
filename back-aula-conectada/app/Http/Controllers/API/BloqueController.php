<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Espacio_Didactico;
use App\Models\Bloque;
use Illuminate\Http\Request;

class BloqueController extends Controller
{
    public function bloquesEspacios($id_espacio){
        $espacio = Espacio_Didactico::find($id_espacio);

        return $espacio->bloques;
    }

    public function update(Request $request)
    {
        $validacion = $request->validate([

            'descripcion' => 'required',
            'titulo' => 'required',
            'id_espacio' => 'required',
        ]);

       $bloque = Bloque::find($request->id);
       $bloque ->update($validacion);

       return $bloque;
    }

    public function delete($id)
    {
        $bloque = Bloque::destroy($id);

        if ($bloque == true) {
            return response()->json([
                "message" => "El bloque con id = " . $id . " ha sido borrado con éxito"
            ], 201);
        }
        else{
            return response()->json([
                "message" => "El bloque con id = " . $id . " no ha sido borrado con éxito"
            ], 201);
        }
    }

    // crear un bloque
    public function almacenar(Request $request)
    {
        $validacion = $request->validate([
            'descripcion' => 'required',
            'titulo' => 'required',
            'id_espacio' => 'required',
        ]);

        Bloque::create($validacion);

        return response()->json([
            "message" => "Bloque almacenado con éxito"
        ], 201);
    }

}
