@extends('layouts.app')
@section('title', 'Nuevo usuario')



@section('content')
<div class="container">
	@if(count($errors) > 0)
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>		

	@endif

	<div class="title-gral">
		<h3><a href="{{ route('users.index') }}">Lista de Usuarios</a> </h3>	
		<h2><i class="fa fa-user-o" aria-hidden="true"></i>Registro de Usuario</h2>
	</div>
	<div class="create-forms-informative">
	{!! Form::open(['action' => 'UserController@store', 'method' => 'POST', 'files' => true, 'id' => 'register-user-form']) !!}
		<div class="form-gruop">
			{!! Form::label('name', 'Nombre')!!}
			{!! Form::text('name', null,['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
		</div>		
		<div class="form-gruop">
			{!! Form::label('email', 'Email')!!}
			{!! Form::text('email', null,['class' => 'form-control', 'placeholder' => 'Email']) !!}
		</div>	
		<div class="form-gruop">
			{!! Form::label('password', 'Password')!!}
			{!! Form::password('password',['class' => 'form-control', 'placeholder' => '*********', 'required']) !!}
		</div>	
        <div class="form-gruop">
			{!! Form::label('type', 'Sexo')!!}
			<div class="form-gruop">
				<label class="radio-inline" for="radios-1">
					{!! Form::radio('sex', 'Masculino') !!}
					Masculino
				</label> 	
				<label class="radio-inline" for="radios-1">
					
					{!! Form::radio('sex', 'Femenino') !!}
					Femenino
				</label> 	
			</div>
		</div>
		<div class="form-gruop">
			{!! Form::label('type', 'Tipo')!!}
			{!! Form::select('type', ['admin' => 'Administrador', 'member' => 'Usuario normal'], null, ['class' => 'form-control', 'placeholder' => 'Selecciona el tipo de usuario', 'required']); !!}
		</div>
		<div class="form-gruop">
			{!! Form::label('avatar', 'Avatar')!!}
			{!! Form::file('avatar', ['admin' => 'Administrador', 'member' => 'Usuario normal'], null, ['class' => 'form-control', 'placeholder' => 'Selecciona el tipo de usuario', 'required']); !!}
		</div>
		



		<div class="form-gruop">
			{!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
		</div>
	{!! Form::close() !!}
	<div id="Ajaxstatus"></div>
	<div id="MensajesAjax"></div>
	

</div>
@endsection()

