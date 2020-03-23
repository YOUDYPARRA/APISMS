<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('id_producto');
			$table->string('numero_pago');
			$table->string('fecha_recepcion_pago');
			$table->string('pago_recibido');//monto
			$table->string('pago_vencido');//monto
			$table->string('id_empresa');//
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pagos');
	}

}
