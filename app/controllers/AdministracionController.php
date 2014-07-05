<?php

class AdministracionController extends BaseController {
	
	public function __construct(){
		$this->beforeFilter('auth');
	}

	public function get_panelprincipal(){

		$usuarios = count(Usuario::all());
		$no_estud= count(Usuario::where('is_estudiante','=',0)->get());
		$num_estudiantes = count(Estudiante::all());
		$actividad = Actividad::find(1);

		return View::make('administracion.usuarios.panel')->with(array(
			'num_usuarios' => $usuarios, 
			'no_estud' => $no_estud,
			'num_estudiantes' => $num_estudiantes,
			'actividad' => $actividad,
			));
	}

	public function get_panelusuarios(){
		$usuarios = Usuario::all();
		return View::make('administracion.usuarios.panel_usuarios')->with(array('usuarios' => $usuarios));
	}
	
	public function get_panelestudiantes(){
		$estud = Estudiante::all();
		return View::make('administracion.usuarios.panel_estudiantes')->with(array('estud' => $estud));
	}

	public function get_detallesusuario($id){
		$usuario = Usuario::find($id);
		if(is_null($usuario)){
			return Redirect::to('/Administracion/panelusuarios');
		}
		else{
			return View::make('administracion.usuarios.detalles_usuario')->with('usuario',$usuario);
		}
	}

	public function get_detallesestudiante($id){
		$estudiante = Estudiante::find($id);
		if(is_null($estudiante)){
			return Redirect::to('/Administracion/panelestudiantes');
		}
		else{
			return View::make('administracion.usuarios.detalles_estudiante')->with('inv',$estudiante);
		}
	}

	public function get_editarusuario($id){
		$usuario = Usuario::find($id);

		if($usuario->id != Auth::user()->id){
			if(is_null($usuario)){
	    		return Redirect::to('/Administracion/panelusuarios');
	    	}
	    	else{
	    		return View::make('administracion.usuarios.editar_usuario')->with('usuario',$usuario);
	    	}
	    }
	    else{
	    	return Redirect::to('/Administracion/panelprincipal');
	    }
	}

	public function post_editarusuario($id){
		$usuario = Usuario::find($id);
		if(is_null($usuario)){
			return Redirect::to('/Administracion/panelusuarios');
		}
		else{
			//reglas
	    	$reglas = array(
	    		'usuario' =>'required|max:50|alpha_num' ,
	    		'email' =>'required|email' ,
	    		'password' => 'min:5',
	    		'ultima_sesion' => 'min:5'
	    	 );

	        $campos = array('usuario'=>Input::get('usuario'),
	        				'email'=>Input::get('email'),
	        				'password' => Input::get('password'),
							'ultima_sesion' => Input::get('ultima_sesion'),
	        				);

	    	$validacion = Validator::make($campos,$reglas);
	    	if($validacion->fails()){
	    		return Redirect::back()->withErrors($validacion)->withInput();
	    	}
	    	else{
	    		
	    		$nombre_usuario = Input::get('usuario');

	    		$usuario -> usuario= $nombre_usuario;
	    		$usuario -> email = Input::get('email');
	    		if(Input::get('password')){
	    			$usuario -> password = Input::get('password');
	    		}
	    		if(Input::get('imagen')){
	    			$usuario -> imagen = Input::get('imagen');
	    		}
	    		$usuario -> is_superuser = Input::get('is_superuser');
	    		$usuario -> is_estudiante = Input::get('is_estudiante');
				$usuario -> is_activo = Input::get('is_activo');
				$usuario -> save();

	    		return Redirect::to('/Administracion/panelusuarios');

	    	}
	    }

	}

	public function get_editarestudiantes($id){
		$estudiante = Estudiante::find($id);

		if(is_null($estudiante)){
    		return Redirect::to('/Administracion/panelestudiantes');
    	}
    	else{
    		return View::make('administracion.usuarios.editar_estudiante')->with('inver',$estudiante);
    	}
	}

	public function post_editarestudiante($id){

		$estudiante = Estudiante::find($id);

		//reglas
    	$reglas = array(
    		'nombres' =>'required|max:50' ,
    		'apellidos' =>'required|max:50' ,
    		'cedula' =>'required|numeric' ,
    		'ciudad' =>'required|max:25' ,
    		'cod_postal' =>'size:4' ,
    		'direccion' =>'required|max:90' ,
    		'telf_fijo' =>'size:11' ,
    		'telf_movil' =>'required|size:11' ,
    	 );

        $campos = array('nombres'=>Input::get('nombres'),'apellidos'=>Input::get('apellidos'),
        				'cedula' => Input::get('cedula'),'ciudad' => Input::get('ciudad'),
        				'codigo' => Input::get('cod_postal'),'direccion' => Input::get('direccion'),
        				'telf_fijo' => Input::get('telf_fijo'),'telf_movil' => Input::get('telf_movil'),
        				
        				);

    	$validacion = Validator::make($campos,$reglas);
    	if($validacion->fails()){
    		return Redirect::back()->withErrors($validacion)->withInput();
    	}
    	else{

    		$estudiante ->nombres = Input::get('nombres');
			$estudiante ->apellidos = Input::get('apellidos');
			$estudiante ->cedula = Input::get('cedula');
			$estudiante ->ciudad = Input::get('ciudad');
			$estudiante ->direccion = Input::get('direccion');
			$estudiante ->cod_postal = Input::get('cod_postal');
			$estudiante ->telf_movil = Input::get('telf_movil');
			$estudiante ->telf_fijo = Input::get('telf_fijo');
			$estudiante -> save();

    		return Redirect::to('/Administracion/panelestudiantes');

    	}
	}

	

	public function get_eliminarusuario($id){
		$usuario = Usuario::find($id);
		if($usuario->id != Auth::user()->id){
			if(is_null($usuario)){
				return Redirect::to('/Administracion/panelusuarios');
			}
			else{
				$usuario->delete();
				$estudiante = Estudiante::where('usuario_id','=',$usuario->id);
				if(!is_null($estudiante)){
					$estudiante->delete();
				}
				return Redirect::to('/Administracion/panelusuarios');
			}
		}
		else{
			return Redirect::to('/Administracion/panelprincipal');
		}

	}

	public function get_eliminarestudiante($id){
		$estudiante = Estudiante::find($id);
		$usuario = Usuario::find($estudiante->usuario->id);
		if(is_null($estudiante)){
			return Redirect::to('/Administracion/panelestudiantes');
		}
		else{
			$estudiante->delete();
			$usuario -> is_estudiante = 0;
			$usuario -> save();
			return Redirect::to('/Administracion/panelestudiantes');
		}

	}


	public function get_crearusuario(){
		return View::make('administracion.usuarios.crear_usuario');
	}

	public function post_crearusuario(){
		//reglas
    	$reglas = array(
    		'usuario' =>'required|max:50|unique:usuarios|alpha_num' ,
    		'email' =>'required|email|unique:usuarios' ,
    		'password' =>'required|min:5' ,
    	 );

        $campos = array('usuario'=>Input::get('usuario'),
        				'email'=>Input::get('email'),
        				'password' => Input::get('password'),
        				);

    	$validacion = Validator::make($campos,$reglas);
    	if($validacion->fails()){
    		return Redirect::back()->withErrors($validacion)->withInput();
    	}
    	else{
    		
    		$nombre_usuario = Input::get('usuario');

    		$usuario = new Usuario;
    		$usuario -> usuario= $nombre_usuario;
    		$usuario -> email = Input::get('email');
    		$usuario -> password = Input::get('password');
    		$usuario ->	imagen = "";
    		$usuario -> is_superuser = Input::get('is_superuser');
    		$usuario -> is_estudiante = Input::get('is_estudiante');
			$usuario -> is_activo = Input::get('is_activo'); 
			$usuario -> save();

    		return Redirect::to('Administracion/panelusuarios');
 		}
	} 

	public function get_crearestudiante(){
		//Obtenemos todos los usuarios que no son estudiantesy los anexamos a una array con su id y su nombre
		$users = Usuario::where('is_estudiante','=',0)->get(array('id','usuario'));
		$id = array();
		$user = array();
		foreach ($users as $x){
			array_unshift($id,$x->id);
			array_unshift($user, $x->usuario);
		}
		$total_estud=array_combine($id, $user);

		return View::make('administracion.usuarios.crear_estudiante')->with(array('estud'=>$total_estud));
	}

	public function post_crearestudiante(){
		//reglas
    	$reglas = array(
    		'nombres' =>'required|max:50' ,
    		'apellidos' =>'required|max:50' ,
    		'cedula' =>'required|numeric' ,
    		'ciudad' =>'required|max:25' ,
    		'direccion' =>'required|max:90' ,
    		'telf_fijo' =>'size:11' ,
    		'telf_movil' =>'required|size:11' ,
    	 );

        $campos = array('nombres'=>Input::get('nombres'),'apellidos'=>Input::get('apellidos'),
        				'cedula' => Input::get('cedula'),'ciudad' => Input::get('ciudad'),
        				'direccion' => Input::get('direccion'),
        				'telf_fijo' => Input::get('telf_fijo'),'telf_movil' => Input::get('telf_movil'),
        				
        				);

    	$validacion = Validator::make($campos,$reglas);
    	if($validacion->fails()){
    		return Redirect::back()->withErrors($validacion)->withInput();
    	}
    	else{

    		$estudiante = new Estudiante;
    		$estudiante ->nombres = Input::get('nombres');
			$estudiante ->apellidos = Input::get('apellidos');
			$estudiante ->cedula = Input::get('cedula');
			$estudiante ->usuario_id = Input::get('usuario');
			$estudiante ->ciudad = Input::get('ciudad');
			$estudiante ->direccion = Input::get('direccion');
			$estudiante ->telf_movil = Input::get('telf_movil');
			$estudiante ->telf_fijo = Input::get('telf_fijo');
			
			$usuario = Usuario::find(Input::get('usuario'));
			if(is_null($usuario)){
				Redirect::back();
			}
			else{
				$usuario-> is_estudiante = 1;
				$usuario -> save();
				$estudiante -> save();
				return Redirect::to('/Administracion/panelestudiantes');
			}
		}
    }

    public function get_buscar(){
    	return View::make('administracion.usuarios.buscar');
    }

    public function post_buscar(){
    	$opcion = Input::get('opcion_buscar');
    	$clave_buscar = Input::get('clave_buscar');

    	if($opcion == "usuario"){
    		$usuario = Usuario::where('usuario','=',$clave_buscar)->get();
    		return View::make('administracion.usuarios.buscar')->with('usuarios',$usuario);
    	}
    	else{
    		$estudiante = Estudiante::where('cedula','=',$clave_buscar)->get();
    		return View::make('administracion.usuarios.buscar')->with('estud',$estudiante);
    	}

    }

    public function get_subirarchivos(){
    	return View::make('administracion.usuarios.subir_archivos');
    }


    public function post_subirarchivos(){

		$extensiones_permitidas= array('png', 'jpg', 'gif','zip');

		if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

			$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

			if(!in_array(strtolower($extension), $extensiones_permitidas)){
				echo '{"status":"error"}';
				exit;
			}

			if(move_uploaded_file($_FILES['upl']['tmp_name'], 'img_mesas/'.$_FILES['upl']['name'])){
				echo '{"status":"success"}';
				exit;
			}
		}

		echo '{"status":"error"}';
		exit;
    }

}