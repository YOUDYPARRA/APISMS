@extends('app')
@section('content')
<div class="container">
	<h4>LISTADO DE PRODUCTOS</h4>
	{!! link_to_action('ProductoController@create','AGREGAR PRODUCTO','id_cliente='.$cliente->id,array('class'=>'button')) !!}
	{!! Form::model(Request::all(),['route'=>'productos.index','method'=>'GET']) !!}
		<br><div class="container">
			<div class='col-md-2'>
					<div class='form-group'>
						{!! Form::text('producto',null,['class'=>'form-control floating-label', 'placeholder'=>'PRODUCTO']) !!}
					</div>
					<div class='form-group'>
						{!! Form::hidden('id_cliente',null,['class'=>'form-control floating-label', 'placeholder'=>'ID CLIENTE']) !!}
					</div>
				{!! Form::button('BUSCAR',['type'=>'submit', 'class'=>'btn btn-primary']) !!}
				{!! Form::close() !!}
			</div>
		</div>
<br>
<h4>{!! $cliente->nombre_cliente !!}</h4>
<br>
<h4> Total: {!! $modelos->total() !!}</h4>
<br>
{!! $modelos->appends(Request::only(['producto']))->render() !!}
<br>

<table border=1 class="table table-striped">
	<thead>
		<tr>
			<td>ID PRODUCTO</td>
			<td>PRODUCTO</td>
			<td>MARCA</td>
			<td>CREDITO</td>
			<td>FECHA DE CREDITO</td>
			<td>MENSUALIDAD</td>
			<td>NUM. TOTAL DE PAGOS</td>
			<td>PAGOS VENCIDOS</td>
			<td>TOTAL PAGADO</td>
			<td>TOTAL ADEUDO</td>			
			<td>SITUACION EN C y C</td>
			<td>OPCIONES</td>
		<tr>

	</thead>
  @foreach($modelos as $modelo)
  
  	<?php
  	 $num_pagos=($modelo->credito/$modelo->mensualidad);
  	 
  	?>
  
  		<tr>
        	<td>{!! $modelo->id !!} </td>
        	<td>{!! $modelo->producto !!} </td>
        	<td>{!! $modelo->marca !!} </d>
        	<td>{!! $modelo->credito !!} </td>
        	<td>{!! $modelo->fecha_inicio_credito !!} </td>
        	<td>{!! $modelo->mensualidad !!} </td>        	
        	<td>{!! $num_pagos !!}</td>
        	<td>{!! $modelo->pago_ideal !!}</td>
        	<td>{!! $modelo->total_pagado !!}</td>
        	<td>{!! $modelo->total_adeudo !!} </td>
        	<td>{!! $modelo->situacion_pagos !!} </td>
        	<td><a href="productos/{{ $modelo->id }}/edit" class='button'>DETALLES DE PRODUCTO</a>  <a href="productos/{{ $modelo->id }}" class='button'>DETALLES PAGOS</a></td>
        
        </tr>
  @endforeach
</table>
</div>
@endsection