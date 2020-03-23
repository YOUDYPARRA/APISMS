@extends('app')
@section('content')
<div class='container'>

<h4>GENERAR CLIENTE</h4>
{!! Form::open(['route'=>'empresas.store', 'id'=>'frmGrd']) !!}
  	
  	@include('empresas.partials.Form')
<div class="form-group">
  	{!! Form::submit('AGREGAR',array('class'=>'button','id'=>'btnGrd')) !!}
</div>
  {!! Form::close() !!}
</div>
@endsection