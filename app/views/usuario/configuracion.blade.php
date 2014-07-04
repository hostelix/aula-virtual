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
    {{HTML::style('/css/switch.css', array('rel'=>"stylesheet"))}}
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
<span class="label label-success">{{Auth::user()->usuario}}</span>
            </p>
            <ul class="nav">
              <li><a href="/home">Inicio</a></li>
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
              <li><a href="/GestionUsuario/registro">Registro de datos&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></a></li>
              @endif
              <li class="active"><a href="/GestionUsuario/configuracion">Configuracion&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></a></li>
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
        	<div class="tabbable"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab1" data-toggle="tab">Desactivar cuenta</a></li>
            </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
              <div class="well">
                <form action="/GestionUsuario/configuracion" method="post">
                <input type="hidden" value="{{Auth::user()->id}}s" name="user_id">
                  <div class="switch">
                    <input type="radio" class="switch-input" name="desactivar" value="1" id="SI">
                    <label for="SI" class="switch-label switch-label-off">SI</label>
            
                    <input type="radio" class="switch-input" name="desactivar" value="0" id="NO" checked="">
                    <label for="NO" class="switch-label switch-label-on">NO</label>
            
                    <span class="switch-selection"></span>
                </div>
                <br><br>
                <p class="text-center"><button class = 'btn btn-warning btn-large' id='btn-guardar_datos'>Desactivar</button></p>
              </form>
            </div>
        </div>
      </div>
			
		</div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer class='footer'>
        <p style="text-align:center">Producida por &copy; SOFTelixBM 2014 </p>
      </footer>

    </div><!--/.fluid-container-->

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
