@extends('layouts.app')

@section('template_title')
    {{ $ciclo->name ?? 'Show Ciclo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Ciclo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ciclos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $ciclo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Siglas:</strong>
                            {{ $ciclo->siglas }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
