@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">DETALLES  {{ Str::upper( $user->role ) }}</span>
                        </div>
                        <div class="float-right">
                            {{-- @if ()

                            @else

                            @endif --}}
                            <a class="btn btn-primary" href="{{ route('users.index',$user->role ) }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido1:</strong>
                            {{ $user->apellido1 }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido2:</strong>
                            {{ $user->apellido2 }}
                        </div>
                        <div class="form-group">
                            <strong>Role:</strong>
                            {{ $user->role }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Documento:</strong>
                            {{ $user->tipo_documento }}
                        </div>
                        <div class="form-group">
                            <strong>Num Documento:</strong>
                            {{ $user->num_documento }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
