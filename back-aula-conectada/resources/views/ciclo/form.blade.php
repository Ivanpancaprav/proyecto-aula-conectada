@vite(['resources/css/styles.css', 'resources/js/app.js'])

<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $ciclo->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('siglas') }}
            {{ Form::text('siglas', $ciclo->siglas, ['class' => 'form-control' . ($errors->has('siglas') ? ' is-invalid' : ''), 'placeholder' => 'Siglas']) }}
            {!! $errors->first('siglas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="curso" value="1_" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  1º Curso
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="curso" value="2_" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    2º Curso
                </label>
              </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-block create-account">Submit</button>
    </div>
</div>