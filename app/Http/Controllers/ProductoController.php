<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Cliente;
use App\Pago;
use Carbon\Carbon;
use App\Util;
use Illuminate\Http\Request;

class ProductoController extends Controller {
public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */	
	public function index(Request $request)
	{
			//$request->id_cliente
			//pagos ideales= numero de meses transcurridos * credito
		$util = new Util();
		//echo $util->subFechas("01-02-2015","01-04-2015");
		    $modelos = Producto::producto($request->get('producto'))->Idcliente($request->get('id_cliente'))->paginate(5);
		    //$modelos = Producto::producto($request->get('producto'))->Idcliente($request->get('id_cliente'))->pagos();
			$cliente =Cliente::find($request->get('id_cliente'));
			
			foreach ($modelos as $key => $producto) {
				/**INICIO CALCULO DE PAGOS IDEALES A LA FECHA ACTUAL **/
				$producto->pago_ideal=trim($util->subFechas($producto->fecha_inicio_credito, Carbon::now()->format('d-m-Y') ));
				$tiempo_credito=explode(' ', $producto->pago_ideal);
				
				if($tiempo_credito[1]=='MONTH' || $tiempo_credito[1]=='MONTHS')
				{
					$meses_ideales=$producto->pago_ideal[0]-1;
					$producto->pago_ideal=$meses_ideales * $producto->credito;
				}else if($tiempo_credito[1]=='YEAR' || $tiempo_credito[1]=='YEARS')
				{
					//$producto->pago_ideal='si es año';
					$meses_ideales = 12*$tiempo_credito[0];
					$producto->pago_ideal = $producto->credito * $meses_ideales -1;
				}

				/**FIN CALCULO PAGOS IDEALES**/
				/**INICIO CALCULO DE TOTAL DE PAGO REALIZADO**/
				//echo $producto->id;
				//$modelo_pagos = Pago::idproducto(1);
				$modelo_pagos = Producto::find($producto->id)->pagos()->get();
				//$modelos_pagos=compact("modelo_pagos");
				$suma_pagos=0;
				//echo "==";
				foreach ($modelo_pagos as $key => $pago)
				{					
					echo $pago->numero_pago;
					$suma_pagos=$suma_pagos + $pago->pago_recibido;
				}
					$producto->total_pagado=$suma_pagos;
				/**FIN CALCULO DE TOTAL DE PAGO REALIZADO**/
				/**INICIO TOTAL ADEUDO**/
				//$producto->total_adeudo=$producto->credito;
				$producto->total_adeudo=$producto->credito - $suma_pagos;
				/**FIN TOTAL ADEUDO**/
				//**INICIO SITUACION PAGOS**//
				if($producto->pago_ideal<=$producto->total_pagado)
				{
					$producto->situacion_pagos="AL CORRIENTE";
				}else{
					$producto->situacion_pagos="MOROSO";
				}
				//**FIN SITUACION PAGOS**//

			}//FIN FOREACH
		return view('productos.index',compact('cliente','modelos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		//echo $request->id_cliente;
		return view('productos.create',compact('request'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$modelo = Producto::create($request->all());
		 $modelos = Producto::producto($request->get('producto'))->Idcliente($request->get('id_cliente'))->paginate(5);
		 $cliente =Cliente::find($request->get('id_cliente'));
		//	$modelos = Producto::all();			
		return view('productos.index',compact('cliente','modelos'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$modelo = Producto::find($id);
		$cliente =Cliente::find($modelo->id_cliente);
		
		//$pago = Pago::find(2)->producto();
		//var_dump($pago->producto);
		
		//$pago = Pago::find(5);
		//var_dump($pago->id_producto);


		//var_dump($pago->producto);
		//var_dump($cliente->id);
		//$pago_total = Producto::find($id)->pagos()->sum('pago_recibido');
		//$pago_vencido = Producto::find($id)->pagos()->sum('pago_vencido');
		$modelos = Producto::find($id)->pagos()->paginate(5);
		return view('productos.show',compact('pago_vencido','pago_total','cliente','modelo','modelos'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$modelo= Producto::find($id);

		return view('productos.edit',compact('modelo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		
		$modelo = Producto::find($id);
		$modelo->update($request->all());

		//return redirect('productos');
		echo $request->get('id_cliente');
		echo $request->get('producto');
		 $modelos = Producto::producto($request->get('producto'))->Idcliente($request->get('id_cliente'))->paginate(5);
		 $cliente =Cliente::find($request->get('id_cliente'));
		//	$modelos = Producto::all();			
		return view('productos.index',compact('cliente','modelos'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$modelo = Producto::find($id);
		$modelo->delete();
		return redirect('productos');
	}
}
