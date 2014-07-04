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
          @if(Auth::check())
            <p class="navbar-text pull-right">
              Haz iniciado sesion correctamente 
<span class="label label-success">{{Ucwords(Auth::user()->usuario)}}</span> <i class="fa fa-check-square-o fa-fw"></i>
            </p>
            @endif
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
              <li class=""><a href="/GestionUsuario/perfil">Perfil&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></a></li>
              @if(!(Auth::user()->is_estudiante))
              <li><a href="/GestionUsuario/registro">Registro de datos&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></a></li>
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
          <div class="hero-unit">
            <h1>Bienvenido, {{Ucwords(Auth::user()->usuario)}}</h1><br>
            @if(!(Auth::user()->is_estudiante))
            <blockquote>
              <p ><i class="fa fa-quote-left"></i>
              Si es la primera vez que accedes al panel de usuario por favor, registra tus datos para que tengas acceso a todo.
              <i class="fa fa-quote-right"></i></p>
            </blockquote>
              <p><a href="/GestionUsuario/registro" class="btn btn-primary btn-large">Registra tus datos</a></p>
            @else
              <blockquote>
                <p><i class="fa fa-quote-left icon-lg"></i>
                 &nbsp;Ya estas registrado, ahora tendras acceso a muchas caracteristicas. Si quieres verlas accede al panel de usuario&nbsp;
                <i class="fa fa-quote-right icon-lg"></i></p>
              </blockquote>
              <p><a href="/GestionUsuario/perfil" class="btn btn-primary btn-large ">Ir a perfil <i class="fa fa-chevron-right"></i></a></p>
            @endif
          </div>
          <div class="row-fluid">
            <div class="span4">
              <p><div class="alert alert-success"><i class="fa fa-users fa-fw"></i>  <strong>Puedes ver contenido</strong></div></p>
              <p>Por medio del panel de perfil puedes acceder a todo los contenido proporcionado por el tutor.</p>
              <p><a class="btn" href="/GestionUsuario/perfil">Ir &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <p><div class="alert alert-success"><i class="fa fa-cog fa-fw fa-spin"></i>  <strong>Facil registro</strong></div></p>
              <p>En el panel de registro proporcionaras toda la informacion necesaria, para ser registrado formalmente en la academia.</p>
              @if(!Auth::user()->is_estudiante)
                <p><a class="btn" href="/GestionUsuario/registro">Ir &raquo;</a></p>
              @endif
            </div><!--/span-->
            <div class="span4">
              <p><div class="alert alert-success"><i class="fa fa-spinner fa-fw fa-spin"></i>  <strong>Mantente actualizado</strong></div></p>
              <p>Estaremos subiendo los documentos necesarios para cada clase, tendras facil acceso y toda la disponibilidad para descargar.</p>
              <p><a class="btn" href="GestionUsuario/perfil">Ir &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p style="text-align:center">Producida por &copy; SOFTelixBM 2014 </p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{HTML::script('/js/jquery.min.js')}}
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
