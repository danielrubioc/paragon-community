@extends('layouts.app')
@section('title', 'Editando : '.$user->name )
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
		<h3><a href="{{ route('users.index') }}">Volver a lista de Usuarios</a> </h3>	
		<h2><i class="fa fa-user-o" aria-hidden="true"></i>Editando Usuario</h2>
	</div>
	{!! Form::open(['route' => [ 'users.update', $user->id ], 'method' => 'PUT', 'files' => true]) !!}
	<div class="informative-descrip">
		<div class="user-avatar-preview">
			
			  @if( Auth::user()->avatar_file_name == null or  !Auth::user()->avatar_file_name)

	                @if(Auth::user()->sex == 'Masculino')
	                    <img src="{{asset('images/default-avatars/man1.svg')}}" class="img-responsive" alt="" />  
	                @else 
	                    <img src="{{asset('images/default-avatars/girl.svg')}}" class="img-responsive" alt="" /> 
	                @endif  

	          @else

	                <img src="{{ asset(Auth::user()->avatar->url('medium')) }}" class="img-responsive">
	         
	          @endif  


			
			<div class="editing-options-avatar">
				<div class="form-gruop">
					<p>Selecciona si quieres cambiar el avatar</p>
					{!! Form::file('avatar'); !!}
				</div>
			</div>
		</div>
		<div class="blank-box">
		<div class="form-gruop br-separated">
			{!! Form::label('name', 'Nombre')!!}
			{!! Form::text('name', $user->name,['class' => 'form-control input-personalice', 'placeholder' => 'Nombre completo', 'required']) !!}
		</div>		
		<div class="form-gruop br-separated">
			{!! Form::label('email', 'Email')!!}
			{!! Form::email('email', $user->email,['class' => 'form-control input-personalice', 'placeholder' => 'avatar', 'required']) !!}
		</div>	
		
		<div class="form-gruop br-separated">
			{!! Form::label('sex', 'Sexo')!!}
			{!! Form::text('sex',  $user->sex,['class' => 'form-control input-personalice', 'placeholder' => 'avatar', 'required']) !!}
		</div>	

		@if(Auth::user()->type == 'admin')

		<div class="form-gruop br-separated">
			{!! Form::label('type', 'Tipo')!!}
			{!! Form::select('type', ['member' => 'Usuario normal', 'admin' => 'Administrador'],  $user->type, ['class' => 'form-control input-personalice', 'placeholder' => 'Selecciona el tipo de usuario', 'required']); !!}
		</div>

		@endif
		<div class="form-gruop br-separated">
			{!! Form::submit('Actualiza', ['class' => 'btn btn-success pull-right']) !!}
		</div>
		</div>
	</div>	
	{!! Form::close() !!}

</div>
@endsection()