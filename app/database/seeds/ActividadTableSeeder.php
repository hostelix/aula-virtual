<?php

class ActividadTableSeeder extends Seeder {

	public function run(){
		//DB::table('actividades') -> delete();

		Actividad::create(array(
			'visitas' => 0,
			'ultimo_usuario' => '',
			'ultima_visita' => '',
		));
	}
}
