@extends('layouts.app')

@section('titulo','Empleados/Crear')

@section('content')

{!! Form::open(['route' => 'empleados.store', 'method' => 'POST']) !!}

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1">Información personal</a></li>
    <li><a data-toggle="tab" href="#menu2">Datos de contacto</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu4">Menu 3</a></li>
  </ul>

  <div class="tab-content">

    <div id="menu1" class="tab-pane fade in active">
    	<div class="row">
			<div class="col-md-6 separarTop">
				{!! Form::label('tipo_documento','Tipo documento de identidad')  !!}
				{!! Form::select('tipo_documento', ['' => 'Seleccione una opcion'], null, ['class' => 'form-control separarBottom', 'required', 'placeholder' => 'Sleccione un tipo de documento','id'=>'tipo_documento'])  !!}	
			</div>
			<div class="col-md-6 separarTop">
				{!! Form::label('identificacion','Número de documento de identidad')  !!}
				{!! Form::number('identificacion',null, ['class' => 'form-control separarBottom', 'required', 'id'=>'identificacion'])  !!}
			</div>    
		</div>
		<div class="row">
			<div class="col-md-6">
				{!! Form::label('nombres','Nombres')  !!}
				{!! Form::text('nombres',null,['class' => 'form-control separarBottom', 'required','placeholder' => 'Nombres','id'=>'nombres'])  !!}
			</div>
			<div class="col-md-6">
				{!! Form::label('apellidos','Apellidos')  !!}
				{!! Form::text('apellidos',null,['class' => 'form-control separarBottom', 'required','placeholder' => 'Apellidos','id'=>'apellidos'])  !!}
			</div>
		</div>
	</div>

    <div id="menu2" class="tab-pane fade">
		<div class="row">
			<div class="col-md-6 separarTop">
				{!! Form::label('telefono_fijo','Teléfono fijo')  !!}
				{!! Form::number('telefono_fijo',null, ['class' => 'form-control separarBottom','id'=>'telefono_fijo'])  !!}	
			</div>
			<div class="col-md-6 separarTop">
				{!! Form::label('telefono_celular','Teléfono celular')  !!}
				{!! Form::number('telefono_celular',null, ['class' => 'form-control separarBottom','required','id'=>'telefono_celular'], 'required')  !!}
			</div>
		</div>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu4" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>


<!--

	<div class="row">
	  <div class="col-md-6">
		{!! Form::label('grupo_sanguineo','Grupo sanguineo')  !!}
		{!! Form::select('grupo_sanguineo', ['' => 'Seleccione una opcion'], null, ['class' => 'form-control separarBottom', 'required','id'=>'grupo_sanguineo'])  !!}	
	  </div>
	  <div class="col-md-6">
		{!! Form::label('rh','Factor RH')  !!}
		{!! Form::select('rh', ['' => 'Seleccione una opcion'], null, ['class' => 'form-control separarBottom', 'required','id'=>'rh'])  !!}
	  </div>
	</div>

	<div class="row">
	  <div class="col-md-6">
		{!! Form::label('sexo','Sexo')  !!}
		{!! Form::select('sexo', ['' => 'Seleccione una opcion'], null, ['class' => 'form-control separarBottom', 'required','id'=>'sexo'])  !!}	
	  </div>
	  <div class="col-md-6">
		{!! Form::label('estado_civil','Estado civil')  !!}
		{!! Form::select('estado_civil', ['' => 'Seleccione una opcion'], null, ['class' => 'form-control separarBottom', 'required','id'=>'estado_civil'])  !!}
	  </div>
	</div>

	<div class="row">
	  <div class="col-md-6">
		{!! Form::label('fecha_nacimiento','Fecha de nacimiento')  !!}
		{!! Form::date('fecha_nacimiento', null, ['class' => 'form-control separarBottom','required','id'=>'fecha_nacimiento'])!!}	
	  </div>
	  <div class="col-md-6">
		{!! Form::label('numero_hijos','Número de hijos')  !!}
		{!! Form::number('numero_hijos',null, ['class' => 'form-control separarBottom','id'=>'numero_hijos'])  !!}
	  </div>
	</div>

	<div class="row">
	  <div class="col-md-6">
		{!! Form::label('telefono_fijo','Teléfono fijo')  !!}
		{!! Form::number('telefono_fijo',null, ['class' => 'form-control separarBottom','id'=>'telefono_fijo'])  !!}	
	  </div>
	  <div class="col-md-6">
		{!! Form::label('telefono_celular','Teléfono celular')  !!}
		{!! Form::number('telefono_celular',null, ['class' => 'form-control separarBottom','id'=>'telefono_celular'])  !!}
	  </div>
	</div> -->

	<div class="form-group">
		<a style="text-decoration: none;" href="{{{ URL::route('empleados.index') }}}">
			{!! Form::button('Regresar',['class' => 'btn btn-default'])  !!}
		</a>
		{!! Form::submit('Guardar',['class' => 'btn btn-primary'])  !!}
	</div>

{!! Form::close() !!}

<!-- Esto tiene que ir como un solo formulario -->
<form id="example-form" action="#">
    <div>
        <h3>Datos personales</h3>
        <section>
    	<div class="row">
			<div class="col-md-6 separarTop">
				{!! Form::label('tipo_documento','Tipo documento de identidad')  !!}
				{!! Form::select('tipo_documento', ['' => 'Seleccione una opcion'], null, ['class' => 'form-control separarBottom', 'placeholder' => 'Sleccione un tipo de documento','id'=>'tipo_documento'])  !!}	
			</div>
			<div class="col-md-6 separarTop">
				{!! Form::label('identificacion','Número de documento de identidad')  !!}
				{!! Form::number('identificacion',null, ['class' => 'form-control separarBottom', 'required', 'id'=>'identificacion'])  !!}
			</div>    
		</div>
        </section>
        <h3>Datos de contacto</h3>
        <section>
            <label for="name">First name *</label>
            <input id="name" name="name" type="text" class="required">
            <label for="surname">Last name *</label>
            <input id="surname" name="surname" type="text" class="required">
            <label for="email">Email *</label>
            <input id="email" name="email" type="text" class="required email">
            <label for="address">Address</label>
            <input id="address" name="address" type="text">
            <p>(*) Mandatory</p>
        </section>
        <h3>Datos laborales</h3>
        <section>
            <ul>
                <li>Foo</li>
                <li>Bar</li>
                <li>Foobar</li>
            </ul>
        </section>
        <h3>Exámenes y controles</h3>
        <section>
            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
        </section>
    </div>
</form>


@endsection