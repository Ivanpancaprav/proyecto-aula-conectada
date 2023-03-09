<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bloque;
use Illuminate\Http\Request;
use App\Models\Documento;
use League\CommonMark\Node\Block\Document;

class DocumentoController extends Controller
{
    
    public function create(Request $request){
      
      
        $validacion = $request->validate([
            'nombre' =>'required|max:50|min:5',
            'extension'=>'required|in:video,pdf',
            'archivo' =>'required|file',
            'id_bloque'=>'numeric'
            
        ]);


       if($validacion['extension'] == 'pdf'){
           
        $nombreArchivo = "pdf".time().'.'.request()->archivo->getClientOriginalExtension();
        
        //AQUI SELECCIONAMOS LA RUTA DONDE GUARDAREMOS EL PDF, ADEMÁS GUARDAMOS EL NOMBRE DE ESA RUTA EN $RUTA
        //Y CREAMOS EL OBJETO DOCUMENTO CON ESA RUTA.

        $ruta = $request->archivo->storeAs('public/pdf',$nombreArchivo);
        $validacion['ruta'] = $ruta;
        $documento = Documento::create($validacion);

    }else{
    }

    $bloque = Bloque::find($request->id_bloque);
    $bloque->documentos()->save($documento);

    }
}

