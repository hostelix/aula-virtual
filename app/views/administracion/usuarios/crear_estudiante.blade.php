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
							<div class="text-section">
							</div>
							<h2>&nbsp;&nbsp;&nbsp;Crear Estudiante</h2>
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
	  										<span class="add-on">Nombres</span>
	  										<input class="span2" id="prependedInput"  name="nombres" type="text" placeholder="Nombres">
										</div>
										<br><br>
										<div class="input-prepend">
	  										<span class="add-on">Apellidos</span>
	  										<input class="span2" id="prependedInput" name="apellidos" type="text" placeholder="Apellidos">
										</div>
										<br><br>
										<div class="input-prepend">
	  										<span class="add-on">Cedula</span>
	  										<input class="span2" id="prependedInput" name="cedula" type="text" placeholder="Cedula">
										</div>
										<br><br>
										<div class="input-prepend">
	  										<span class="add-on">Usuario</span>
	  										{{Form::select('usuario', $estud)}}
										</div>
										<br><br>
										<div class="input-prepend">
	  										<span class="add-on">Ciudad</span>
	  										<input class="span2" id="prependedInput" name="ciudad" type="text" placeholder="Ciudad">
										</div>
										<br><br>
										<div class="input-prepend">
	  										<span class="add-on">Direccion</span>
	  										<input class="span2" id="prependedInput" name="direccion" type="text" placeholder="Direccion">
										</div>
										<br><br>
										<div class="input-prepend">
	  										<span class="add-on">Telefono Movil</span>
	  										<input class="span2" id="prependedInput" name="telf_movil" type="text" placeholder="Telefono movil">
										</div>
										<br><br>
										<div class="input-prepend">
	  										<span class="add-on">Telefono Fijo</span>
	  										<input class="span2" id="prependedInput" name="telf_fijo" type="text" placeholder="Telefono fijo">
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
				<li class="active">
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
				<li>
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