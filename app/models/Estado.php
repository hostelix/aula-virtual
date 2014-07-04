<?php

class Estado extends Eloquent {
	
	public function inversionista(){
		return $this -> belongsTo('Estudiante');
	}
}