<?php

namespace App\Http\Controllers;

use App\Models\Perfil_Monitor;
use App\Models\PerfilesMonitor;
use Illuminate\Http\Request;

/**
 * Class PerfilesMonitorController
 * @package App\Http\Controllers
 */
class PerfilesMonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfilesMonitors = Perfil_Monitor::paginate();

        return view('perfiles-monitor.index', compact('perfilesMonitors'))
            ->with('i', (request()->input('page', 1) - 1) * $perfilesMonitors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfilesMonitor = new Perfil_Monitor();
        return view('perfiles-monitor.create', compact('perfilesMonitor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Perfil_Monitor::$rules);

        $perfilesMonitor = Perfil_Monitor::create($request->all());

        return redirect()->route('perfiles-monitors.index')
            ->with('success', 'PerfilesMonitor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perfilesMonitor = Perfil_Monitor::find($id);

        return view('perfiles-monitor.show', compact('perfilesMonitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfilesMonitor = Perfil_Monitor::find($id);

        return view('perfiles-monitor.edit', compact('perfilesMonitor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PerfilesMonitor $perfilesMonitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil_Monitor $perfilesMonitor)
    {
        request()->validate(Perfil_Monitor::$rules);

        $perfilesMonitor->update($request->all());

        return redirect()->route('perfiles-monitors.index')
            ->with('success', 'PerfilesMonitor updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $perfilesMonitor = Perfil_Monitor::find($id)->delete();

        return redirect()->route('perfiles-monitors.index')
            ->with('success', 'PerfilesMonitor deleted successfully');
    }
}
