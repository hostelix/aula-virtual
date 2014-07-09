<?php

	setlocale(LC_TIME, 'es_VE'); # Localiza en español es_Venezuela
	date_default_timezone_set('America/Caracas');

class UsuarioController extends BaseController{
	
	public function __construct(){
		$this->beforeFilter('auth');
	}

	public function get_perfil(){
		if(Auth::user()->is_activo){
			$usuario = Estudiante::where('usuario_id', '=', Auth::user()->id)->get();
			return View::make('usuario.perfil')->with(array(
			'usuario' => $usuario));
		}
		else{
			return View::make('usuario.inactivo');
		}
	}


	public function post_subirimagen(){
		$reglas = array('imagen_usuario' => 'required');
		$campo = array('imagen_usuario' => Input::file('imagen_usuario'));
		
		$validacion = Validator::make($campo, $reglas);
		if($validacion->fails()){
			return Redirect::back()->withErrors($validacion)->withInput();
		}else{
			$archivo = Input::file('imagen_usuario');
			$extension = explode(".", $archivo->getClientOriginalName());
			$extension = $extension[count($extension)-1];

			$usuario = Usuario::find(Input::get('id_usuario'));

			$name = "/img_usuarios/imagen[".$usuario->usuario."]".$usuario->id.".".$extension;

			$archivo->move('img_usuarios',$name);
			$usuario->imagen = $name;
			$usuario->save();
			
			return Redirect::to('/GestionUsuario/perfil');

		}

	}

	public function get_registro(){
		if(Auth::user()->is_activo){
			return View::make('usuario.registro');
		}
		else{
			return View::make('usuario.inactivo');
		}
	}
	
	public function post_registro(){
		//reglas
    	$reglas = array(
    		'nombres' =>'required|max:50' ,
    		'apellidos' =>'required|max:50' ,
    		'cedula' =>'required|numeric|unique:estudiantes' ,
    		'ciudad' =>'required|max:25' ,
    		'codigo' =>'size:4' ,
    		'direccion' =>'required|max:90' ,
    		'telefono_fijo' =>'size:11' ,
    		'telefono_movil' =>'required|size:11' ,
    	 );

        $campos = array('nombres'=>Input::get('nombres'),'apellidos'=>Input::get('apellidos'),
        				'cedula' => Input::get('cedula'),'ciudad' => Input::get('ciudad'),
        				'codigo' => Input::get('codigo'),'direccion' => Input::get('direccion'),
        				'telefono_fijo' => Input::get('telefono_fijo'),'telefono_movil' => Input::get('telefono_movil'),
        				);

    	$validacion = Validator::make($campos,$reglas);
    	if($validacion->fails()){
    		return Redirect::back()->withErrors($validacion)->withInput();
    	}
    	else{

    		$usuario = Usuario::find(Auth::user()->id);

    		$estudiante = new Estudiante;
    		$estudiante ->nombres = Input::get('nombres');
			$estudiante ->apellidos = Input::get('apellidos');
			$estudiante ->cedula = Input::get('cedula');
			$estudiante ->usuario_id = $usuario -> id;
			$estudiante ->ciudad = Input::get('ciudad');
			$estudiante ->direccion = Input::get('direccion');
			$estudiante ->telf_movil = Input::get('telefono_movil');
			$estudiante ->telf_fijo = Input::get('telefono_fijo');

			$usuario -> is_estudiante = 1;
			$usuario -> save();	
			$estudiante -> save();



    		return Redirect::to('\home');

    	}
	}

	public function get_configuracion(){
		if(Auth::user()->is_activo){
			return View::make('usuario.configuracion');
		}
		else{
			return View::make('usuario.inactivo');
		}
	}

	public function post_configuracion(){
		$respuesta = Input::get('desactivar');
		$valor = 0;
		if($respuesta == 1){
			$valor = 0;
		}
		else{
			$valor = 1;
		}
		$usuario = Usuario::find(Input::get('user_id'));
		$usuario -> is_activo = $valor;
		$usuario -> save();

		if(!$valor){
			return Redirect::to('/Autenticacion/logout');
		}else{
			return Redirect::to('/GestionUsuario/perfil');
		}
		
	}
}