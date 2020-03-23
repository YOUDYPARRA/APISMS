<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Equipo;

use Illuminate\Http\Request;


use App\CalixtaAPI;

use Distill\Distill;
class EquipoController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		     $equipos = Equipo::sobrenombre($request->get('sobrenombre'))->cliente($request->get('cliente'))->paginate(5);
			//$equipos = Equipo::all();
			return view('equipos.index',compact('equipos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('equipos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
			$equipo= Equipo::create($request->all());
		    $equipos = Equipo::sobrenombre($request->get('sobrenombre'))->cliente($request->get('cliente'))->paginate(5);
		return view('equipos.index',compact('equipos'));
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
		$equipo= Equipo::find($id);
		return view('equipos.edit',compact('equipo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		
		//echo $sms;
		$equipo = Equipo::find($id);
		$equipo->update($request->all());
		//echo $request->input('enviar_sms');
		if($request->input('apagar')=='value')
		{
			$sms= CalixtaAPI::enviaMensaje($request->numero_gsm,'stop888888'); //envia un msj y obtiene el numero de status o id
				if($sms == '-3')
				{
					$sms='VERIFIQUE LA CONFIGURACION DE LA CUENTA.'	;
				}

			$equipo->update(['id_envio'=>$sms]); //actualiza el segun sgtatus de msj enviado

		}
		 if($request->input('encender')=='value')//verifica si hay q consultar el reporte de mensaje recibido por id
		{
			$sms= CalixtaAPI::enviaMensaje($request->numero_gsm,'resume888888'); //envia un msj y obtiene el numero de status o id
				if($sms == '-3')
				{
					$sms='VERIFIQUE LA CONFIGURACION DE LA CUENTA.'	;
				}

			$equipo->update(['id_envio'=>$sms]); //actualiza el segun sgtatus de msj enviado
			

		}
		
		
		//return redirect('equipos');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$equipo = Equipo::find($id);
		$equipo->delete();
		return redirect('equipos');
	}

}
