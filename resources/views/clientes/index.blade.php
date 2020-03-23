@extends('app')
@section('content')
<div class="container">
	
	{!! link_to_action('ClienteController@create','AGREGAR CLIENTE',null,array('class'=>'button')) !!}
	{!! Form::model(Request::all(),['route'=>'clientes.index','method'=>'GET']) !!}
		<br><div class="container">
			<div class='col-md-2'>
					<div class='form-group'>
						{!! Form::text('nombre_cliente',null,['class'=>'form-control floating-label', 'placeholder'=>'CLIENTE']) !!}
						{!! Form::text('id',null,['class'=>'form-control floating-label', 'placeholder'=>'ID']) !!}
					</div>
				{!! Form::button('BUSCAR',['type'=>'submit', 'class'=>'btn btn-primary']) !!}
				{!! Form::close() !!}
			</div>
		</div>
<br>

<h4> Total: {!! $modelos->total() !!}</h4>
<br>
{!! $modelos->appends(Request::only(['cliente']))->render() !!}
<br>
<table border=1 class="table table-striped">
	<thead>
		<tr>
			<td>ID CLIENTE</td>
			<td>CLIENTE</td>
			<td>OPCIONES</td>
		<tr>

	</thead>
  @foreach($modelos as $modelo)
  		<tr>
        	<td>{!! $modelo->id !!} </td>
        	<td>{!! $modelo->nombre_cliente !!} </td>
        	
        	<td><a href="clientes/{{ $modelo->id }}/edit" class='button'>DETALLES</a> <a href="productos?id_cliente={{ $modelo->id }}" class='button'>PROD. COMP.</a> </td>
        
        </tr>
  @endforeach
</table>
</div>
@endsection