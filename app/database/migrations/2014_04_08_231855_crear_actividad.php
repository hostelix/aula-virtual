<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearActividad extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('actividades', function($table){
			$table -> create();
			$table -> increments('id');
			$table -> integer('visitas');
			$table -> string('actual_usuario');
			$table -> string('ultimo_usuario');
			$table -> string('ultima_visita');
			$table -> timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('actividades');
	}

}
