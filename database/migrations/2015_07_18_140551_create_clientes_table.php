<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('id_empresa');
			$table->string('nombre_cliente');
			$table->string('calle');
			$table->string('numero');
			$table->string('colonia');
			$table->string('poblacion');
			$table->string('estado');
			$table->string('codigo_postal');
			$table->string('correo_electronico');
			$table->string('telefono_oficina');
			$table->string('telefono_particular');
			$table->string('telefono_movil');
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
		Schema::drop('clientes');
	}

}
