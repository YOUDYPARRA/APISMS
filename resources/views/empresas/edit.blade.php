@extends('app')

@section('content')
<h3 > <span class='label label-default'> DETALLES </span> <h3>

	<h4>EDITAR EMPRESA  {!! $modelo->empresa !!}<h4>
		<br>

		{!! Form::model($modelo,['method'=>'PATCH', 'action'=>['EmpresaController@update',$modelo->id],'id'=>'frmGrd' ]) !!}

			@include('empresas.partials.Form')

			<div class="btn-group">
				
						<!--boton guardar cambios-->
						{!! Form::submit('ACEPTAR',array('class'=>'button','id'=>'btnGrd')) !!}
						
			</div>
		{!! Form::close() !!}
		
		
			<!--boton eliminar-->
				{!! Form::Open(['method'=>'DELETE', 'route'=>['empresas.destroy',$modelo->id]]) !!}				
					
					{!! Form::submit('ELIMINAR',array('class'=>'btn btn-danger','id'=>'btnElm')) !!}
					
				{!! Form::close() !!}
@endsection