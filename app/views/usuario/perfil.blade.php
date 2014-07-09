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
            <p class="navbar-text pull-right">
              Haz iniciado sesion correctamente 
              <span class="label label-success">{{Ucwords(Auth::user()->usuario)}}</span>
              <i class="fa fa-check-square-o fa-fw"></i>
           
            </p>
            <ul class="nav">
              <li ><a href="/home">Inicio</a></li>
              <li class="active"><a href="/GestionUsuario/perfil">Perfil</a></li>
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
              <li class="active"><a href="/GestionUsuario/perfil">Perfil&nbsp;&nbsp;<i class="fa fa-angle-double-right"></i></a></li>
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
          <div class="tabbable"> <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
              <li {{($errors->has())?"":'class="active"'}}><a href="#tab1" data-toggle="tab">Datos Usuario </a></li>
              <li {{($errors->has())?'class="active"':""}}><a href="#tab2" data-toggle="tab">Subir Imagen</a></li>
            </ul>

            <div class="tab-content">

              <div class="tab-pane {{($errors->has())?"":'active'}}" id="tab1">
                <div class="well">
                  <div class="row-fluid">
                    <div class="span6">
                      <div class="alert alert-info" style="width:350px;">
                        <div class="row-fluid">
                          <div class="span6">
                          @if(Auth::user()->imagen == '')
                            <img src="{{asset('img/sin-imagen.gif')}}" class="img-rounded img-polaroid" style="width:280px;height:150px">
                          @else
                            <img src="{{asset(Auth::user()->imagen)}}" class="img-rounded img-polaroid" style="width:280px;height:150px">
                          @endif
                            <br><br>
                            <div class="caption" style="margin-top:20px">
                              <span class="badge" style="margin-bottom:2px">Email</span>
                              <span class="label label-info" style="font-size:18px; padding:5px;">{{Auth::user()->email}}</span>
                            </div>
                          </div>
                        <div class="span3"  style="margin-left:50px;">
                          <span class="badge" style="margin-bottom:2px">
                          <i class="fa fa-arrow-right"></i>  Usuario</span>
                          <span class="label label-info">{{Ucwords(Auth::user()->usuario)}}</span>
                          <br><br>
                          <span class="badge" style="margin-bottom:2px">
                          <i class="fa fa-arrow-right"></i> Numero de mesa</span>
                          <span class="label label-info">{{Ucwords(Auth::user()->num_mesa)}}</span>
                          <br><br>
                          @if(!Auth::user()->is_superuser)
                            <span class="label label-warning">
                            <i class="fa fa-arrow-right"></i> Usuario estandar</span>
                          @else
                            <span class="label label-warning">
                            <i class="fa fa-arrow-right"></i> Administrador</span>
                          @endif
                          <br><br>
                          @if(Auth::user()->is_estudiante)
                              <span class="label label-success"> <i class="fa fa-check"></i> Ya eres estudiante</span>
                          @else
                            <span class="label label-important"> <i class="fa fa-times"></i> No eres estudiante</span>
                          @endif
                        </div>
                        </div>
                      </div>
                    </div>
                    <div class="span1">
                    </div>

                    <div class="span5">
                    @if(Auth::user()->is_estudiante)
                      <div class="alert alert-success">

                       <span class="label label-success" style="margin-bottom:2px; font-size:18px;">
                        <i class="fa fa-arrow-right"></i> Datos Estudiante <i class="fa fa-arrow-left"></i>
                      </span>
                      <br><br>

                        <p>
                          <span class="badge" style="margin-bottom:2px">
                              <i class="fa fa-arrow-right"></i>  Nombre</span>
                              <span class="label label-info">{{Ucwords($usuario[0]->nombres)}}
                          </span>
                        </p>

                        <p>
                          <span class="badge" style="margin-bottom:2px">
                              <i class="fa fa-arrow-right"></i>  Apellidos</span>
                              <span class="label label-info">{{Ucwords($usuario[0]->apellidos)}}
                          </span>
                        </p>

                        <p>
                          <span class="badge" style="margin-bottom:2px">
                              <i class="fa fa-arrow-right"></i>  Cedula</span>
                              <span class="label label-info">{{Ucwords($usuario[0]->cedula)}}
                          </span>
                        </p>

                        <p>
                          <span class="badge" style="margin-bottom:2px">
                              <i class="fa fa-arrow-right"></i>  Ciudad</span>
                              <span class="label label-info">{{Ucwords($usuario[0]->ciudad)}}
                          </span>
                        </p>
                        <p>
                          <span class="badge" style="margin-bottom:2px">
                              <i class="fa fa-arrow-right"></i>  Direccion</span>
                              <span class="label label-info">{{Ucwords($usuario[0]->direccion)}}
                          </span>
                        </p>

                        <p>
                          <span class="badge" style="margin-bottom:2px">
                              <i class="fa fa-arrow-right"></i>  Creado</span>
                              <span class="label label-info">{{($usuario[0]->created_at)}}
                          </span>
                        </p>
                      </div>
                     
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="tab-pane {{($errors->has())?'active':""}}" id="tab2">
                <div class="well">
                  {{Form::open(array('url'=>'GestionUsuario/subirimagen','files'=>true))}}
                  <legend>Selecciona una imagen para identificarte</legend>
                  <div>
                    @if($errors->has())
                      <div class='alert alert-error'><p style='font-size:17px;'><i class='fa fa-exclamation-circle'>  </i>&nbsp; Error</p>
                          @foreach ($errors->all() as $error)
                            <i class='fa fa-exclamation-triangle'></i>&nbsp;{{$error}}<br>
                          @endforeach
                      </div>
                    @endif
                    {{Form::file('imagen_usuario',array('id' =>'imagen' ))}}
                    <div id="error-imagen"></div>
                    <input type="hidden" name='id_usuario' value="{{Auth::user()->id}}">
                    <div class="form-actions">
                      {{Form::submit('Subir imagen',array('class'=>'btn btn-large btn-success', 'id'=>'btn-imagen'))}}
                    </div>
                </div>
                  {{Form::close()}}
              </div>
            </div>

            
          </div><!--tab-content-->
        </div><!--tabble-->
      </div><!--/span-->
    </div><!--row-fluid-->
  </div><!--/.fluid-container-->

  <!---Model imagen de estado de mesa-->
  <div id="myestado" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Estado de Mesa</h3>
  </div>
  <div class="modal-body"  style="width:400; height:390;">
    <img src="{{asset('img_mesas/'.Auth::user()->num_mesa)}}.jpg" class="img-rounded">
  </div>
</div>
<!---fin modales-->

    <div id="footer contenido" style="padding-top:100px;">
      <hr>
        <footer class='footer'>
          <p class="text-center">Producida por &copy; SOFTelixBM 2014 </p>
        </footer>
      <hr>
    </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{HTML::script('/js/ajax.js')}}
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
