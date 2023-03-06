@extends('layouts.app')

@section('template_title')
    Update Ciclo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between ">
                        <span class="card-title">Editar Ciclo</span>
                        <a class="btn btn-primary" href="{{ route('ciclos.index') }}"> Volver</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ciclos.update', $ciclo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('ciclo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
