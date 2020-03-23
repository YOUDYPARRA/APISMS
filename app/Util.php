<?php namespace App;
//use App\Http\Controllers\Carbon\Carbon;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
class Util extends Model{
	/**
	*DD-MM-AAAA
	*@fecha inicio_inicio = fecha credito
	*@fecha fecha_fin = fecha ultimo pago o fecha actual
	*
	**/
	public function subFechas($fecha_inicio="", $fecha_fin="")
	{	
		$arr_f_i=explode("-", $fecha_inicio);
		$arr_f_f=explode("-", $fecha_fin);

			$f_i = Carbon::createFromDate($arr_f_i[2],$arr_f_i[1],$arr_f_i[0]);
			$f_f = Carbon::createFromDate($arr_f_f[2],$arr_f_f[1],$arr_f_f[0]);
			//setlocale(LC_TIME, 'es_ES.UTF-8');

//			echo $fcredito->diffForHumans($fultpag->copy()->subMonth(),true);
			return $f_f->diffForHumans($f_i->subMonth(),true);
			//return "HOLA MUNDO";


	}
        public function calcPagoIdeal($tiempo_transcurrido,$monto_mensualidad) {
            $pago_ideal=0;
            $tiempo_credito=explode(' ', $tiempo_transcurrido);

                if($tiempo_credito[1]=='MONTH' || $tiempo_credito[1]=='MONTHS')
                {
                        $meses_ideales=$tiempo_credito[0]-1;
                        $pago_ideal=$meses_ideales * $monto_mensualidad;
                }else if($tiempo_credito[1]=='YEAR' || $tiempo_credito[1]=='YEARS')
                {
                        //$producto->pago_ideal='si es año';
                        $meses_ideales = 12*$tiempo_credito[0];
                        $pago_ideal = $monto_mensualidad * $meses_ideales -1;
                }
            return $pago_ideal;
                                
        }
        /**
         * 
         * @param type $producto
         * @param type $pagos
         * return False si no esta al corriente, True si esta moroso
         */
        public function MorosoActual($producto,$pagos) {
            //$situacion_pagos=FALSE;
            $situacion_pagos="mal";
            if(strlen($producto->fecha_inicio_credito)==10)
            {
                $fecha_inicio=$producto->fecha_inicio_credito;
                $mensualidad=$producto->mensualidad;
                $fecha_actual=Carbon::now()->format('d-m-Y');
                $pago_recibido=0;
                

                $tiempo_transcurrido= Util::subFechas($fecha_inicio,$fecha_actual);
                $pago_ideal=Util::calcPagoIdeal($tiempo_transcurrido,$mensualidad);

                foreach ($pagos as $key => $pago) {
                    $pago_recibido=$pago_recibido+$pago->pago_recibido;
                }
                if($pago_ideal>$pago_recibido)
                {
                    $situacion_pagos="MOROSO";
                }  else {
                    $situacion_pagos="AL CORRIENTE";
                }
                
            }
            
            return $situacion_pagos;
                    
        }

}