@extends('app')
@section('content')
<div class="container">
	
	{!! link_to_action('EmpresaController@create','AGREGAR',null,array('class'=>'button')) !!}
	{!! Form::model(Request::all(),['route'=>'empresas.index','method'=>'GET']) !!}
		<br><div class="container">
			<div class='col-md-2'>
					<div class='form-group'>
						{!! Form::text('empresa',null,['class'=>'form-control floating-label', 'placeholder'=>'EMPRESA']) !!}
					</div>
				{!! Form::button('BUSCAR',['type'=>'submit', 'class'=>'btn btn-primary']) !!}
				{!! Form::close() !!}
			</div>
		</div>
<br>

<h4> Total: {!! $modelos->total() !!}</h4>
<br>
{!! $modelos->appends(Request::only(['empresa']))->render() !!}
<br>
<table border=1 class="table table-striped">
	<thead>
		<tr>
			<td>ID EMPRESA</td>
			<td>EMPRESA</td>
			<td>NOMBRE FISCAL</td>
			<td>RFC</td>
			<td>SALUDO</td>
			
			<td>OPCIONES</td>
		<tr>

	</thead>
  @foreach($modelos as $modelo)
  		<tr>
        	<td>{!! $modelo->id !!} </td>
        	<td>{!! $modelo->empresa !!} </td>
        	<td>{!! $modelo->nombre_fiscal !!} </td>
        	<td>{!! $modelo->rfc !!} </td>
        	<td>{!! $modelo->saludo !!} </td>
        	
        	<td><a href="empresas/{{ $modelo->id }}/edit" class='button'>DETALLES</a></td>
        
        </tr>
  @endforeach
</table>
</div>
@endsection