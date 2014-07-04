<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Veninversion - Inactivo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Israel Lugo">

    <!-- Le styles -->
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
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    
  </head>

  <body>

    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active">{{Ucwords(Auth::user()->usuario)}}</li>
        </ul>
        <h3 class="muted">Veninversion</h3>
      </div>

      <hr>

      <div class="jumbotron">
        <h1>Tu usuario ha sido desactivado</h1>
        <p class="lead">Tu usuario esta desactivado, si usted no desactivo su cuenta por favor le recomendamos comunicarse con el administrador, para saber las razones por la cual su cuenta esta inactiva. Gracias.</p>
        <a class="btn btn-large btn-success" href="/Autenticacion/logout">Cerrar sesion</a>
      </div>

      <hr>
        <footer class='footer'>
          <p style="text-align:center">Producida por &copy; SOFTelixBM 2014 </p>
        </footer>
      <hr>

    </div> <!-- /container -->

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
