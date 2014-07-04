@if(Auth::user()->is_superuser)
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Veninversion - Panel </title>
	{{HTML::style('/css/all.css', array('rel'=>"stylesheet"))}}
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js/jquery-1.7.2.min.js"><\/script>');</script>
	<script type="text/javascript" src="js/jquery.main.js"></script>
	<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->

	<!-- styles -->
    {{HTML::style('/css/bootstrap.css', array('rel'=>"stylesheet"))}}
    {{HTML::style('/css/font-awesome.min.css', array('rel'=>"stylesheet"))}}
    {{HTML::style('/css/bootstrap-responsive.css', array('rel'=>"stylesheet"))}}
    <link rel="shortcut icon" href="{{asset('/img/favicon.png')}}">

    <!--SCRIPT-->
</head>
<body>
	<div id="wrapper">
		<div id="content">
			<div class="c1">
				<div class="controls">
					<nav class="links">
						<!--<ul>
							<li><a href="#" class="ico1">Mensajes <span class="num">26</span></a></li>
							<li><a href="#" class="ico2">Alertas <span class="num">5</span></a></li>
							<li><a href="#" class="ico3">Importante <span class="num">3</span></a></li>
						</ul>-->
						<h1 style="font-family:calibri;"> Panel de administracion </h1>
					</nav>
					<div class="profile-box">
						<span class="profile">
							<a href="/Administracion/panelprincipal" class="section">
								<img class="image" src="{{asset('images/img1.png')}}" alt="image description" width="26" height="26" />
								<span class="text-box">
									Bienvenido
									<strong class="name">{{Ucwords(Auth::user()->usuario)}}</strong>
								</span>
							</a>
						</span>
						<a href="/Autenticacion/logoutadmin" class="btn-on">Salir</a>
					</div>
				</div>
				<div class="tabs">
					<div id="tab-2" class="tab">
						<article>
							<div class="text-section">
							</div>
							<h2>&nbsp;&nbsp;&nbsp;Edicion de Usuario >> [{{$usuario->usuario}}]</h2>
							<hr>
							<div>
								<form class="form-horizontal" method="post">
									&nbsp;&nbsp;&nbsp;{{Form::submit('Guardar',array('class'=>"btn btn-success"))}}
									<hr>
									@if($errors->has())
										<ul class="states">
            							@foreach ($errors->all() as $error)
               								<li class="error">{{$error}}</li>
            							@endforeach
            							</ul>
          							@endif
									<br>
									<div style="width:650px;heigth:150px;margin-left:80px">
										<div class="input-prepend">
	  										<span class="add-on">Usuario</span>
	  										<input class="span2" id="prependedInput" value="{{$usuario->usuario}}"name="usuario" type="text" placeholder="Usuario">
										</div>
										<br><br>
										<div class="input-prepend">
	  										<span class="add-on">Email</span>
	  										<input class="span2" id="prependedInput" value="{{$usuario->email}}"name="email" type="text" placeholder="Email">
										</div>
										<br><br>
										<div class="input-prepend">
	  										<span class="add-on">Password</span>
	  										<input class="span2" id="prependedInput" name="password" type="password" placeholder="Password">
										</div>
										<br><br>
										<div class="input-prepend">
	  										<span class="add-on">Imagen</span>
	  										<input class="span2" id="prependedInput" value="{{$usuario->imagen}}" name="imagen" type="text" placeholder="Imagen">
										</div>
										<br><br>
										<div class="input-prepend">
	  										<span class="add-on">Es super usuario</span>
										</div>
	  										Si {{Form::radio('is_superuser', 1, $usuario->is_superuser)}}
	  										No {{Form::radio('is_superuser', 0, !$usuario->is_superuser)}}
										<br><br>
										<div class="input-prepend">
	  										<span class="add-on">Es estudiante</span>
										</div>
											Si {{Form::radio('is_estudiante', 1, $usuario->is_estudiante)}}
	  										No {{Form::radio('is_estudiante', 0, !$usuario->is_estudiante)}}
										<br><br>
										<div class="input-prepend">
	  										<span class="add-on">Esta activo</span>
										</div>
											Si {{Form::radio('is_activo', 1, $usuario->is_activo)}}
	  										No {{Form::radio('is_activo', 0, !$usuario->is_activo)}}
										<br><br>
										<div class="input-prepend">
	  										<span class="add-on">Ultima sesion</span>
	  										<input class="span2" id="prependedInput" value="{{$usuario->ultima_sesion}}"name="ultima_sesion" type="text" placeholder="Ultima sesion">
										</div>
										<br><br>
									</div>
								</form>
						    </div>
						</article>
					</div>
				</div>
			</div>
		</div>
		<aside id="sidebar">
			<strong class="logo"><a></a></strong>
			<ul class="tabset buttons">
				<li>
					<a href="/Administracion/panelprincipal" class="ico5"><span>Panel</span><em></em></a>
					<span class="tooltip"><span>Panel</span></span>
				</li>
				<li>
					<a href="/Administracion/panelusuarios" class="ico1"><span>Usuarios</span><em></em></a>
					<span class="tooltip"><span>Usuarios</span></span>
				</li>
				<li >
					<a href="/Administracion/panelestudiantes" class="ico1"><span>Estudiantes</span><em></em></a>
					<span class="tooltip"><span>Estudiantes</span></span>
				</li>
				<li>
					<a href="#" class="ico7"><span>#</span><em></em></a>
					<span class="tooltip"><span>#</span></span>
				</li>
				<li>
					<a href="#" class="ico3"><span>#</span><em></em></a>
					<span class="tooltip"><span>#</span></span>
				</li>
				<li>
					<a href="/Administracion/buscar" class="ico2"><span>Buscar</span><em></em></a>
					<span class="tooltip"><span>Buscar</span></span>
				</li>
				<li>
					<a href="/Administracion/subirarchivos" class="ico5"><span>Subir archivos</span><em></em></a>
					<span class="tooltip"><span>Subir archivos</span></span>
				</li>
				<li class="active">
					<a class="ico6"><span>Settings</span><em></em></a>
					<span class="tooltip"><span>Settings</span></span>
				</li>
			</ul>
			<span class="shadow"></span>
		</aside>
	</div>
</body>
</html>
@else
<script type="text/javascript">
	function redireccionar(){
		location.href='/home';
	}
	redireccionar();
</script>
@endif