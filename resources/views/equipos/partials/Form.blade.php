<div class='form-group'>
	<div class='col-sm-6'>
	<div class='form-group'>
		 <label> ID DEVICE</label> 

		{!! Form::text('numero_gsm',null,array('size'=>'15',"class"=>"form-control","id"=>"numero_gsm")) !!}
	</div>
	<div class='form-group'>
		
		{!! Form::hidden('sobrenombre',null,array('size'=>'10',"class"=>"form-control")) !!}
	</div>
	<div class='form-group'>
		
		{!! Form::hidden('morosidad',null,array('size'=>'5',"class"=>"form-control")) !!}
	</div>
	<div class='form-group'>
		{!! Form::label('cliente', 'CLIENTE') !!}
		{!! Form::text('cliente',null,array('size'=>'50',"class"=>"form-control")) !!}
	</div>
	<div class='form-group'>
		
		{!! Form::hidden('nombre_contacto',null,array('size'=>'50',"class"=>"form-control")) !!}
	</div>
</div>
<div class='col-sm-6'>
	<div class='form-group'>
		
		{!! Form::hidden('correo',null,array('size'=>'15',"class"=>"form-control")) !!}
	</div>
	<div class='form-group'>
		
		{!! Form::hidden('telefono',null,array('size'=>'5',"class"=>"form-control")) !!}
	</div>
	<div class='form-group'>
		
		{!! Form::hidden('observacion',null,array('size'=>'50',"class"=>"form-control")) !!}
	</div>
	<div class='form-group'>	

		{!! Form::hidden('estatus',null,array('size'=>'7',"class"=>"form-control","title"=>"CAMPO OBLIGATORIO, (ENCENDIDO O APAGADO)")) !!}
	</div>
	<div class='form-group'>

	<div>
		
		{!! Form::hidden('id_envio',null,array('size'=>'7','id'=>'id_envio',"class"=>"form-control")) !!}
	</div>
</div>

	<div class='form-group'>
		
		{!! Form::hidden('estatus_mensaje',null,array('size'=>'7','id'=>'estatus_msj',"class"=>"form-control")) !!}
	</div>
</div>