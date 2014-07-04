<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearEstudiante extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('estudiantes',function($table){
			$table -> create();
			$table -> increments('id');
			$table -> string('nombres',50);
			$table -> string('apellidos',50);
			$table -> string('cedula');
			$table -> integer('usuario_id');//clave foranea con la tabla usuario
			//$table -> date('fecha_nacimiento');
			$table -> string('ciudad',25);
			$table -> string('direccion',90);
			$table -> string('telf_movil',11);
			$table -> string('telf_fijo',11);
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
		Schema::drop('estudiantes');
	}

}
