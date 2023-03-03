@extends('layouts.app')

@section('template_title')
    {{ $perfilesMonitor->name ?? 'Show Perfiles Monitor' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Perfiles Monitor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('perfiles-monitor.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
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
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $perfilesMonitor->id_user }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
