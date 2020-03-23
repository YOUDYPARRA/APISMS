@extends('app')

@section('content')
<h3 > <span class='label label-default'> DETALLE DE  EQUIPO </span> <h3>

	<h4>EDITAR CLIENTE  {!! $equipo->sobrenombre !!}<h4>
		<br>

		{!! Form::model($equipo,['method'=>'PATCH', 'action'=>['EquipoController@update',$equipo->id],'id'=>'frmGrd' ]) !!}

			@include('equipos.partials.Form')

			
	<div class="btn-group">
		{!! Form::label('apagar', 'EJECUTAR APAGAR') !!}
				{!! Form::checkbox('apagar' ,'value') !!}

				
				{!! Form::label('encender', 'EJECUTAR ENCENDER') !!}
				{!! Form::checkbox('encender' ,'value') !!}
				<!--boton guardar cambios-->
				{!! Form::submit('ACEPTAR',array('class'=>'button','id'=>'btnGrd')) !!}
				
				<!--boton Enviar SMS(muestra dialog)-->
				
				<!--{!! link_to('#','MENSAJE SMS',array('class'=>'button' ,'id'=>'lnkMstDialSMS')) !!}-->
				

	</div>
	<br>		
	<br>

		{!! Form::close() !!}
		
		
			<!--boton eliminar-->
				{!! Form::Open(['method'=>'DELETE', 'route'=>['equipos.destroy',$equipo->id]]) !!}
					
					

					{!! Form::submit('ELIMINAR',array('class'=>'btn btn-danger','id'=>'btnElm')) !!}

					
				{!! Form::close() !!}
		
		
			@include('equipos.partials.formDialsms')
		

	

@endsection