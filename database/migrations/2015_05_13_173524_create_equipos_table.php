<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipos', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('numero_gsm',100)->unique();
      $table->string('sobrenombre');
      $table->string('morosidad');
      $table->string('cliente');
      $table->string('nombre_contacto');
      $table->string('correo');
      $table->string('telefono');
      $table->string('observacion');
      $table->string('estatus');//encendido/apagado como debe de estar el status del eqipo, es el mensaje que se envia
      $table->string('estatus_mensaje');//estatus mensaje de respuesta recibido por el receptor gsm,se debe obtener primero el id_envio para obtener reporte
      $table->string('id_envio');//numero recibido por el proveedor para el mensaje eviado, servira para obtener reporte

			$table->timestamps();
		});

		//Schema::table('equipos', function($table)
		//{
    	//$table->string('id_envio');//numero recibido por el proveedor para el mensaje eviado, servira para obtener reporte
		//});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('equipos');
	}

}
