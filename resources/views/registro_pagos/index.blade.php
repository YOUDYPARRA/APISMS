@extends('app')
@section('content')
<h4>REGISTRAR PAGOS</h4>
<div class="form-group">
  	
        <hr/>
        <div class="container">
            <h4>LISTADO DE REGISTRO DE PAGOS PARA COMPILAR</h4>
            <h4> Total: {!! $registro_pagos->total() !!}</h4>
            <h4> {!! $registro_pagos->render() !!}</h4>
            <br>
            <table border="1" class="" >
                <tr>
                    <th>ID</th>
                    <th>ID CLIENTE</th>
                    <th>ID PRODUCTO</th>
                    <th>PAGO RECIBIDO</th>
                    <th>FECHA PAGO RECIBIDO</th>
                    <th>MES CORRESPONDIENTE</th>
                    <th>EMPRESA</th>
                    <th>CONCLUSION</th>
                    <th>OPCIONES</th>
                </tr>
                <tbody>
            @foreach($registro_pagos as $registro_pago)
            <tr>
                <td>{!! $registro_pago->id !!}</td>
                <td>{!! $registro_pago->id_cliente !!}</td>
                <td>{!! $registro_pago->id_producto !!}</td>
                <td>{!! $registro_pago->pago_recibido !!}</td>
                <td>{!! $registro_pago->fecha_pago_recibido !!}</td>
                <td>{!! $registro_pago->mes_correspondiente !!}</td>
                <td>{!! $registro_pago->empresa !!}</td>
                <td>{!! $registro_pago->conslusion !!}</td>
                <td>{!! link_to_action('PagoController@create','AGREGAR PAGO','id_registro_pago='.$registro_pago->id,array('class'=>'button')) !!}</td>
            </tr>
            @endforeach
                </tbody>>
            </table>
        </div>
</div>
@endsection