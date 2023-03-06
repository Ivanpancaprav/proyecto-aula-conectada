@extends('layouts.app')

@section('template_title')
    {{ $perfilesMonitor->name ?? 'Show Perfiles Monitor' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Perfiles Monitor</span>
                        </div>
                        <div class="float-right  d-flex justify-content-between">
                            <a class="btn btn-primary" href="{{ route('perfiles-monitor.index') }}">Volver</a>
                            <div class="row">
                                <form action="{{ route('perfiles-monitor.destroy',$perfilesMonitor->id) }}" method="POST">
                                    <a class="btn btn-sm btn-success" href="{{ route('perfiles-monitor.edit',$perfilesMonitor->id) }}"><i class="bi bi-pencil-square"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body d-flex justify-content-around">
                            <div class="col-5">
                                <div class="form-group">
                                    <strong>Nombre del monitor:</strong>
                                    {{ $perfilesMonitor->nombre }}
                                </div>
                                <div class="form-group">
                                    <strong>Fc:</strong>
                                    {{ $perfilesMonitor->FC }}
                                </div>
                                <div class="form-group">
                                    <strong>Co2:</strong>
                                    {{ $perfilesMonitor->CO2 }}
                                </div>
                                <div class="form-group">
                                    <strong>Ta D:</strong>
                                    {{ $perfilesMonitor->TA_D }}
                                </div>
                                <div class="form-group">
                                    <strong>Ta S:</strong>
                                    {{ $perfilesMonitor->TA_S }}
                                </div>
                                <div class="form-group">
                                    <strong>Sato2:</strong>
                                    {{ $perfilesMonitor->SATO2 }}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <strong>Nombre profesor:</strong>
                                    {{ $perfilesMonitor->usuario->name }}
                                </div>
                                <div class="form-group">
                                    <strong>Correo profesor:</strong>
                                    {{ $perfilesMonitor->usuario->email }}
                                </div>
                                <div class="form-group">
                                    <strong>DNI profesor:</strong>
                                    {{ $perfilesMonitor->usuario->num_documento }}
                                </div>
                            </div>
                    

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
