<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {

	protected $able='empresa';
	protected $fillable=[
	'empresa',
	'nombre_fiscal',
	'rfc',
	'calle',
	'numero',
	'colonia',
	'poblacion',
	'estado',
	'codigo_postal',
	'nombre_contacto',
	'telefono',
	'observacion'
	];

public function scopeEmpresa($query,$buscar)
{
		if(trim($buscar)!="")
		{
			$buscar=str_replace('*','%', $buscar);
			$query->where('empresa',"LIKE", $buscar);
		}
}

public function setSaludoAttribute($valor)
{
	$this->attributes['saludo']=strtoupper($valor);
}

}
