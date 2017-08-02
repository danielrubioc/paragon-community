@extends('layouts.app')

@section('title', 'Lista de usuarios')


@section('content')



	<div id="gral-list-index">
	<div class="content-gral-index">	
		
	    
	    <div class="title-gral-index">
			<a href="{{ URL::to('users/create') }}" class="btn btn-success">Nuevo usuario</a>	
			<h1>Lista de Usuarios</h1>
		</div>
	    <br>
		    <div class="table-responsive">
			    <table class="table table-responsive table-perzonalise">
			    	<thead>
			    			<tr>	
			    					<td></td>
			    					<td>Nombre</td>
			    					<td>sex</td>
			    					<td>Email</td>
			    					<td>Tipo</td>
			    					<td>Accion</td>

			    			</tr>
			    	</thead>
			    	<tbody>
			    			@foreach ($users as $user)
				    			<tr>
				    				
				    				<td class="img-avatar-table"><img src="{!! $user->avatar->url('thumb') !!}" class="img-responsive" alt=""></td>
								    <td>{{ $user->name }}</td>
								    <td>{{ $user->sex }}</td>
								    <td>{{ $user->email }}</td>
								    <td>
								    	@if ($user->type == 'admin')
								    		<label class="label label-danger selct-type">{{ $user->type }}</label>
								    	@else
								    		 <label class="label label-success selct-type">{{ $user->type }}</label>
								    	@endif

								    </td>

								    <td class="especial">
								    	<div class="info">
								    	{!! Form::open(['route' => [ 'users.destroy', $user->id ], 'method' => 'DELETE']) !!}
											{!! Form::button("<i class='fa fa-times' aria-hidden='true'></i>", ['type' => 'submit','class' => 'btn btn-danger btn-delete-style', 'onclick' => "return confirm('seguro deseas eliminar el usuario?')"]) !!}
										{!! Form::close() !!}
										</div>
										<div class="info">
								    	<a href="{!! route('users.edit', $user->id) !!}" class="btn btn-info btn-edit-style"><i class="fa fa-user-circle" aria-hidden="true"></i></a></td>
				    					</div>
				    			</tr>
			    			@endforeach
			    	</tbody>
			    </table>
		    </div>

		    {{ $users->links() }}

	</div> 
 </div> 
@endsection
