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
						<h1 style="font-family:calibri;"> Busqueda</h1>
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
							<h2>&nbsp;&nbsp;&nbsp;Busqueda de personas</h2>
							<hr>
							<form class="form-search" style="margin-left:40px" method="post">
								<label class="checkbox inline">
  									<input type="radio" name='opcion_buscar' value="usuario" checked> Usuario
  									<input type="radio" name='opcion_buscar'value="inversionista"> Inversionista
								</label>
								&nbsp;&nbsp;&nbsp;
  								<input type="text" class="input-large search-query" name="clave_buscar" placeholder="Cedula o Nombre de usuario">
  								<button type="submit" class="btn">Buscar</button>
							</form>
							<div>
							<hr>
								<table class="table table-striped">
								@if(isset($inver))
						            <thead>
						                <tr>
							                <th>ID</th><th>NOMBRES</th><th>APELLIDOS</th>
							                <th>CEDULA</th><th>USUARIO</th><th>BANCO</th>
							                <th>Nro DE CUENTA</th><th>CREADO</th>
							                <th>ACCION</th
						                </tr>
						            </thead>
						            <tbody>
						            	@if(count($inver) != 0)
						            		@foreach($inver as $inv)
								                <tr class="info">
								                  	<td>{{$inv->id}}</td><td>{{$inv->nombres}}</td><td>{{$inv->apellidos}}</td><td>{{$inv->cedula}}</td>
								                  	<td>{{$inv->usuario->usuario}}</td><td>{{$inv->nombre_banco}}</td><td>{{$inv->cuenta_bancaria}}</td><td>{{$inv->created_at}}</td>
								                  	<td>{{HTML::link('/Administracion/detallesinversionista/'.$inv->id,'Ver',array('class'=>"btn btn-success"))}}
								                </tr>
								            @endforeach
								        @else
									        <ul class="states">
												<li class="error">No se han encontrado resultados en la busqueda</span></li>
											</ul>
								        @endif
						            </tbody>

						        @elseif(isset($usuarios))

							        <thead>
							        	<tr>
							                <th>ID</th><th>USUARIO</th><th>EMAIL</th>
							                <th>IMAGEN</th><th>ADMIN</th><th>ACTIVO</th>
							                <th>Nro MESA</th><th>ULTIMA SESION</th><th>CREADO</th>
							                <th>ACCION</th>
							            </tr>
							        </thead>
							        <tbody>
										@if(count($usuarios) != 0)
							            	@foreach($usuarios as $usuario)
								                <tr @if($usuario->is_activo) class="info" @else class="error" @endif>
								                  	<td>{{$usuario->id}}</td><td>{{$usuario->usuario}}</td><td>{{$usuario->email}}</td><td>{{$usuario->imagen}}</td>
								                  	<td>{{($usuario->is_superuser)?("Si"):("No")}}</td><td>{{($usuario->is_activo)?("Si"):("No")}}</td><td>{{$usuario->num_mesa}}</td><td>{{$usuario->ultima_sesion}}</td><td>{{$usuario->created_at}}</td>
								                  	<td>{{HTML::link('/Administracion/detallesusuario/'.$usuario->id,'Ver',array('class'=>'btn btn-primary'))}}</td>
								                </tr>
									        @endforeach
									    @else
										   	<ul class="states">
												<li class="error">No se han encontrado resultados en la busqueda</span></li>
											</ul>
									    @endif
							        </tbody>
						        @endif
						       	</table>
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
				<li class="active">
					<a href="/Administracion/buscar" class="ico2"><span>Buscar</span><em></em></a>
					<span class="tooltip"><span>Buscar</span></span>
				</li>
				<li>
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