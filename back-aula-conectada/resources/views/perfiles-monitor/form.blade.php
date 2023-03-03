<div class="box box-info">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $perfilesMonitor->nombre, ['class' => 'form-control item' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('FC') }}
            {{ Form::text('FC', $perfilesMonitor->FC, ['class' => 'form-control item' . ($errors->has('FC') ? ' is-invalid' : ''), 'placeholder' => 'Fc']) }}
            {!! $errors->first('FC', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CO2') }}
            {{ Form::text('CO2', $perfilesMonitor->CO2, ['class' => 'form-control item' . ($errors->has('CO2') ? ' is-invalid' : ''), 'placeholder' => 'Co2']) }}
            {!! $errors->first('CO2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('TA_D') }}
            {{ Form::text('TA_D', $perfilesMonitor->TA_D, ['class' => 'form-control item' . ($errors->has('TA_D') ? ' is-invalid' : ''), 'placeholder' => 'Ta D']) }}
            {!! $errors->first('TA_D', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('TA_S') }}
            {{ Form::text('TA_S', $perfilesMonitor->TA_S, ['class' => 'form-control item' . ($errors->has('TA_S') ? ' is-invalid' : ''), 'placeholder' => 'Ta S']) }}
            {!! $errors->first('TA_S', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('SATO2') }}
            {{ Form::text('SATO2', $perfilesMonitor->SATO2, ['class' => 'form-control item' . ($errors->has('SATO2') ? ' is-invalid' : ''), 'placeholder' => 'Sato2']) }}
            {!! $errors->first('SATO2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::text('id_user', $perfilesMonitor->id_user, ['class' => 'form-control item' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-block create-account">Submit</button>
    </div>
</div>