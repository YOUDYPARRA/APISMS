@extends('app')
@section('content')
<div class="container">
	<h4>LISTADO PAGOS</h4>
	
<br>
<h4> Cliente: {!! $cliente->nombre_cliente !!}</h4>
<h4> ID Cliente: {!! $cliente->id !!}</h4>
<h4> Producto: {!! $modelo->producto !!}</h4>
<h4> Marca: {!! $modelo->marca !!}</h4>
<h4> Credito: {!! $modelo->credito !!}</h4>
<h4>Fecha Credito: {!! $modelo->fecha_inicio_credito !!} </h4>
<h4> Mensualidad $: {!! $modelo->mensualidad !!}</h4>
<?php $acum =0 ?>
<br>
<h4> Total: {!! $modelos->total() !!}</h4>
<br>
{!! $modelos->appends(Request::only(['pago']))->render() !!}
<br>

<table border=1 class="table table-striped">
	<thead>
		<tr>
			<td>ID PAGO</td>
			<td>NUMERO PAGO</td>
			<td>FECHA PAGO</td>
			<td>PAGO RECIBIDO</td>
			<td>ADEUDO PENDIENTE</td>
			<td>OPCIONES</td>
		<tr>

	</thead>
	
  @foreach($modelos as $pago)
  <?php $acum =$acum+$pago->pago_recibido ?>
  		<tr>
        	<td>{!! $pago->id !!} </td>
        	<td>{!! $pago->numero_pago !!} </td>
        	<td>{!! $pago->fecha_recepcion_pago !!}</td>
        	<td>{!! $pago->pago_recibido !!} </td>
        	<td>{!! $modelo->credito-$acum  !!} </td>
        	<td>{!! link_to_action('PagoController@edit','DETALLE',$pago->id,array('class'=>'button')) !!} </td>
        
        </tr>
  @endforeach
</table>
</div>
@endsection