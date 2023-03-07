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
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title h1">DETALLES  {{ Str::upper( $user->role ) }}</span>
                                
                            <div class="float-right">
                                <a class="btn btn-md btn-success" href="{{ route('users.edit',$user->id) }}"><i class="bi bi-pencil-square"></i></a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-md btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash3"></i></button>

                                <!-- PANTALLA DE CONFIRMACION -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        ¿Desea eliminar este usuario <strong>{{$user->email}}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $user->apellido1 }} {{ $user->apellido2 }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>

                        {{-- <div class="form-group">
                            <strong>Role:</strong>
                            {{ $user->role }}
                        </div> --}}

                        @if ($user->role == 'alumno')
                            <div class="form-group">
                                <strong>NIA:</strong>
                                {{ $user->num_documento }}
                            </div>

                            <div class="form-group">
                                <strong>Ciclo:</strong>
                                {{ $user->ciclos[0]->nombre }}
                            </div>
                        @else
                            <div class="form-group">
                                <strong>DNI:</strong>
                                {{ $user->num_documento }}
                            </div>
                            <div class="form-group">
                                <strong>Ciclos:</strong>
                                @foreach ($user->ciclos as $ciclo)
                                    <li>{{$ciclo->nombre}}</li>
                                @endforeach
                            </div>
                        @endif
                        
                    </div>
                    
                </div> 
                <br>
                @if ($user->role == 'alumno')  
                    <a class="btn btn-primary " href="{{ route('users.index','alumno') }}">Atras</a>
                @else
                    <a class="btn btn-primary " href="{{ route('users.index','profesor') }}">Atras</a>
                @endif
            </div>
        </div>
    </section>
@endsection
