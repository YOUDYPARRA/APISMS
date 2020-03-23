<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model {

	protected $table='equipos';
  protected $fillable=[
  'numero_gsm','sobrenombre','morosidad','cliente','nombre_contacto','correo','telefono','observacion','estatus','estatus_mensaje','id_envio'
  ];


public function scopeNumeroGsm($query,$numero_gsm){
	if(trim($numero_gsm)!=""){
		$numero_gsm=str_replace('*','%', $numero_gsm);
		$query->where('numero_gsm','LIKE', $numero_gsm);
	}
}

public function scopeSobreNombre($query,$sobrenombre){
	if(trim($sobrenombre)!=""){
		$sobrenombre=str_replace('*','%', $sobrenombre);
		$query->where('sobrenombre',"LIKE", $sobrenombre);
	}
}

public function scopeCliente($query,$cliente){
	if(trim($cliente)!=""){
		$cliente=str_replace('*','%', $cliente);
		$query->where('cliente',"LIKE", $cliente);
	}
}

public function scopeContacto($query,$contacto){
	if(trim($contacto)!=""){
		$contacto=str_replace('*','%',$contacto);
		$query->where('contacto',"LIKE", $contacto);
	}
}

}
