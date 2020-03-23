<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroPagos extends Model {

	protected $able='registro_pago';
	protected $fillable=[
	'id',
	'id_producto',
	'id_cliente',
	'pago_recibido',
	'fecha_pago_recibido',
	'mes_correspondiente',
	'conclusion',
	'empresa'
	];

}
