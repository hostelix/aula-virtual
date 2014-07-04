<!DOCTYPE html>
<html lang="es">
  
<head>
    <meta charset="utf-8">
    <title>Inicio - Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- styles -->
    {{HTML::style('/css/bootstrap.css', array('rel'=>"stylesheet"))}}
    {{HTML::style('/css/font-awesome.min.css', array('rel'=>"stylesheet"))}}
    {{HTML::style('/css/bootstrap-responsive.css', array('rel'=>"stylesheet"))}}
    <link rel="shortcut icon" href="{{asset('/img/favicon.png')}}">

    <!--SCRIPT-->
    {{HTML::script('/js/jquery.min.js')}}
    {{HTML::script('/js/ajax.js')}}

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->

    {{HTML::style('/ico/favicon.png', array('rel'=>"stylesheet"))}}
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Veninversion</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Haz iniciado sesion correctamente 
<span class="label label-success">{{Ucwords(Auth::user()->usuario)}}</span>
            </p>
            <ul class="nav">
              <li class="active"><a href="/home">Inicio</a></li>
              <li><a href="/GestionUsuario/perfil">Perfil</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Opciones de usuario</li>
              <li><a href="/GestionUsuario/perfil">Perfil&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></a></li>
              @if(!(Auth::user()->is_estudiante))
              <li  class="active"><a href="/GestionUsuario/registro">Registro de datos&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></a></li>
              @endif
              <li><a href="/GestionUsuario/configuracion">Configuracion&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></a></li>
              @if(Auth::user()->is_superuser)
                <li class="nav-header">Administracion</li>
                <li><a href="/Administracion/panelprincipal">Panel de administrador&nbsp;&nbsp;<i class="fa fa-sign-out
              "></i></a></li>
              @endif
              <li class="nav-header">Salir</li>
              <li><a href="/Autenticacion/logout">Cerrar Sesion&nbsp;&nbsp;<i class="fa fa-sign-out"></i></a></li>
            </ul>
          </div><!--/.well -->

          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Ultimo inicio de sesion</li>
              <div class="alert alert-info">
                @if(Auth::user()->ultima_sesion)
                 {{Auth::user()->ultima_sesion}} &nbsp;<i class="fa fa-share"></i>
                @else
                  Primer inicio de sesion
                @endif
              </div>
            </ul>
          </div><!--/.well -->

        </div><!--/span-->
        <div class="span9">
        	<ul class="nav nav-tabs">
  				<li class="active">
    				<a href="">Registro</a>
  				</li>
			</ul>
			<div class="well">
				<form class = 'form-horizontal' method="post">
				<legend>Datos Personales</legend>
				
				<div class="row-fluid">
        <div id="errores-datos">
          @if($errors->has())
            <div class='alert alert-error'><p style='font-size:17px;'><i class='fa fa-exclamation-circle'></i>&nbsp; Error</p>
            @foreach ($errors->all() as $error)
                <i class='fa fa-exclamation-triangle'></i>&nbsp;{{$error}}<br>
            @endforeach
          @endif
        </div>
        <input type="hidden" name="id" value={{Auth::user()->id}}>
  					<div class="span5">
						  <div class="input-prepend" style="margin-top:30px">
                <span class="add-on">@</span>
                {{Form::text('nombres',"",array('placeholder' => 'Nombres','id'=>'IDnombres'))}}
	   					</div>
  					</div><!--span-->

  					<div class="span6">
	  					<div class="input-prepend" style="margin-top:30px">
                <span class="add-on">@</span>
	      						{{Form::text('apellidos',"",array('placeholder' => 'Apellidos','id'=>'IDapellidos'))}}
	   					</div>
  					</div><!--span-->
				</div>
				<div class="row-fluid">
  					<div class="span3">
						  <div class="input-prepend" style="margin-top:30px">
                <span class="add-on">@</span>
	      						{{Form::text('cedula',"",array('placeholder' => 'Cedula','class'=>'input-small','id'=>'IDcedula'))}}
	   					</div>
  					</div><!--span-->

  					<div class="span4">
	  					<div class="input-prepend" style="margin-top:30px">
                <span class="add-on">@</span>
	      						{{Form::text('ciudad',"",array('placeholder' => 'Ciudad','class'=>'input-small','id'=>'IDciudad'))}}
	   					</div>
  					</div><!--span-->

				</div>

				<div class="row-fluid">
					<div class="span8">
            <div class="input-prepend" style="margin-top:30px">
              <span class="add-on">@</span>
	      					{{Form::text('direccion',"",array('placeholder' => 'Direccion','class'=>'input-xlarge','id'=>'IDdireccion'))}}
	   					</div>
					</div>
				</div>

				<div class="row-fluid">
  					<div class="span5">
						  <div class="input-prepend" style="margin-top:30px">
                <span class="add-on">@</span>
	      						{{Form::text('telefono_fijo',"",array('placeholder' => 'Telefono','class'=>'input-medium','id'=>'IDtelf_fijo'))}}
	   					</div>
  					</div><!--span-->

  					<div class="span6">
              <div class="input-prepend" style="margin-top:30px">
                  <span class="add-on">@</span>
  	      					{{Form::text('telefono_movil',"",array('placeholder' => 'Telefono Movil','class'=>'input-medium','id'=>'IDtelf_movil'))}}
  	   				</div>
  					</div><!--span-->
				</div><!--Rowfluid-->


        @if(!(Auth::user()->is_estudiante))					
				<div class="form-actions" style="padding-left:250px">
		  			<button class = 'btn btn-primary btn-medium' id='btn-guardar_datos'>Guardar Datos</button>
		  			{{Form::reset('Resetear')}}
				</div>
        @endif
			</form>
			</div> 
		</div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer class='footer'>
        <p style="text-align:center">Producida por &copy; SOFTelixBM 2014 </p>
      </footer>

    </div><!--/.fluid-container-->




    <!---java script popover-->
    <script type="text/javascript">
    $(document).ready(function(){
        $('#IDnombres').popover({html:true,title:'Nombres',content:'Introduce tus dos nombres<br>EJ: Pedro Jose',trigger:'focus',placement:'top'});
        $('#IDapellidos').popover({html:true,title:'Apellidos',content:'Introduce tus dos apellidos<br>EJ: Reyes Moreno',trigger:'focus',placement:'top'});
        $('#IDcedula').popover({html:true,title:'Cedula',content:'Introduce tu cedula<br>EJ: 5963147',trigger:'focus',placement:'top'});
        $('#IDciudad').popover({html:true,title:'Ciudad',content:'Localidad<br>EJ: CORO',trigger:'focus',placement:'right'});
        $('#IDdireccion').popover({html:true,title:'Direccion',content:'Introduce tu direccion completa<br>EJ: Las margaritas, Calle 19, casa 13',trigger:'focus',placement:'top'});
        $('#IDtelf_fijo').popover({html:true,title:'Telefono Fijo',content:'Introduce tu numero de telefono fijo<br>EJ: 0269-2539678',trigger:'focus',placement:'top'});
        $('#IDtelf_movil').popover({html:true,title:'Telefono Movil',content:'Introduce tu numero de telefono<br>EJ: 0412-9681232',trigger:'focus',placement:'top'});

    });
    </script>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{HTML::script('/js/jquery.js')}}
    {{HTML::script('/js/bootstrap-transition.js')}}
    {{HTML::script('/js/bootstrap-alert.js')}}
    {{HTML::script('/js/bootstrap-modal.js')}}
    {{HTML::script('/js/bootstrap-dropdown.js')}}
    {{HTML::script('/js/bootstrap-scrollspy.js')}}
    {{HTML::script('/js/bootstrap-tab.js')}}
    {{HTML::script('/js/bootstrap-tooltip.js')}}
    {{HTML::script('/js/bootstrap-popover.js')}}
    {{HTML::script('/js/bootstrap-button.js')}}
    {{HTML::script('/js/bootstrap-collapse.js')}}
    {{HTML::script('/js/bootstrap-carousel.js')}}
    {{HTML::script('/js/bootstrap-typeahead.js')}}
  </body>
</html>
