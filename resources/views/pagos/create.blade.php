@extends('app')
@section('content')
<div class='container'>

<h4>CONFIRMAR PAGO</h4>
{!! Form::open(['route'=>'pagos.store', 'id'=>'frmGrd']) !!}
		<div class='form-group'>
			<label>ID PRODUCTO</label> 
			<h4> {!! $request->id_producto !!} </h4>
		{!! Form::hidden('id_producto',$request->id_producto,array("required"=>"required","class"=>"form-control")) !!}
		{!! Form::hidden('id_empresa',$request->id_empresa,array("required"=>"required","class"=>"form-control")) !!}
		</div>
  	<div class='form-group'>
	<div class='col-sm-2'>
		<div class='form-group'>
			<label>NUMERO PAGO</label> 

		{!! Form::text('numero_pago',$request->numero_pago,array("readonly"=>"readonly","required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>FECHA RECEPCION PAGO</label> 

		{!! Form::text('fecha_recepcion_pago',$request->fecha_recepcion_pago,array("readonly"=>"readonly","required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>PAGO RECIBIDO $</label> 

		{!! Form::text('pago_recibido',$request->pago_recibido,array("readonly"=>"readonly","required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>PAGO VENCIDO</label> 

		{!! Form::text('pago_vencido',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
	</div>
</div>
<div class="form-group">
  	{!! Form::submit('AGREGAR PAGO',array('class'=>'button','id'=>'btnGrd')) !!}
</div>
  {!! Form::close() !!}
</div>
@endsection