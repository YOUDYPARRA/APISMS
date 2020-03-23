<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SISTEMA CONTROL</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	{!! Html::style('bower_components/jquery-ui/themes/blitzer/jquery-ui.min.css')!!}

	<!-- Fonts -->
	

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Navegacion</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">SISTEMA CONTROL</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/equipos') }}">EQUIPOS</a></li>
					<li><a href="{{ url('/empresas') }}">EMPRESAS</a></li>
					<li><a href="{{ url('/clientes') }}">CLIENTES</a></li>
					<li><a href="{{ url('/productos') }}">PRODUCTOS</a></li>
					<li><a href="{{ url('/pagos') }}">PAGOS</a></li>
					<li><a href="{{ url('/archivo_pago/create') }}">SUBIR ARCHIVO PAGO</a></li>
					<li><a href="{{ url('/registro_pagos') }}">REGISTRO DE PAGO</a></li>
					<li><a href="{{ url('/auth/logout') }}">LOG OUT</a></li>
					
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Iniciar Sesion</a></li>
						<li><a href="{{ url('/auth/register') }}">Registro</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Salir</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	{!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
	{!! Html::script('bower_components/jquery-ui/jquery-ui.min.js') !!}
	{!! Html::script('bower_components/jquery-validation/dist/jquery.validate.min.js') !!}
	<script type="text/javascript">
	$(document).on('ready',function(){

				$("#btnEnvSms").click(function(e){
					e.preventDefault();
					if($("#frmDialSms").valid())
					{
						$.ajax("http://sistema/saludo",
						{
							'method':'GET',
							'data':$("#frmDialSms").serialize(),
							success:function(r){
								console.log("->"+r+"<-");
									if(r > 0){
										alert("MENSAJE ENVIADO CON EXITO."+r);
										$("#estatus_msj").attr("value",r);
									}else{
										alert("MENSAJE NO ENVIADO."+r);
									}
							},
							beforeSend:function(){
							},
							error:function(er){
								console.log("ERROR: "+er);
							}
						}
					);
				}
		});


		var dialSMS = $("#frmDialSms").dialog({'autoOpen':false});
		$('.button').button();

		$('#lnkMstDialSMS').click(function(e){
			e.preventDefault();
			dialSMS.dialog('open');
			$("#dialTxtNumeroGsm").attr("value",$("#numero_gsm").val());			
		});

		$('#btnGrd').click(function(e){
			e.preventDefault()
			if($("#frmGrd").valid()){
				$("#frmGrd").submit();
			}else{
				console.log("NO GUARDAR");
			}
		});

		
	});
	</script>
</body>
</html>
