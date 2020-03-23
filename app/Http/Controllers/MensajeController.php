<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Equipo;
use App\CalixtaAPI;
use Illuminate\Http\Request;
class MensajeController extends Controller {

	public function enviar_mensaje(Request $request)
	{
		$sms= CalixtaAPI::enviaMensaje($request->numtel,$request->msg);
		echo $sms;
		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		     $equipos = Equipo::all();
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
		    
		    $equipos = Equipo::all();
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

		$equipo = Equipo::find($id);
		$equipo->update($request->all());
		return redirect('equipos');
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
