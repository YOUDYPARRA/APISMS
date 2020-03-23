@extends('app')

@section('content')
<h3 > <span class='label label-default'> DETALLES </span> <h3>

	<h4>EDITAR PRODUCTO  {!! $modelo->producto !!}<h4>
		
		<br>

		{!! Form::model($modelo,['method'=>'PATCH', 'action'=>['ProductoController@update',$modelo->id],'id'=>'frmGrd' ]) !!}
			
		<div class='form-group'>
			<label> ID CLIENTE</label> 
			<h4>{!! $modelo->id_cliente !!}</h4>

		{!! Form::hidden('id_cliente',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>			
			@include('productos.partials.Form')

			<div class="btn-group">
				
						<!--boton guardar cambios-->
						{!! Form::submit('ACEPTAR',array('class'=>'button','id'=>'btnGrd')) !!}
						
			</div>
		{!! Form::close() !!}
		
			<!--boton eliminar-->
				{!! Form::Open(['method'=>'DELETE', 'route'=>['productos.destroy',$modelo->id]]) !!}				
					
					{!! Form::submit('ELIMINAR',array('class'=>'btn btn-danger','id'=>'btnElm')) !!}
					
				{!! Form::close() !!}
@endsection