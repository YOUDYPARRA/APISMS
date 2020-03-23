<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroPagosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registro_pagos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('id_producto');
			$table->string('id_cliente');
			$table->string('pago_recibido');
			$table->string('fecha_pago_recibido');
			$table->string('mes_correspondiente');
			$table->string('conclusion');//conrriente-moroso
			$table->string('empresa');//id_empresa
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registro_pagos');
	}

}
