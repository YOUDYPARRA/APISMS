@extends('app')
@section('content')
<div class='container'>

<h4>GENERAR NUEVA CLIENTE</h4>
{!! Form::open(['route'=>'clientes.store', 'id'=>'frmGrd']) !!}
  
  	@include('clientes.partials.Form')
<div class="form-group">
  	{!! Form::submit('AGREGAR',array('class'=>'button','id'=>'btnGrd')) !!}
</div>
  {!! Form::close() !!}
</div>
@endsection