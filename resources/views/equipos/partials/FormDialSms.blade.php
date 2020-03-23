
{!! Form::open(['action'=>['MensajeController@enviar_mensaje'],'method'=>'GET','id'=>'frmDialSms' ]) !!}
	<div>
		{!! Form::label('numero_gsm','NUMERO') !!}
		{!! Form::text('numtel',null,['size'=>'10', 'id'=>'dialTxtNumeroGsm','required'=>'required']) !!}
	</div>
	<div>
		{!! Form::label('texto','TEXTO') !!}
		{!! Form::text('msg',null,['size'=>'25','required'=>'required']) !!}
		{!! Form::hidden('cte','43315',['size'=>'5']) !!}
		{!! Form::hidden('encpwd','ac69973e4e2336eeea95835ecb2a88b2db04964c8303e70ff284e08b1e0ae828',['size'=>'25']) !!}
		{!! Form::hidden('email','jon.you@hotmail.com',['size'=>'5']) !!}
		{!! Form::hidden('mtipo','SMS',['size'=>'5']) !!}
	</div>
	{!! Form::submit('ENVIAR SMS',array('class'=>'button','id'=>'btnEnvSms')) !!}

{!! Form::close()!!}