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

                            <span id="card_title">
                                {{ __( $tipo ) }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('users.create',$tipo) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('users.show',$user->id) }}"><i class="bi bi-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user->id) }}"><i class="bi bi-pencil-square"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $users->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
