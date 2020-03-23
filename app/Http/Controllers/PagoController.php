<?php namespace App\Http\Controllers;
use App\Pago;
use App\RegistroPagos;
use App\Util;
use Carbon\Carbon;
use App\CalixtaAPI;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagoController extends Controller {
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
    $util = new Util();
			//echo $request; BUSCAR POR ID EMPRESA(en la sesion) Y SOLO LOS PAGOS QUE NO sean morosos se eliminan del resultado dela consulta..
//		    if(trim ($request->get('id_producto'))!=""){
//                        $modelos = Pago::idproducto($request->get('id_producto'))->paginate(5);
//                    }else
//                    {
                        
                        //CALCULO PARA CONOCER SI ES MOROSO O NO.
                        $modelos = Pago::idproducto($request->get('id_producto'))
                                ->idempresa(\Auth::user()->id_empresa)
                                ->paginate(5);
                        //dd($pagos);

                        //dd($producto);
                    foreach ($modelos as $key => $pago) {
                        $producto=Pago::find($pago->id)->producto()->get();
//                        echo $pago->id_producto."<br>";
//                        echo $producto."<br>";
                        //echo "->".count($producto)."<br>";
                        if(count($producto)>0)
                        {
                            echo 'HAY PRODUCTO';
                            echo "|->".strlen($producto[0]->fecha_inicio_credito)." ".$producto[0]->fecha_inicio_credito."<br>";  
                            $pago->situacion_pago=$util->MorosoActual($producto[0], $modelos);
                            
                            if($pago->situacion_pago==="MOROSO" || $pago->situacion_pago=== FALSE || $pago->situacion_pago==="")
                            {
                                unset($modelos[$key]);

                            }
                            
//                            foreach ($producto as $key => $value) {
//                                echo "=->".$key."< >".$value."<br>";
//                            }
                            
                            //$pago->situacion_pago="moroso o antimoroso".$producto->fecha_inicio_credito;
                        }
                        //else
                        //{
                            //echo '  NO HAY PRODUCTO unset ';
                            //unset($modelos[$key]);
                            
                            //$pago->situacion_pago="moroso o antimoroso";
                        //}
                        //echo "SITUACION PAGO:".$pago->situacion_pago."<br>";
                    }
//                    }
                    
                    
                    
                    
		    //$modelos = Pago::idproducto(1)->paginate(5);
			//$modelos = Empresa::all();			
                        //dd($modelos);
		return view('pagos.index',compact('modelos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
            //buscar el registro de pago por id,
            //enviar los datos a la visa, como id_producto.
            
            $registro_pago = RegistroPagos::find($request->get("id_registro_pago"));
            //dd($registro_pago);
            //echo $registro_pago->fecha_pago_recibido;
		$request->id_producto=$registro_pago->id_producto;
		$request->numero_pago=$registro_pago->mes_correspondiente;
		$request->fecha_recepcion_pago=$registro_pago->fecha_pago_recibido;
		$request->pago_recibido=$registro_pago->pago_recibido;
		$request->id_empresa=$registro_pago->empresa;
                $registro_pago->delete();
                $request =$request;
		return view('pagos.create',compact('request'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
            $modelo = new Pago();
            $modelo->id_producto=$request->get("id_producto");
            $modelo->id_empresa=$request->get("id_producto");
            $modelo->numero_pago=$request->get("numero_pago");
            $modelo->fecha_recepcion_pago=$request->get("fecha_recepcion_pago");
            $modelo->pago_recibido=$request->get("pago_recibido");
            $modelo->pago_vencido=$request->get("pago_vencido");
            $modelo->save();
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
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$modelo= Pago::find($id);

		return view('pagos.edit',compact('modelo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		$id_envio=FALSE;
		$modelo = Pago::find($id);
		$modelo->update($request->all());
                $producto=Pago::find($id)->producto()->get();
                //dd($producto[0]);
                $producto=$producto[0];                
		 if($request->input("accion")=='encender')//verifica si hay q consultar el reporte de mensaje recibido por id
		{
			$id_envio= CalixtaAPI::enviaMensaje($producto->id_device,'resume888888'); //envia un msj y obtiene el numero de status o id
				if($id_envio == '-3')
				{
					$id_envio='ERROR AL ENVIAR ACCION.';
				}
                                $producto->update(['id_envio'=>$id_envio]); //actualiza el segun sgtatus de msj enviado
                        return redirect()->action('RegistroPagosController@index');
			
			

		}else if($request->input("accion")=='apagar'){
                    
			$id_envio= CalixtaAPI::enviaMensaje($producto->id_device,'stop888888'); //envia un msj y obtiene el numero de status o id
				dd($id_envio);
				if($id_envio == '-3' || $id_envio == '-2')
				{
					$id_envio='ERROR AL ENVIAR ACCION.';
				}
                                $producto->update(['id_envio'=>'cero']); //actualiza el segun sgtatus de msj enviado
                        return redirect()->route('productos.show',$request->get('id_producto'));//regresar al index de pagos con las opciones de bsqueda realizadas.
                }
                return redirect()->action('RegistroPagosController@index');
		//return redirect('pagos');
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$modelo = Pago::find($id);
		$modelo->delete();
		return redirect('equipos');
	}


}
