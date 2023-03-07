@extends('layouts.app')

@section('template_title')
    User
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <h1>
                                <span id="card_title">
                                    @if ($tipo == 'alumno')
                                        {{ __('Lista Alumnos') }}
                                    @else
                                        {{ __('Lista Profesores') }}
                                    @endif                            
                                </span>
                            </h1>
                             <div class="float-right">
                                <a href="{{ route('users.create',$tipo) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    @if ($tipo == 'alumno')
                                        {{ __('Nuevo Alumno') }}
                                    @else
                                        {{ __('Nuevo Profesor') }}
                                    @endif
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Nombre</th>
										<th>Apellidos</th>
										<th>Email</th>

                                        @if ( $tipo == 'alumno')
                                            <th>NIA</th>
                                            <th>Ciclo</th>
                                        @else {{-- Profesor/Administrador --}}                        
                                            <th>Admin</th>
                                            <th>DNI</th>
                                        @endif
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $user->name }}</td>
											<td>{{ $user->apellido1 }} {{ $user->apellido2 }}</td>
											<td>{{ $user->email }}</td>

                                            @if ( $tipo == 'alumno')
                                                <td>{{ $user->num_documento }}</td>
                                                <td>{{ $user->ciclos[0]->siglas }}</td>

                                            @else       
                                            
                                                @if ($user->role == 'administrador')
                                                    <td><i class="bi bi-check-square-fill" style="color: green"><a
                                                                style="visibility: hidden">1</a></td>
                                                @else
                                                    <td><i class="bi bi-x-square-fill" style="color: red"> <a
                                                                style="visibility: hidden">0</a> </td>
                                                @endif
                                                <td>{{ $user->num_documento }}</td>
                                            @endif

                                            <td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('users.show',$user->id) }}"><i class="bi bi-eye"></i></a>
                                                <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user->id) }}"><i class="bi bi-pencil-square"></i></a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="bi bi-trash3"></i>
                                                </button>

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
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })

</script>