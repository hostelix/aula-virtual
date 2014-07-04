<?php

class EstudianteTableSeeder extends Seeder {

	public function run(){
		DB::table('estudiantes') -> delete();

		Estudiante::create(array(
			'nombres' => 'Israel josue',
			'apellidos' => 'lugo morillo',
			'cedula' => 12345678,
			'ciudad' => 'coro',
			'usuario_id'=> 1,
			'telf_movil' => '04164656110',
		));
	}
}
