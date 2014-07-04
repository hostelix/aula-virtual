
function redireccionar(){
	location.href='/home';
}

function vaciar_campos(){
	$('#inputUsuario').val("")
	$('#inputPassword').val("")
}

jQuery(document).ready(function($) {

	// Ejecutemos el código cuando
 	// la página haya sido cargada por completo
 	$('#btn-login').click(function(e){
 		e.preventDefault();

 		//Obtenemos el valor de los campos para acceder a la base de datos
 		var usuario = $('#inputUsuario').val();
 		var password = $('#inputPassword').val();
 		
 		//intentamos obtener el nuevo contenido
 		$.post('http://veninversion.tl/Autenticacion/login',
 			{'usuario':usuario,'password':password},
 			function(data){
 				if(parseInt(data) == 1){
 					$('#contenido-error').html("<div class='alert alert-success'><i class='fa fa-check'></i> Usuario ha sido autentificado correctamente</div>");
 					vaciar_campos();
 					setTimeout(redireccionar,1500);
 				}
 				else{
 					$('#contenido-error').html("<div class='alert alert-error'><i class='fa fa-times-circle'></i> Error los datos son incorrectos</div>");
 					vaciar_campos();
 				}
 			
 		})
 	})
}); 