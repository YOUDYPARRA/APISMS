<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

	protected  $table='clientes';
	protected  $fillable=[
	'id_empresa',
	'nombre_cliente',
	'calle',
	'numero',
	'colonia',
	'poblacion',
	'estado',
	'codigo_postal',
	'telefono_oficina',
	'correo_electronico',
	'telefono_particular',
	'telefono_movil',
	'observacion'
	];

public function scopeCliente($query,$buscar){
	if(trim($buscar)!=""){
		$buscar=str_replace('*','%', $buscar);
		$query->where('cliente',"LIKE", $buscar);
	}
}
public function scopeIdempresa($query,$buscar){
		$query->where('id_empresa',"=", $buscar);
	
}


public function productos()
{
	return $this->hasMany('App\Producto','id_cliente','id');
}
}
