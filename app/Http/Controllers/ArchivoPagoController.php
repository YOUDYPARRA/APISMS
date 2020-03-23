<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Excel;
class ArchivoPagoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            return redirect('archivo_pago/create');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            //echo 'IR A CREATE PAGO';
            return view('archivo_pago.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
			$archivo=$request->file('archivo');
			$nombre_archivo=$archivo->getClientOriginalName();
                                
                        //verifica extension
                        $extension=explode(".", $nombre_archivo);
                        $url="";
                        \Session::put('archivo_pago',$url);
			if($extension[1]=="xls" || $extension[1]=="xlsx")
                        {
                            
                            \Storage::disk('local')->put($nombre_archivo,\File::get($archivo));
                            $url = storage_path().'/app/'.$nombre_archivo;
                            \Session::put('archivo_pago',$url);
                            \Session::put('nombre_archivo_pago',$nombre_archivo);
                        }else
                        {
                            
                        }//FIN VERFIICAR EXTENSION
                        
			if(is_null($request->file('archivo')))
			{
				//return redirect('registro_pago/create')->with('error-message', 'UN ERROR HA OCURRIDO ALMACENANDO EL ARCHIVO, VERIFIQUE POR FAVOR.');

			}
			
			
			//VERIFICA ARCHIVO, y LEER ARCHIVO.
			if(\Storage::exists($nombre_archivo))
                        {
                            \Excel::load($url, function($reader)
                            {
                                $resultado=$reader->get();
                                $error=0;
                                foreach ($resultado[2] as $indice => $fila) {
//                                    echo $indice."<br>";
                                    //echo $value['fecha_pago_recibido'];
                                    foreach ($fila as $key => $value) {
                                        
                                        //INICIO VALIDACION FECHA
					  		if ($key=="fecha_pago_recibido") 
					  		{
//                                                            echo '=-><h3>'.$value.'</h3><h4>'.$fila.'<h4><br>';
					  			if(strlen($value)==10)
					  			{
					  				$arr_fecha_pago=explode("-", $value);
					  				/*echo "- -".strlen($arr_fecha_pago[0]);
					  				echo strlen($arr_fecha_pago[1]);
					  				echo strlen($arr_fecha_pago[2]);*/
					  				if((strlen($arr_fecha_pago[0])===2)&&(strlen($arr_fecha_pago[1])===2 && strlen($arr_fecha_pago[2])===4))
					  				{
					  					//echo "FORMATO DE FECHA CORRECTA";


					  				}else
					  				{
					  				//	\File::delete($url);
                                                                                //return redirect('archivo_pago.index')->with('error-message', 'ERROR EN FORMATO DE FECHA AL CARGAR ARCHIVO EN EL SERVIDOR');
                                                                                //return view('archivo_pago');
                                                                                //return redirect()->action('ArchivoPagoController@index');
                                                                                //return redirect('archivo_pago/create');
                                                                            $error++;
					  					echo "FORMATO DE TAMAÑO DE FECHA INCORRECTA. =-> ".$indice." :".$value."  <a href='archivo_pago/create'>SUBIR ARCHIVO</a><br>";
					  				}

					  			}else
					  			{
					  				//\File::delete($url);
                                                                        //return redirect('archivo_pago.index')->with('error-message', 'ERROR EN FORMATO DE FECHA AL CARGAR ARCHIVO EN EL SERVIDOR');
                                                                        //return redirect('archivo_pago/create');
					  				//echo "fechas incorrectas";
                                                                        echo "FORMATO DE LONGITUD DE FECHA INCORRECTA. =-> ".$indice." :".$value."  <a href='archivo_pago/create'>SUBIR ARCHIVO</a><br>";
                                                                    $error++;
					  			}
                                                        }elseif ($key=="mes_correspondiente") 
					  		{
					  			# code...
					  			if ( ($value >= 1) && (strlen($value)>0) ) 
					  			{
					  				//echo "FORMATO DE MES VALIDO";
					  			}else
					  			{
					  				//\File::delete($url);
                                                                        //return redirect('archivo_pago.index')->with('error-message', 'ERROR EN FORMATO DE MES AL CARGAR ARCHIVO EN EL SERVIDOR');
                                                                        //return redirect('archivo_pago/create');
					  				//echo "FORMATO DE MES NO VALIDO";
					  			}
					  			//FIN VALIDA MES
					  		}elseif ($key=="id_cliente") 
					  		{//echo "INICIA VALIDA ID CLIENTE";
					  			
					  			if ( ($value >= 1) && (strlen($value)>0)) 
					  			{
					  				//echo "FORMATO DE ID DE CLIENTE CORRECTO";
					  			}else
					  			{
                                                                    
					  				//\File::delete($url);
                                                                        //return redirect('archivo_pago')->with('error-message', 'ERROR EN FORMATO DE ID DE CLIENTE AL CARGAR ARCHIVO EN EL SERVIDOR');
                                                                    //return view('archivo_pago.index');
                                                                    //return view('archivo_pago.create');
                                                                    //return redirect()->action('DesgloceController@show',[$id]);
                                                                    //return redirect()->action('ArchivoPagoController@create');
                                                                    echo " FORMATO DE ID DE CLIENTE INCORRECTO. =-> ".$indice." :".$value."  <a href='archivo_pago/create'>SUBIR ARCHIVO</a><br>";
                                                                    //return redirect('archivo_pago/create');
                                                                    //return 'error de lectura de archivo';
                                                                    
					  				
					  			}
					  		}elseif($key==="id_producto")
                                                        {
                                                            if(($value >= 1) && (strlen($value)>0))
                                                                {
                                                                
                                                                }  else 
                                                                {
                                                                    $error++;
                                                                    echo "FORMATO DE ID DE PRODUCTO INCORRECTO.  =-> ".$indice." :".$value."  <a href='archivo_pago/create'>SUBIR ARCHIVO</a><br>";
                                                                }
                                                        }elseif($key=="pago_recibido")
                                                        {
                                                            if(($value >= 1) && (strlen($value)>0))
                                                                {
                                                                
                                                                }  else 
                                                                {
                                                                    $error++;
                                                                    echo "FORMATO DE PAGO INCORRECTO.  =-> ".$indice." :".$value."  <a href='archivo_pago/create'>SUBIR ARCHIVO</a><br>";
                                                                }
                                                        }
//					  			
                                                        
                                        

                                        }//FIN FOREACH RECORRER UNA SOLA FILA
                                    
                                }//FIN FOREACH RECORRER FILAS
                                if($error!=0)
                                {
                                    echo '<h3>TOTAL DE ERRORES POR CORREGIR:'.$error.'</h3>';
                                }  else {
                                    //echo  redirect()->route('registro_pagos.store')->withInput();
                                    echo redirect()->action('RegistroPagosController@create');
                                    //echo '<a href="registro_pagos/store">IR A COMPILAR ARCHIVO</a>';
                                }
                                
                            });//FIN LOAD EXCEL
				

			}else//SI EL ARCHIVO NO ES EXCEL, ELIMINAR.
			{
				if(strlen($url) > 0)
                                {
                                    \File::delete($url);
                                }
                                return redirect('archivo_pago/create');
                                //echo "ARCHIVO INCORRECTO<a href='archivo_pago/create'>SUBIR ARCHIVO</a><br>";
			}
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
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
