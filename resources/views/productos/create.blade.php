@extends('app')
@section('content')
<div class='container'>

<h4>GENERAR PRODUCTO</h4>
{!! Form::open(['route'=>'productos.store', 'id'=>'frmGrd']) !!}


		<div class='form-group'>
			<label> ID CLIENTE</label> 
			<h4>{!! $request->id_cliente !!}</h4>

		{!! Form::hidden('id_cliente',$request->id_cliente,array("required"=>"required","class"=>"form-control")) !!}
		</div>

  	@include('productos.partials.Form')
<div class="form-group">
  	{!! Form::submit('AGREGAR',array('class'=>'button','id'=>'btnGrd')) !!}
</div>
  {!! Form::close() !!}
</div>
@endsection