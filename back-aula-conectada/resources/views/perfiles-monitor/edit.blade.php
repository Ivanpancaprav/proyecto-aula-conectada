@extends('layouts.app')

@section('template_title')
    Update Perfiles Monitor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">Editar Perfiles Monitor</span>
    
                            <a class="btn btn-primary" href="{{ route('perfiles-monitor.index') }}">Volver</a>
                        
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('perfiles-monitor.update', $perfilesMonitor->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('perfiles-monitor.form')

                        </form>
                    

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
