<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('id_cliente');
			$table->string('producto');
			$table->string('marca');
			$table->string('serie');
			$table->string('identificador_producto');//serie el producto
			$table->string('credito');
			$table->string('fecha_inicio_credito');
			$table->string('mensualidad');
			$table->string('id_device');//numero GSM
			$table->string('respuesta_device');
			$table->string('fecha_respuesta');
			$table->string('hora_respuesta');
			$table->string('id_envio');//id de envio de sms, hacer rollback y migrate.
			$table->string('observacion');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('productos');
	}

}
