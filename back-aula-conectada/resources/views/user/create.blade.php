@extends('layouts.app')

@section('template_title')
    Create {{$tipo}}
@endsection

@section('content')
{{-- @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
<br/>
@endif --}}
    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-7">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear {{$tipo}}</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            {{-- @include('user.form') --}}

                            <div class="box box-info padding-1">
                                <div class="box-body">

                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="name" class='form-control{{($errors->has('name') ? ' is-invalid' : '')}}' value="{{ old('name') }}">
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        <label>Primer Apellido</label>
                                        <input type="text" name="apellido1" class='form-control{{($errors->has('apellido1') ? ' is-invalid' : '')}}' value="{{ old('apellido1') }}">
                                        {!! $errors->first('apellido1', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        <label>Segundo Apellido</label>
                                        <input type="text" name="apellido2" class='form-control{{($errors->has('apellido2') ? ' is-invalid' : '')}}' value="{{ old('apellido2') }}">
                                        {!! $errors->first('apellido2', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class='form-control{{($errors->has('email') ? ' is-invalid' : '')}}' value="{{ old('email') }}">
                                        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    @if ( $tipo == 'alumno' )
                                        {{-- USUARIO ALUMNO --}}
                                        <input type="hidden" name="role" value="alumno">
                                        <input type="hidden" name="tipo_documento" value="NIA">

                                        <div class="form-group">
                                            <label>NIA</label>
                                            <input type="text" name="num_documento"
                                            class='form-control{{($errors->has('num_documento') ? ' is-invalid' : '')}}'
                                            value="{{ old('num_documento') }}"
                                            pattern="^[0-9]{8}$"
                                            title=" Debe poner 8 números">
                                            {!! $errors->first('num_documento', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Ciclo</label>
                                            <select class='form-control{{($errors->has('email') ? ' is-invalid' : '')}} form-select' name="ciclos" >
                                                <option value="">**Ciclos**</option>
                                                @foreach ($ciclos as $ciclo)
                                                    @if ($ciclo->id == old('ciclos') )
                                                        <option selected value="{{$ciclo->id}}">{{$ciclo->siglas}} - {{$ciclo->nombre}}</option>
                                                    @else
                                                        <option value="{{$ciclo->id}}"> {{$ciclo->siglas}} - {{$ciclo->nombre}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            {!! $errors->first('ciclos', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                    @else
                                        {{-- USUARIO PROFESOR / ADMINISTRADOR --}}
                                        {{-- <input type="hidden" name="role" value="alumno"> --}}
                                        {{-- <label>Role:</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="profesor">
                                            <label class="form-check-label" for="inlineRadio1">Profesor</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="administrador">
                                            <label class="form-check-label" for="inlineRadio2">Administrador</label>
                                        </div>
                                        {!! $errors->first('role', '<small>:message</small><br>' )!!} --}}

                                        {{-- En caso de que no lo pulse, sigue deshabilitado --}}
                                        <input type="hidden" name="role" value="profesor">
                                        {{-- Si pulsa, el usuario es robinson --}}
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="robinson" value="adimnistrador">
                                            <label class="form-check-label">Administrador</label>
                                        </div>
                                        {!! $errors->first('role', '<small>:message</small><br>' )!!}

                                        <input type="hidden" name="tipo_documento" value="DNI">

                                        <div class="form-group">
                                            <label>DNI</label>
                                            <input type="text" name="num_documento"
                                            class='form-control{{($errors->has('num_documento') ? ' is-invalid' : '')}}'
                                            value="{{ old('num_documento') }}"
                                            pattern="^[0-9]{8}[A-Za-z]{1}$"
                                            title=" Debe poner 8 números y 1 letra">
                                            {!! $errors->first('num_documento', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>

                                        {{-- <div class="form-group">
                                            <label class="form-label">Ciclo</label>
                                            <select class='form-control{{($errors->has('email') ? ' is-invalid' : '')}} form-select' name="ciclos" >
                                                <option value="">**Ciclos**</option>
                                                @foreach ($ciclos as $ciclo)
                                                    @if ($ciclo->id == old('ciclos') )
                                                        <option selected value="{{$ciclo->id}}">{{$ciclo->siglas}} - {{$ciclo->nombre}}</option>
                                                    @else
                                                        <option value="{{$ciclo->id}}"> {{$ciclo->siglas}} - {{$ciclo->nombre}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            {!! $errors->first('ciclos', '<div class="invalid-feedback">:message</div>') !!}
                                        </div> --}}

                                        <div class="form-group">
                                            <label class="form-label">Ciclos</label>
                                            <div class="multiselect ">
                                                <div class="selectBox" onclick="showCheckboxes()">
                                                    <select class="form-control{{($errors->has('email') ? ' is-invalid' : '')}} form-select">
                                                        <option>Opciones</option>
                                                    </select>
                                                    
                                                    <div class="overSelect"></div>
                                                </div>
                                                <div id="checkboxes">
                                                    @foreach ($ciclos as $ciclo)
                                                    <label>
                                                        <input type='checkbox' name='ciclos[]' value={{$ciclo->id}} class='form-check-input'/> <strong>{{$ciclo->siglas}}</strong> - {{$ciclo->nombre}}
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div style="color: #dc3545">
                                                {!! $errors->first('ciclos', '<small>:message</small><br>' )!!}
                                            </div>
                                        </div>
                                    @endif


                                </div>
                                <br>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



<script>
    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>
<style>
    .multiselect {
    width: 400px;
    }

    .selectBox {
    position: relative;
    }

    .selectBox select {
    width: 100%;
    font-weight: bold;
    }

    .overSelect {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    }

    #checkboxes {
    display: none;
    border: 1px #dadada solid;
    }

    #checkboxes label {
    display: block;
    }

    #checkboxes label:hover {
    background-color: #1e90ff;
    }
</style>
