@extends('app')
@section('content')

<h3>VERIFICACION DE ARCHIVO DE PAGO EXCEL</h3>
<div class='col-sm-6'>
    {!! Form::open(['route'=>'archivo_pago.store', 'id'=>'frmGrd',"files"=>"true"]) !!}
    @include('archivo_pago.partials.Form')
    <div class="form-group">
        {!! Form::submit('VERIFICAR',array('class'=>'button','id'=>'btnGrd')) !!}
    </div>
{!! Form::close() !!}
</div>

@endsection()