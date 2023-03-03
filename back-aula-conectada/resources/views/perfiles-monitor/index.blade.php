@extends('layouts.app')

@section('template_title')
    Perfiles Monitor
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Perfiles Monitor') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('perfiles-monitor.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Fc</th>
										<th>Co2</th>
										<th>Ta D</th>
										<th>Ta S</th>
										<th>Sato2</th>
										<th>Id User</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perfilesMonitors as $perfilesMonitor)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $perfilesMonitor->nombre }}</td>
											<td>{{ $perfilesMonitor->FC }}</td>
											<td>{{ $perfilesMonitor->CO2 }}</td>
											<td>{{ $perfilesMonitor->TA_D }}</td>
											<td>{{ $perfilesMonitor->TA_S }}</td>
											<td>{{ $perfilesMonitor->SATO2 }}</td>
											<td>{{ $perfilesMonitor->id_user }}</td>

                                            <td>
                                                <form action="{{ route('perfiles-monitor.destroy',$perfilesMonitor->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('perfiles-monitor.show',$perfilesMonitor->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('perfiles-monitor.edit',$perfilesMonitor->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
