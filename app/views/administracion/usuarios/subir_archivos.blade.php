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
    {{HTML::script('/js/jquery.min.js')}}
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
						<h1 style="font-family:calibri;">Gestor de archivos</h1>
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
							<h2>&nbsp;&nbsp;&nbsp;Subir archivos</h2>
							<hr>
							@if($errors->has())
								<ul class="states">
           							@foreach ($errors->all() as $error)
                							<li class="succes">{{$error}}</li>
           	 						@endforeach
          					@endif
							</ul>
							<hr>
							<form class="form-search" style="margin-left:40px" method="post" enctype="multipart/form-data">
  								<input type="file" class="input-large " name="imagen1"><br>
  								<input type="file" class="input-large " name="imagen2"><br>
  								<input type="file" class="input-large " name="imagen3"><br>
  								<input type="file" class="input-large " name="imagen4"><br>
  								<input type="file" class="input-large " name="imagen5"><br>
  								<input type="file" class="input-large " name="imagen6"><br><br>
  								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  								<button type="submit" class="btn">Subir</button>
							</form>
							<div>
							
						    </div>
						</article>
					</div>
				</div>
			</div>
		</div>
		<aside id="sidebar">
			<strong class="logo"><a></a></strong>
			<ul class="tabset buttons">
				<li >
					<a href="/Administracion/panelprincipal" class="ico5"><span>Panel</span><em></em></a>
					<span class="tooltip"><span>Panel</span></span>
				</li>
				<li >
					<a href="/Administracion/panelusuarios" class="ico1"><span>Usuarios</span><em></em></a>
					<span class="tooltip"><span>Usuarios</span></span>
				</li>
				<li>
					<a href="/Administracion/panelinversionistas" class="ico1"><span>Inversionistas</span><em></em></a>
					<span class="tooltip"><span>Inversionistas</span></span>
				</li>
				<li>
					<a href="/Administracion/activacioninversionistas" class="ico7"><span>Activar</span><em></em></a>
					<span class="tooltip"><span>Activar</span></span>
				</li>
				<li>
					<a href="/Administracion/inversionistasformales" class="ico3"><span>Inversionistas Formales</span><em></em></a>
					<span class="tooltip"><span>Inversionistas Formales</span></span>
				</li>
				<li>
					<a href="/Administracion/buscar" class="ico2"><span>Buscar</span><em></em></a>
					<span class="tooltip"><span>Buscar</span></span>
				</li>
				<li class="active">
					<a href="/Administracion/subirmesas" class="ico5"><span>Subir mesas</span><em></em></a>
					<span class="tooltip"><span>Subir mesas</span></span>
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
