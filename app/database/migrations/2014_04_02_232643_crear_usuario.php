<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearUsuario extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usuarios',function($table){
			$table -> create();
			$table -> increments('id');
			$table -> string('usuario',100);
			$table -> string('email',100);
			$table -> string('password');
			$table -> string('imagen');
			$table -> boolean('is_superuser');
			$table -> boolean('is_estudiante');
			$table -> boolean('is_activo');
			$table -> string('ultima_sesion',30);
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
		Schema::drop('usuarios');
	}

}
