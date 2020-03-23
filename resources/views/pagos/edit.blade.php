@extends('app')

@section('content')
<h3 > <span class='label label-default'> DETALLES </span> <h3>

	<h4>EDITAR PAGO  {!! $modelo->pago !!}<h4>
		<br>

		{!! Form::model($modelo,['method'=>'PATCH', 'action'=>['PagoController@update',$modelo->id],'id'=>'frmGrd' ]) !!}

		<div class='form-group'>
			<label>ID PRODUCTO</label> 			
		{!! Form::hidden('id_producto',null,array('readonly'=>'readonly',"required"=>"required","class"=>"form-control")) !!}
		</div>
                    <div class='col-sm-2'>
                        <div class='form-group'>
                                <label>NUMERO PAGO</label> 

                        {!! Form::text('numero_pago',null,array("required"=>"required","class"=>"form-control","readonly"=>"readonly")) !!}
                        </div>
                        <div class='form-group'>
                                <label>FECHA RECEPCION PAGO</label> 

                        {!! Form::text('fecha_recepcion_pago',null,array("required"=>"required","class"=>"form-control","readonly"=>"readonly")) !!}
                        </div>
                        <div class='form-group'>
                                <label>PAGO RECIBIDO $</label> 

                        {!! Form::text('pago_recibido',null,array("required"=>"required","class"=>"form-control","readonly"=>"readonly")) !!}
                        </div>
                        <div class='form-group'>
                                <label></label> 

                        {!! Form::hidden('pago_vencido',null,array("class"=>"form-control","readonly"=>"readonly")) !!}
                        </div>
                    </div>

			<div class="btn-group">
                            <div class 'form-group'>
                                <label>SIN CAMBIO</label> {!! Form::radio('accion', '0') !!}
                                </div>
                            <div class 'form-group'>
                                <label>APAGAR</label> {!! Form::radio('accion', 'apagar') !!}
                                </div>
                                <div class 'form-group'>
                                <label>ENCENDER</label>{!! Form::radio('accion', 'encender') !!}
                            </div>
				
						<!--boton guardar cambios-->
						{!! Form::submit('ACEPTAR',array('class'=>'button','id'=>'btnGrd')) !!}
						
			</div>
		{!! Form::close() !!}
		
		
			<!--boton eliminar-->
				{!! Form::Open(['method'=>'DELETE', 'route'=>['pagos.destroy',$modelo->id]]) !!}				
					
					{!! Form::submit('ELIMINAR',array('class'=>'btn btn-danger','id'=>'btnElm')) !!}
					
				{!! Form::close() !!}
@endsection