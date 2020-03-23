<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Empresa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Util;

class EmpresaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
			//echo $request;
		    $modelos = Empresa::empresa($request->get('empresa'))->paginate(5);
		    
			foreach ($modelos as $key => $producto) {
				# code...
				$producto->saludo="hola mundo".$key;
			}

			//var_dump($modelos);			
			//$fecha =  Carbon::now()->format('d-m-Y');
			//var_dump();
//			$fcredito = Carbon::createFromDate(2015,01,02);
//			$fultpag = Carbon::createFromDate(2015,04,01);
//			setlocale(LC_TIME, 'es_ES.UTF-8');

//			echo $fcredito->diffForHumans($fultpag->copy()->subMonth(),true);
			//echo $fultpag->diffForHumans($fcredito->copy()->subMonth(),true);
                        
			//$util = new Util();
			//echo $util->subFechas("01-02-2015","01-04-2015");
         //echo "->".\Auth::user()->id_empresa;
         //echo "->".\Auth::user()->name;
		return view('empresas.index',compact('modelos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('empresas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$modelos = Empresa::create($request->all());
		 $modelos = Empresa::empresa($request->get('empresa'))->paginate(5);
		//$modelos = Empresa::empresa($request->get('empresa'))->paginate(5);
		//$modelos = Empresa::find($modelo->id);
		//echo $modelo->id;
		//	$modelos = Empresa::all();			
		//$modelos =  $modelo;
		return view('empresas.index',compact('modelos'));
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
		$modelo= Empresa::find($id);

		return view('empresas.edit',compact('modelo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		
		$modelo = Empresa::find($id);
		$modelo->update($request->all());
		return redirect('empresas');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$modelo = Empresa::find($id);
		$modelo->delete();
		return redirect('empresas');
	}

}
