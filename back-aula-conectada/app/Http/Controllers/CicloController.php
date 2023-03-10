<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use Illuminate\Http\Request;

/**
 * Class CicloController
 * @package App\Http\Controllers
 */
class CicloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclos = Ciclo::paginate();

        return view('ciclo.index', compact('ciclos'))
            ->with('i', (request()->input('page', 1) - 1) * $ciclos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciclo = new Ciclo();
        $curso =1;
        return view('ciclo.create', compact('ciclo','curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(['siglas' => 'required|max:8', 'nombre' => 'required|max:50|min:1', 'curso' => 'required']);

        request()->merge(['siglas' => request()->curso .= request()->siglas]);

        $ciclo = Ciclo::create($request->all());

        return redirect()->route('ciclos.index')
            ->with('success', 'Ciclo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciclo = Ciclo::find($id);

        return view('ciclo.show', compact('ciclo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ciclo = Ciclo::find($id);


        if(substr($ciclo->siglas,0,1) == "2"){
            $curso = 2;
        }else{
            $curso = 1;
        }

        $ciclo->siglas = substr($ciclo->siglas,2);
       
    
        return view('ciclo.edit', compact('ciclo','curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ciclo $ciclo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciclo $ciclo)
    {
        request()->validate(['siglas' => 'required|max:8', 'nombre' => 'required|max:50|min:1', 'curso' => 'required']);

        request()->merge(['siglas' => request()->curso .= request()->siglas]);

        $ciclo->update($request->all());

        return redirect()->route('ciclos.index')
            ->with('success', 'Ciclo updated successfully');
    }
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {

        $ciclo = Ciclo::find($id)->delete();

        return redirect()->route('ciclos.index')
            ->with('success', 'Ciclo deleted successfully');
    }
}
