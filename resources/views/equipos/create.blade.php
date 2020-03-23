@extends('app')

@section('content')


<h3>CREAR NUEVO EQUIPO</h3>

  {!! Form::open(['route'=>'equipos.store', 'id'=>'frmGrd']) !!}
  	
  	@include('equipos.partials.Form')

  	{!! Form::submit('AGREGAR',array('class'=>'button','id'=>'btnGrd')) !!}

  {!! Form::close() !!}

@endsection
