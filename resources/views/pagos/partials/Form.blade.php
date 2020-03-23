<div class='form-group'>
	<div class='col-sm-2'>
		<div class='form-group'>
			<label>NUMERO PAGO</label> 

		{!! Form::text('numero_pago',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>FECHA RECEPCION PAGO</label> 

		{!! Form::text('fecha_recepcion_pago',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>PAGO RECIBIDO $</label> 

		{!! Form::text('pago_recibido',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>PAGO VENCIDO</label> 

		{!! Form::text('pago_vencido',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
	</div>
</div>