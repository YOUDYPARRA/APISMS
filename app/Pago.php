<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model {

	protected $table='pagos';
	protected $fillable=[
		'id_producto',
		'id_empresa',
		'numero_pago',
		'fecha_recepcion_pago',
		'pago_recibido',
		'pago_vencido'
            
	];

	public function scopeIdproducto($query,$buscar){
	if(trim($buscar)!=""){
		$buscar=str_replace('*','%', $buscar);
		return $query->where('id_producto',"LIKE", $buscar);
	}
}
	public function scopeIdempresa($query,$buscar){
	if(trim($buscar)!=""){
		return $query->where('id_empresa',"=", $buscar);
	}
}
 
 public function producto()
{
 	return $this->belongsTo('App\Producto','id_producto','id');
 	//return $this->belongsTo('App\Producto','id','id_producto');
 	//return $this->belongsTo('App\Producto','id_producto');
 	//return $this->belongsTo('App\Producto','id');
// 	return $this->belongsTo('App\Producto');
	 //return $this->hasOne('App\Producto', 'id', 'id_producto');
	 //return $this->hasOne('App\Producto', 'id_producto', 'id');
	 
}

}
