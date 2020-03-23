@extends('app')
@section('content')
<h4>ALMACENAR REGISTRO DE PAGOS</h4>
{!! Form::open(['route'=>'registro_pagos.store', 'id'=>'frmGrd',"files"=>"true"]) !!}
<div class='col-sm-6'>
		<div class='form-group'>
		{!! Form::text('nombre_archivo_pago',$registro_pagos["nombre_archivo"],array("class"=>"form-control","required"=>"required", "readonly"=>"readonly")) !!}
		{!! Form::hidden('archivo_pago',$registro_pagos["url"],array("class"=>"form-control","required"=>"required", "readonly"=>"readonly")) !!}
		</div>
{!! Form::submit('ALMACENAR',array('class'=>'button','id'=>'btnGrd')) !!}
{!! Form::close() !!}
@endsection()