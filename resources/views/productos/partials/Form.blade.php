<div class='form-group'>
	<div class='col-sm-6'>
		<div class='form-group'>
			<label>PRODUCTO</label> 

		{!! Form::text('producto',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>MARCA</label> 

		{!! Form::text('marca',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>SERIE</label> 

		{!! Form::text('serie',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>IDENTIFICADOR PRODUCTO</label> 

		{!! Form::text('identificador_producto',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>CREDITO</label> 

		{!! Form::text('credito',null,array("required"=>"required","class"=>"form-control")) !!}
		</div><div class='form-group'>
			<label>FECHA INICIO CREDITO</label> 

		{!! Form::text('fecha_inicio_credito',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>MENSUALIDAD</label> 

		{!! Form::text('mensualidad',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
	</div>
	<div class='col-sm-6'>
		<div class='form-group'>
			<label>ID DEVICE</label> 

		{!! Form::text('id_device',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>RESPUESTA DEVICE</label> 

		{!! Form::text('respuesta_device',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>FECHA RESPUESTA</label> 

		{!! Form::text('fecha_respuesta',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>HORA RESPUESTA</label> 

		{!! Form::text('hora_respuesta',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
		<div class='form-group'>
			<label>OBSERVACION</label> 

		{!! Form::text('observacion',null,array("required"=>"required","class"=>"form-control")) !!}
		</div>
	</div>
</div>