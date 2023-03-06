@extends('layouts.app')

@section('template_title')
    {{ $ciclo->name ?? 'Show Ciclo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Ciclo</span>
                        </div>
                        <div class="float-right d-flex  justify-content-between">
                            <a class="btn btn-primary" href="{{ route('ciclos.index') }}"> Back</a>
                            <form action="{{ route('ciclos.destroy',$ciclo->id) }}" method="POST">
                                <a class="btn btn-sm btn-primary " href="{{ route('ciclos.show',$ciclo->id) }}"><i class="bi bi-eye"></i></a>
                                <a class="btn btn-sm btn-success" href="{{ route('ciclos.edit',$ciclo->id) }}"><i class="bi bi-pencil-square"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                            </form>
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
