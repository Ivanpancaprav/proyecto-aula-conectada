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
                                                    <a href="#" id="{!! $ciclo->nombre!!}" onclick="borrar({!! $ciclo->id !!}, this);" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> <i class="bi bi-trash3"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ciclos.edit',$ciclo->id) }}"><i class="bi bi-pencil-square"></i></a>                 
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
  
<script>

function borrar(id, obj)
        {
            $.confirm({
                title: 'Atención!',
                content: '¿Estas seguro que quieres borrar el ciclo <strong>'+$(obj).attr('id')+'</strong>?',
                buttons: {
                    confirmar: function () {
                        $.ajax(
                        {
                            url: {{ route('ciclo.destroy',id) }},
                            type: 'DELETE',
                            retrieve:true,
                            dataType: "JSON",
                            data: {
                                "id": id,
                                "_method": 'DELETE'
                            },
                            success: function (result)
                            {
                                $.alert({
                                    title: '',
                                    content: result.msjrespuesta,
                                    buttons:{
                                        aceptar: {
                                            text: 'Aceptar',
                                            action: function ()
                                            {
                                                if (result.resultado == 'bien'){
                                                    document.location.href = "{{url('/registros')}}";
                                                };
                                            }
                                        }
                                    }
                                });
                            }
                        });
                    },
                    cancelar: function () {
                        $.alert({
                            title: '',
                            content: 'Borrado cancelado',
                            buttons:{
                                aceptar: {
                                    text: 'Aceptar'
                                }
                            }
                        });
            }
                }
            });
        };
</script>
@endsection