<?php


class Estudiante extends Eloquent{

	protected $table = 'estudiantes';

	public function usuario(){
		return $this -> belongsTo('Usuario');
	}

}
