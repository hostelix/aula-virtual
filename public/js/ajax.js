
URL = location.hostname;
PROTOCOL = location.protocol;

function redireccionar(){
	location.href='/home';
}

function vaciar_campos(campo){
	for (var i= 0; i< campo.length ; i ++) {
		$(campo[i]).val("");
	};
}
function agregar(data){
	var errores="<div class='alert alert-error'><p style='font-size:17px;'><i class='fa fa-exclamation-circle'></i>&nbsp; Error</p>";
	for(var i=0; i<data.length;i++ ){
 		errores+="<i class='fa fa-exclamation-triangle'></i>&nbsp;"+data[i]+"<br>";
 	};
 	errores+="</div>";
 	return errores;
}


jQuery(document).ready(function($) {

	//funcion para el manejo de auntenticacion login
 	$('#btn-login').click(function(e){
 		e.preventDefault();

 		//Obtenemos el valor de los campos para acceder a la base de datos
 		var usuario = $('#inputUsuario').val();
 		var password = $('#inputPassword').val();
 		
 		//arreglo que contiene los nombres de campos para vaciarlos
 		var campos = ["#inputUsuario","#inputPassword"];

 		//intentamos obtener el nuevo contenido
 		$.post(PROTOCOL +"//"+ URL + '/Autenticacion/login',
 			{'usuario':usuario,'password':password},
 			function(data){
        console.log(data);
 				if(parseInt(data)){
          $('#contenido-error').html("<div class='alert alert-success'><i class='fa fa-check'></i> Usuario ha sido autentificado correctamente</div>");
 					//vaciar_campos(campos);
 					setTimeout(redireccionar,1500);
 				}
 				else{
 					$('#contenido-error').html("<div class='alert alert-error'><i class='fa fa-times-circle'></i> Error los datos son incorrectos</div>");
 					vaciar_campos(campos);
 				}
 			
 		})
 	})

//funcion para el manejo de auntenticacion registro
 	$('#btn-registro').click(function(e){
 		e.preventDefault();

 		//Obtenemos el valor de los campos para acceder a la base de datos
 		var usuario = $('#inputUsuarioR').val();
 		var email = $('#inputEmailR').val();
 		var password = $('#inputPasswordR').val();
 		var repassword = $('#inputRePasswordR').val();

 		//arreglo que contiene los nombres de campos para vaciarlos
 		var campos = ["#inputPasswordR","#inputRePasswordR"];
		var todos_campos = ['#inputEmailR','#inputUsuarioR',"#inputPasswordR","#inputRePasswordR"];

 		//intentamos obtener el nuevo contenido
 		$.post(PROTOCOL +"//"+ URL + '/Autenticacion/nuevo',{'usuario':usuario,'email':email,'password':password},function(data){
 				if(parseInt(data) == 1){
 					$('#errores-registro').html("<div class='alert alert-success'><i class='fa fa-check-circle-o fa-lg'></i>&nbsp;Se ha registrado correctamente</div>");
 					vaciar_campos(todos_campos);
 				}
 				else{
 					console.log(data);
 					$('#errores-registro').html(agregar(data));
 					vaciar_campos(campos);
 				}
 			
 		})
 	})
	
	$('#inputPasswordR').on("keyup",function(){

 		var campo1 = $('#inputPasswordR').val();
  		var campo2 = $("#inputRePasswordR").val();

  		if((campo1 != campo2)){
  			$("#btn-registro").addClass('btn btn-large btn-danger disabled');
  			$("#btn-registro").attr('disabled','disabled');
  		}
  		else{

  			$("#btn-registro").attr('class','btn btn-large btn-primary');
        $("#btn-registro").removeAttr("disabled",'disabled');
  		}
 	})
 	
 	$('#inputRePasswordR').on("keyup",function(){

 		var campo1 = $('#inputPasswordR').val();
  		var campo2 = $("#inputRePasswordR").val();

  		if((campo1 != campo2)){
  			$("#btn-registro").addClass('btn btn-large btn-danger disabled');
  			$("#btn-registro").attr('disabled','disabled');
  		}
  		else{
  			$("#btn-registro").attr('class','btn btn-large btn-primary');
        $("#btn-registro").removeAttr("disabled",'disabled');
  		}
 	})


  $('#imagen').on("change",function(){

    var EP = ['jpg','png','gif','jpeg','bmp'];//Extensiones permitidas
    var extension = $('#imagen').val().split('.');
    extension = extension[extension.length-1];
    var permitir = 0;

     for(ex in EP){
        if(EP[ex] == extension){
            permitir++;
        }
     }
     if(permitir != 0){
        $("#error-imagen").html("<span class='badge badge-success' style='padding-top:5px;'>Imagen Permitida <i class='fa fa-thumbs-o-up'></i></span>")
        $("#btn-imagen").removeAttr('class','btn btn-large btn-danger disabled').addClass('btn btn-large btn-success');
        $("#btn-imagen").removeAttr('disabled','disabled');
     }
     else{
        $("#error-imagen").html("<span class='badge badge-important' style='marging-top-top:5px;'>Imagen No Permitida <i class='fa fa-times'></i></i></span>")
        $("#btn-imagen").removeAttr('class','btn btn-large btn-success').addClass('btn btn-large btn-danger disabled');
        $("#btn-imagen").attr('disabled','disabled');
     }

  })


}); 