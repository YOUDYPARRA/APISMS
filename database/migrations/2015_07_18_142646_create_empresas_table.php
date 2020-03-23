<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('empresa');
			$table->string('nombre_fiscal');
			$table->string('rfc');	
			$table->string('calle');
			$table->string('numero');
			$table->string('colonia');
			$table->string('poblacion');
			$table->string('estado');
			$table->string('codigo_postal');
			$table->string('nombre_contacto');
			$table->string('telefono');
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
		Schema::drop('empresas');
	}

}
