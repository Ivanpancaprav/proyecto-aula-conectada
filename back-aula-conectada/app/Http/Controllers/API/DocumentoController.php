<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bloque;
use Illuminate\Http\Request;
use App\Models\Documento;
use League\CommonMark\Node\Block\Document;

class DocumentoController extends Controller
{

    public function create(Request $request)
    {

        $validacion = "";

        if ($request->extension == 'video') {

            $validacion = $request->validate([

                'nombre' => 'required|max:50|min:5',
                'extension' => 'required|in:video',
                'id_bloque' => 'required|numeric',
                'url' => 'required'

            ]);

        } else {

            $validacion = $request->validate([
                'nombre' => 'required|max:50|min:5',
                'extension' => 'required|in:video,pdf',
                'archivo' => 'required|file',
                'id_bloque' => 'numeric',
           
            ]);

            $nombreArchivo = time() . '_' . $request->nombre . '.' . request()->archivo->getClientOriginalExtension();

            //AQUI SELECCIONAMOS LA RUTA DONDE GUARDAREMOS EL PDF, ADEMÁS GUARDAMOS EL NOMBRE DE ESA RUTA EN $RUTA
            //Y CREAMOS EL OBJETO DOCUMENTO CON ESA RUTA.

            $ruta = $request->archivo->storeAs('public/pdf', $nombreArchivo);
            $validacion['url'] = $ruta;
        }

        $documento = Documento::create($validacion);
        $bloque = Bloque::find($request->id_bloque);
        $bloque->documentos()->save($documento);
    }

    public function delete($id_documento)
    {
        $documento = Documento::destroy($id_documento);

        return response()->json([
            "message" => "El monitor con id =" . $id_documento . " ha sido borrado con éxito"
        ], 201);
    }

    public function update(Request $request)
    {

        $validacion = "";
    
        if($request->extension == "video"){

           $validacion = $request->validate([
            'nombre' => 'required|max:50|min:5',
            'url' => 'required'
           ]);
        
        }else{

            $validacion = $request->validate([
                'nombre' => 'required|max:50|min:5',
            ]);

        }

        Documento::find($request->id_documento)->update($validacion);
    }
}
