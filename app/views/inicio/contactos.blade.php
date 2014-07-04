<!DOCTYPE html>
<html lang="es">

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <title>Bienvenido &middot; Veninversion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Israel Lugo">

    <!-- Le styles -->
    {{HTML::style('/css/bootstrap.css')}}
    {{HTML::style('/css/bootstrap-responsive.css')}}
    {{HTML::style('/css/bootstrap-theme.css')}}
    {{HTML::style('/css/font-awesome.min.css')}}
    {{HTML::script('/js/jquery.min.js')}}
    {{HTML::script('/js/ajax.js')}}
    <style>

    /* GLOBAL STYLES
    -------------------------------------------------- */
    -------------------------------------------------- */
    /* Padding below the footer and lighter body text */

    body {
      padding-bottom: 40px;
      color: #5a5a5a;
    }



    /* CUSTOMIZE THE NAVBAR
    -------------------------------------------------- */

    /* Special class on .container surrounding .navbar, used for positioning it into place. */
    .navbar-wrapper {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      z-index: 10;
      margin-top: 20px;
      margin-bottom: -90px; /* Negative margin to pull up carousel. 90px is roughly margins and height of navbar. */
    }
    .navbar-wrapper .navbar {

    }

    /* Remove border and change up box shadow for more contrast */
    .navbar .navbar-inner {
      border: 0;
      -webkit-box-shadow: 0 2px 10px rgba(0,0,0,.25);
         -moz-box-shadow: 0 2px 10px rgba(0,0,0,.25);
              box-shadow: 0 2px 10px rgba(0,0,0,.25);
    }

    /* Downsize the brand/project name a bit */
    .navbar .brand {
      padding: 14px 20px 16px; /* Increase vertical padding to match navbar links */
      font-size: 16px;
      font-weight: bold;
      text-shadow: 0 -1px 0 rgba(0,0,0,.5);
    }

    /* Navbar links: increase padding for taller navbar */
    .navbar .nav > li > a {
      padding: 15px 20px;
    }

    /* Offset the responsive button for proper vertical alignment */
    .navbar .btn-navbar {
      margin-top: 10px;
    }



    /* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel {
      margin-bottom: 60px;
    }

    .carousel .container {
      position: relative;
      z-index: 9;
    }

    .carousel-control {
      height: 80px;
      margin-top: 0;
      font-size: 120px;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
      z-index: 10;
    }

    .carousel .item {
      height: 500px;
    }
    .carousel img {
      position: absolute;
      top: 0;
      left: 0;
      min-width: 100%;
      height: 500px;
    }

    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: 550px;
      padding: 0 20px;
      margin-top: 200px;
    }
    .carousel-caption h1,
    .carousel-caption .lead {
      margin: 0;
      line-height: 1.25;
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }
    .carousel-caption .btn {
      margin-top: 10px;
    }



    /* MARKETING CONTENT
    -------------------------------------------------- */

    /* Center align the text within the three columns below the carousel */
    .marketing .span4 {
      text-align: center;
    }
    .marketing h2 {
      font-weight: normal;
    }
    .marketing .span4 p {
      margin-left: 10px;
      margin-right: 10px;
    }





    /* RESPONSIVE CSS
    -------------------------------------------------- */

    @media (max-width: 979px) {

      .container.navbar-wrapper {
        margin-bottom: 0;
        width: auto;
      }
      .navbar-inner {
        border-radius: 0;
        margin: -20px 0;
      }

      .carousel .item {
        height: 500px;
      }
      .carousel img {
        width: auto;
        height: 500px;
      }

      .featurette {
        height: auto;
        padding: 0;
      }
      .featurette-image.pull-left,
      .featurette-image.pull-right {
        display: block;
        float: none;
        max-width: 40%;
        margin: 0 auto 20px;
      }
    }


    @media (max-width: 767px) {

      .navbar-inner {
        margin: -20px;
      }

      .carousel {
        margin-left: -20px;
        margin-right: -20px;
      }
      .carousel .container {

      }
      .carousel .item {
        height: 300px;
      }
      .carousel img {
        height: 300px;
      }
      .carousel-caption {
        width: 65%;
        padding: 0 70px;
        margin-top: 100px;
      }
      .carousel-caption h1 {
        font-size: 30px;
      }
      .carousel-caption .lead,
      .carousel-caption .btn {
        font-size: 18px;
      }

      .marketing .span4 + .span4 {
        margin-top: 40px;
      }

      .featurette-heading {
        font-size: 30px;
      }
      .featurette .lead {
        font-size: 18px;
        line-height: 1.5;
      }

    }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      {{HTML::script("/js/html5shiv.js")}}
    <![endif]-->

   
    <link rel="shortcut icon" href="{{asset('/img/favicon.png')}}">
    
    <!--- Funcion que maneja el dropdown -->
    <script type="text/javascript">

    $(document).ready(function(){
      $('.dropdown-toggle').dropdown();
      $('#info').popover()
    });
  </script>
  <!---fin de la funcuion-->
  </head>

  <body>



    <!-- NAVBAR
    ================================================== -->
    <div class="navbar-wrapper ">
      <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
      <div class="container">

        <div class="navbar navbar-inverse">
          <div class="navbar-inner  navbar-fixed-top" style="margin:10px 20px 0px 20px; ">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="/">Veninversion</a>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li><a href="/">Inicio</a></li>
                <li><a href="/info">Quienes Somos</a></li>
                <li class="active"><a href="/contactos">Contactos</a></li>
                <!-- Read about Bootstrap dropdowns at http://twbs.github.com/bootstrap/javascript.html#dropdowns -->
                <li class="dropdown" style="margin-left:300px">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <i class="fa fa-user"></i>&nbsp;<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a data-toggle="modal" data-target="#ModalIniciarSesion" style="padding:10px 0px 10px 30px">Iniciar Sesion &nbsp;<i class="fa fa-sign-in"></i></a></li>
                    <li class="divider"></li>
                    <li><a data-toggle="modal" data-target="#ModalRegistro" style="padding:10px 0px 10px 30px">Registrarse &nbsp;<i class="fa fa-sign-out"></i></a></li>               
                  </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->

      </div> <!-- /.container -->
    </div><!-- /.navbar-wrapper -->



   <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active" >
          <img src="{{asset('/img/examples/slide-01.jpg')}}" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Experimenta</h1>
              <p class="lead" >Comprueba la experiencia de formar parte de nuetros grupos de inversionitas.</p>
              <br><a class="btn btn-large btn-primary" data-toggle="modal" data-target="#ModalRegistro" >Registrate</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="{{ asset('/img/examples/slide-02.jpg') }}" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Eres miembro?</h1>
              <p class="lead">Pues accede y registra tus datos para acceder a tu mesa de inversion.</p>
              <br><a class="btn btn-large btn-primary" data-toggle="modal" data-target="#ModalIniciarSesion" >Iniciar Sesion</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="{{asset('/img/examples/slide-03.jpg')}}" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>An&iacute;mate</h1>
              <p class="lead">Crea tu grupo de inversionistas, partiendo de tus referidos. Recuerda que entre mas rapido consigan sus referidos, mas rapido bajaras a la posicion de cobrador.</p>
              <br><a class="btn btn-large btn-success">An&iacute;mate</a>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div><!-- /.carousel -->




    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="span4">
        </div><!-- /.span4 -->
        <div class="span4">
          <img class="img-circle" src="{{asset('/img/marketing/nav-02.jpg')}}">
          <h2>Heading</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          
        </div><!-- /.span4 -->
        <div class="span4">
        </div><!-- /.span4 -->
      </div><!-- /.row -->

      <!--Modals-->
      <!-- Modal Inicio de sesion -->
        <div id="ModalIniciarSesion" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Iniciar Sesion</h3>
            </div>
            <div class="modal-body">
            <!---FORMULARIOS-->
              <form class="form-horizontal">
                  <div id="contenido-error">
                    
                  </div>
                <div class="control-group">
                  <label class="control-label">Usuario</label>
                  <div class="controls">
                    <input type="text" name="usuario" id='inputUsuario' placeholder="Usuario">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputPassword">Contrase&ntilde;a</label>
                  <div class="controls">
                    <input type="password" id="inputPassword" name="password" placeholder="Contrase&ntilde;a">
                  </div>
                </div>
              </form>
            </div>
            <!---FIN FORMULARIOS-->
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
              <button class="btn btn-primary" id='btn-login'>Iniciar sesion</button>
            </div>
        </div>

      <!-- Modal registro de usuario -->
        <div id="ModalRegistro" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Registro</h3>
            </div>
            <div class="modal-body">
            <!--FORMULARIOS-->
              <form class="form-horizontal">
                <div id="errores-registro">
                
                </div>
                <div class="control-group">
                  <label class="control-label">Usuario</label>
                  <div class="controls">
                    <input type="text" id="inputUsuarioR" name="usuario" placeholder="Nombre de usuario" class="input-medium">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Email</label>
                  <div class="controls">
                    <input type="email" id="inputEmailR" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputPassword">Contrase&ntilde;a</label>
                  <div class="controls">
                    <input type="password" id="inputPasswordR" name="password" placeholder="Contrase&ntilde;a">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="inputPassword">Repetir Contrase&ntilde;a</label>
                  <div class="controls">
                    <input type="password" id="inputRePasswordR" name="repassword" placeholder="Repite Contrase&ntilde;a">
                  </div>
                </div>
              </form>
            <!---FIN FORMULARIOS-->
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
              <button type="button" class="btn btn-large btn-primary disabled"  id="btn-registro">Registrarse</button>
              
            </div>
        </div>
    <!-- endModals-->

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#"><i class="fa fa-chevron-circle-up large fa-3x"></i></a></p>
        <p style="text-align:center; padding-top:30px;">Producida por &copy; SOFTelixBM 2014 . &middot; 
        <a id="info">Contactanos</a></p>
      </footer>

    </div><!-- /.container -->

    


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{HTML::script("/js/bootstrap-transition.js")}}
    {{HTML::script("/js/bootstrap-alert.js")}}
    {{HTML::script("/js/bootstrap-modal.js")}}
    {{HTML::script("/js/bootstrap-dropdown.js")}}
    {{HTML::script("/js/bootstrap-scrollspy.js")}}
    {{HTML::script("/js/bootstrap-tab.js")}}
    {{HTML::script("/js/bootstrap-tooltip.js")}}
    {{HTML::script("/js/bootstrap-popover.js")}}
    {{HTML::script("/js/bootstrap-button.js")}}
    {{HTML::script("/js/bootstrap-collapse.js")}}
    {{HTML::script("/js/bootstrap-carousel.js")}}
    {{HTML::script("/js/bootstrap-typeahead.js")}}
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
    {{HTML::script("/js/holder/holder.js")}}
  </body>

</html>
