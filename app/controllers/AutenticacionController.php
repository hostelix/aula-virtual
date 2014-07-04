<?php
	setlocale(LC_TIME, 'es_VE'); # Localiza en español es_Venezuela
	date_default_timezone_set('America/Caracas');

class AutenticacionController extends BaseController {

	public function get_index(){
		return View::make('inicio.index');
	}

	public function get_login(){
		return ;
	}

	public function post_login(){
		$datoslogin = array(
			'usuario' => Input::get('usuario'),
			'password' => Input::get('password'),
			);

		$existe = 0;
		if(Auth::attempt($datoslogin)){
			$existe = "1";

			/*$visita = Actividad::find(1);
			$visita-> visitas = $visita->visitas + 1;
			$visita-> save();*/
		}
		else{
			$existe = "0";
		}

		return $existe;
	}

	
	public function get_nuevo(){
		return ;
	}
	public function post_nuevo(){
		//reglas
    	$reglas = array(
    		'usuario' =>'required|max:50|unique:usuarios|alpha_num' ,
    		'email' =>'required|email|unique:usuarios' ,
    		'password' =>'required|min:5' ,
    	 );

        $campos = array('usuario'=>Input::get('usuario'),
        				'email'=>Input::get('email'),
        				'password' => Input::get('password'),
        				'repassword' => Input::get('repassword')
        				);

    	$validacion = Validator::make($campos,$reglas);
    	if($validacion->fails()){
    		return Response::json($validacion->messages()->all());
    	}
    	else{
    		
    		$nombre_usuario = Input::get('usuario');

    		$usuario = new Usuario;
    		$usuario ->usuario= $nombre_usuario;
    		$usuario ->email = Input::get('email');
    		$usuario ->password = Input::get('password');
			$usuario -> is_activo = 1; 
			$usuario -> is_estudiante = 0;
			$usuario -> is_superuser = 0;
			$usuario -> imagen = "";
			$usuario -> save();

    		return "1";

    	}
	}

	public function get_logout(){

		$usuario = Usuario::find(Auth::user()->id);
		$usuario -> ultima_sesion = date("d-m-Y h:m:s A");
		$usuario -> save();

		Auth::logout();
		return Redirect::to('/');
	}

	public function get_logoutadmin(){
		$usuario_admin = Usuario::find(Auth::user()->id);
		$actividad = Actividad::find(1);
		$actividad -> ultimo_usuario = $usuario_admin->usuario;
		$actividad -> ultima_visita = date('d-m-Y h:m:s A');
		$actividad -> save();
		Auth::logout();
		return Redirect::to('/');
	}
}