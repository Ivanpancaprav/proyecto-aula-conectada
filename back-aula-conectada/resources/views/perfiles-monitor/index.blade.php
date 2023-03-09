@extends('layouts.app')

@section('template_title')
    Perfiles Monitor
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Perfiles Monitor') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('perfiles-monitor.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo monitor') }}
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
                                        
										<th>Nombre Monitor</th>
										<th>Nombre Profesor</th>
                                        <th>Correo Profesor</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perfilesMonitors as $perfilesMonitor)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $perfilesMonitor->nombre }}</td>
                                            <td>{{ $perfilesMonitor->usuario->name }}</td>
											<td>{{ $perfilesMonitor->usuario->email }}</td>

                                            <td>
                                               
                                                    <a class="btn btn-sm btn-primary " href="{{ route('perfiles-monitor.show',$perfilesMonitor->id) }}"><i class="bi bi-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('perfiles-monitor.edit',$perfilesMonitor->id) }}"><i class="bi bi-pencil-square"></i></a>
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$i}}">
                                                        <i class="bi bi-trash3"></i>
                                                    </button>
    
                                                    <!-- PANTALLA DE CONFIRMACION -->
                                                    <div class="modal fade" id="exampleModal{{$i}}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmacion</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                ¿Desea eliminar este ciclo <strong>{{$perfilesMonitor->nombre}}</strong>?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('perfiles-monitor.destroy',$perfilesMonitor->id) }}" method="POST">
                                                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $perfilesMonitors->links() !!}
            </div>
        </div>
    </div>
@endsection
