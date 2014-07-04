<?php

class UsuarioTableSeeder extends Seeder {

	public function run(){
		DB::table('usuarios') -> delete();

		Usuario::create(array(
			'usuario' => 'admin',
			'password' => Hash::make('admin'),
			'email' => 'fejmisiones@gmail.com',
			'is_superuser' => 1,
		));
	}
}
