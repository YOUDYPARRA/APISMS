@extends('app')
@section('content') 
<h2>LISTADO DE EQUIPOS</h2>
{!! link_to_action('EquipoController@create','AGREGAR EQUIPO',null,array('class'=>'button')) !!}
<br>
<h2><small>BUSCAR EQUIPOS</small></h2>
<div class='col-md-2'>
{!! Form::model(Request::all(),['route'=>'equipos.index','method'=>'GET']) !!}
	<div class='form-group'>
		{!! Form::hidden('sobrenombre',null,['class'=>'form-control floating-label', 'placeholder'=>'SOBRE NOMBRE']) !!}
	</div>

	<div class='form-group'>
		{!! Form::text('cliente',null,['class'=>'form-control floating-label', 'placeholder'=>'CLIENTE']) !!}
	</div>
	{!! Form::button('BUSCAR',['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! Form::close() !!}
</div>
<br>
<br>
<div class='col-md-6'>
<h4> Total: {!! $equipos->total() !!}</h4>
<br>
{!! $equipos->appends(Request::only(['sobrenombre','cliente']))->render() !!}
</div>
<table border=1 class="table table-striped">
	<thead>
		<tr>
			<td>ID DEVICE</td>
			<td>CLIENTE</td>
			<td>OPCIONES</td>
		<tr>

	</thead>
  @foreach($equipos as $equipo)
  		<tr>
        	<td>{!! $equipo->numero_gsm !!} </td>
        	<td>{!! $equipo->cliente !!} </td>
        	<td><a href="equipos/{{ $equipo->id }}/edit" class='button'> VER DETALLES</a> | <a href="equipos/{{ $equipo->id }}/edit" class='button'> VA ENVIAR MSJ </a></td>
        
        </tr>
  @endforeach
</table>

@endsection

