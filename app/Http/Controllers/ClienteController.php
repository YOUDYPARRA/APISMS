<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller {
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
			//echo $request;
		//echo "->".\Auth::user()->id_empresa;
		    $modelos = Cliente::cliente($request->get('cliente'))
                            ->idempresa(\Auth::user()->id_empresa)
                            ->paginate(5);
			//$modelos = Cliente::all();			
		return view('clientes.index',compact('modelos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return view('clientes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$modelo = Cliente::create($request->all());
// $modelos = Cliente::clientes($request->get('cliente'))->paginate(5);
			$modelos = Cliente::all();			
		return view('clientes.index',compact('modelos'));
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
		$modelo= Cliente::find($id);

		return view('clientes.edit',compact('modelo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		
		$modelo = Cliente::find($id);
		$modelo->update($request->all());
		return redirect('clientes');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$modelo = Clientes::find($id);
		$modelo->delete();
		return redirect('clientes');
	}

}