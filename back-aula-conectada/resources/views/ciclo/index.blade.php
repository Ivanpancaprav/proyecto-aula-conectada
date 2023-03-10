@extends('layouts.app')

@section('template_title')
    Ciclo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ciclo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ciclos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear ciclo nuevo') }}
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
										<th>Siglas</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ciclos as $ciclo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ciclo->nombre }}</td>
											<td>{{ $ciclo->siglas }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('ciclos.show',$ciclo->id) }}"><i class="bi bi-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ciclos.edit',$ciclo->id) }}"><i class="bi bi-pencil-square"></i></a>                 
                                            
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
                                                                ??Desea eliminar este ciclo <strong>{{$ciclo->nombre}}</strong>?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('ciclos.destroy',$ciclo->id) }}" method="POST">
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
                {!! $ciclos->links() !!}
            </div>
        </div>
    </div>
  
@endsection