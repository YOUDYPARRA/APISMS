<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\RegistroPagos;
use App\Pago;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class RegistroPagosController extends Controller {
public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
     	$registro_pagos= \App\RegistroPagos::where('empresa','=',\Auth::user()->id_empresa)->paginate(25);
		return view('registro_pagos.index',  compact("registro_pagos"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
             if (\Session::has('nombre_archivo_pago') && \Session::has('archivo_pago'))
            {
                $url=\Session::get('archivo_pago');
                $nombre_archivo=\Session::get('nombre_archivo_pago');
                \Session::forget('archivo_pago');
                \Session::forget('nombre_archivo_pago');
            }else
            {
                return redirect('archivo_pago/create');
            }
            $registro_pagos=array('nombre_archivo'=>$nombre_archivo,'url'=>$url);
            return view('registro_pagos.create',  compact("registro_pagos"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
            
            if(\Storage::exists($request->get("nombre_archivo_pago")))
                        {
                            \Excel::load($request->get("archivo_pago"), function($reader)
                            {
                                $archivo=$reader->get();
                                foreach ($archivo[2] as $indice => $fila) {
                                    //foreach ($fila as $nombre_columna => $valor_columna) {
                                        $registro_pago = new RegistroPagos;
                                        $registro_pago->id_producto=$fila["id_producto"];
                                        $registro_pago->id_cliente=$fila["id_cliente"];
                                        $registro_pago->pago_recibido=$fila["pago_recibido"];
                                        $registro_pago->fecha_pago_recibido=$fila["fecha_pago_recibido"];
                                        $registro_pago->mes_correspondiente=$fila["mes_correspondiente"];
                                        $registro_pago->empresa=\Auth::user()->id_empresa;//<<<---Empresa de la sesion inciada
                                        //var_dump($registro_pago);
                                        $registro_pago->save();
                                    //}
                                }
                                return redirect('archivo_pago/index');
                            });
                        }else
                        {
                            return redirect('archivo_pago/create');
                        }
            return redirect()->action('RegistroPagosController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id 
	 * @return Response
	 */
	public function show($id)
	{
		//
            echo 'mostrar';
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
            echo 'editar';
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
            //$registro_pagos=  RegistroPagos::find($id);
            echo $id.'actualizar la tabla pagos con la info';
                    
            //return view('registro_pagos.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

