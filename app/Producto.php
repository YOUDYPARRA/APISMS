<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {

	protected $table='productos';
	protected $fillable=[
	'id_cliente',
	'producto',
	'marca',
	'serie',
	'identificador_producto',
	'credito',
	'fecha_inicio_credito',
	'mensualidad',
	'id_device',
	'respuesta_device',
	'fecha_respuesta',
	'hora_respuesta',
	'situacion_pagos',
	'observacion'
	];


public function scopeProducto($query,$buscar){
	if(trim($buscar)!=""){
		$buscar=str_replace('*','%', $buscar);
		$query->where('producto',"LIKE", $buscar);
	}
}
public function scopeIdcliente($query,$buscar){
	if(trim($buscar)!=""){
		$buscar=str_replace('*','%', $buscar);
		$query->where('id_cliente',"=", $buscar);
	}
}


public function pagos()
{
	return $this->hasMany('App\Pago','id_producto','id');
	//return $this->hasOne('App\Pago', 'id_producto', 'id');
	//return $this->belongsTo('App\Pago','id','id_producto');
	//return $this->belongsTo('App\Pago','id_producto','id');
}

public function cliente()
{
	//return $this->hasOne('App\Cliente','id_cliente','id');

}

public function setPagoIdealAttribute($valor)
{
	$this->attributes['pago_ideal']=strtoupper($valor);
}

/**
*TOTAL PAGADO, SUMA DE PAGOS REGISTRADOS
*
*/
public function setTotalPagadoAttribute($valor)
{
	$this->attributes['total_pagado']=strtoupper($valor);
}

/**
*TOTAL ADEUDO, CREDITO MENOS SUMA TOTAL DE PAGOS EFECTUADOS.
*
*/
public function setTotalAdeudoAttribute($valor)
{
	$this->attributes['total_adeudo']=strtoupper($valor);
}

public function setSituacionPagosAttribute($valor)
{
	$this->attributes['situacion_pagos']=strtoupper($valor);
}

}
