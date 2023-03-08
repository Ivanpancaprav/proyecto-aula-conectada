<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ciclo;
use App\Models\User;



class CicloController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclos = Ciclo::all();

        return $ciclos;
    }

    public function show($id)
    {
        $ciclo = Ciclo::find($id);

        return $ciclo;
    }

    public function alumnosCiclo($id)
    {
        $alumnos = User::where('role','alumno')->whereRelation('ciclos', 'id_ciclo', $id)->get();
        return $alumnos;
    }

    public function profesoresCiclo($id)
    {
        $profesores = User::where('role','!=','alumno')->whereRelation('ciclos', 'id_ciclo', $id)->get();
        return $profesores;
    }

}
