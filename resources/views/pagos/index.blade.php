	@extends('app')
	@section('content')
	<div class="container">	
		{!! link_to_action('PagoController@create','AGREGAR PAGO',null,array('class'=>'button')) !!}
		{!! Form::model(Request::all(),['route'=>'pagos.index','method'=>'GET']) !!}
			<br><div class="container">
				<div class='col-md-2'>
						<div class='form-group'>
							{!! Form::text('id_producto',null,['class'=>'form-control floating-label', 'placeholder'=>'ID PRODUCTO']) !!}
						</div>
					{!! Form::button('BUSCAR',['type'=>'submit', 'class'=>'btn btn-primary']) !!}
					{!! Form::close() !!}
				</div>
			</div>
	<br>

	<h4> Total: {!! $modelos->total() !!}</h4>
	<br>
	{!! $modelos->appends(Request::only(['id_producto']))->render() !!}
	<br>
	<table border=1 class="table table-striped">
		<thead>
			<tr>
				<td>ID PAGO</td>
				<td>ID PRODUCTO</td>
				<td>NUMERO PAGO</td>
				<td>FECHA RECEPCION PAGO</td>
				<td>PAGO RECIBIDO</td>
				<td>PAGO VENCIDO</td>
				<td>SITUACION DE PAGO</td>
				<td>ID EMPRESA</td>
				<td>OPCIONES</td>
			<tr>

		</thead>
	  @foreach($modelos as $modelo)
	  		<tr>
	        	<td>{!! $modelo->id !!} </td>
	        	<td>{!! $modelo->id_producto !!} </td>
	        	<td>{!! $modelo->numero_pago !!} </td>
                        <td>{!! $modelo->fecha_recepcion_pago!!} </td>
	        	<td>{!! $modelo->pago_recibido !!} </td>
	        	<td>{!! $modelo->pago_vencido !!} </td>
	        	<td>{!! $modelo->situacion_pago !!} </td>
	        	<td>{!! $modelo->id_empresa!!} </td>
	        	<td><a href="pagos/{{ $modelo->id }}/edit" class='button'>EJECUTAR ACCIONES</a> </td>
	        
	        </tr>
	  @endforeach
	</table>
	</div>
	@endsection	