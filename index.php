<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Sistema Planificacion Estrat&eacute;gica BAILAC</title>
		<meta name="description" content="">
		<meta name="author" content="Andres Silva L">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<script language="javascript" src='sitio/js/jquery-1.8.3.min.js'></script><!--Incluye el framework de jquery -->
		<script language="javascript" src='sitio/js/jquery-ui-1.9.2.custom.min.js'></script><!--//Incluye el framework de jquery-ui-->
		<link rel='stylesheet' href='sitio/css/ui-lightness/jquery-ui-1.9.2.custom.min.css'><!-- Incluye el css del jquery UI-->
		<link rel='stylesheet' href='sitio/css/nuevoboton.css'><!-- Incluye el css del boton-->
		<link rel='stylesheet' href='sitio/css/error.css'><!-- Incluye el css del error-->
		<script language="javascript" src='sitio/js/alerta.js'></script><!--//alerta-->
		<script>
		$(document).ready(function(){

			$("#envio").on("click",function(){
				
				$(".error").remove();	
				
				if( $("#user").val() == "" ){
					$("#user").focus().after("<span class='error'>Ingrese Usuario</span>");
					return false;}
				
				
				else if( $("#pass").val() == ""){
					$("#pass").focus().after("<span class='error'>Ingrese Contrase&ntildea</span>");
					return false;
				}
				
				$.ajax({
					url:'login.php',
					type:'POST',
					data: {"user":$("#user").val(),"pass":$("#pass").val()}		
				}).done(function(data){
					console.log(data);
					
					if(data == '1'){
						location.href='sitio/index.php';
					}else if(data == '0'){
						alerta("Usuario o pass incorrecto");
						$("#pass").val('');
					}			
				});
			});
			
			$("#user, #pass").keyup(function(){
				if( $(this).val() != "" ){
					$(".error").fadeOut();			
					return false;
				}
				
			});
			
			});

		</script>
		<style>
		*{
			margin: 0px;
			padding: 0px;
		}
		body{
			background: url('sitio/img/fondo.jpg');
			background-repeat: no-repeat;
			background-size: cover;
		}
		
		#loguear label{
				color: #6d6b6b;
					font-family: Calibri;
					font-weight:bold;
					display: block;
		}
			


			#loguear
			{
				background: -moz-linear-gradient(top, #fefefe 0%, #dddddd 100%);
				background: -webkit-linear-gradient(top, #fefefe 0%,#dddddd 100%); 
				background: -ms-linear-gradient(top, #fefefe 0%, #dddddd 100%); 
				filter:progid:DXImageTransform.Microsoft.Gradient(endColorstr='#fefefe', startColorstr='#dddddd', gradientType='0');
				width:300px;
				border-radius: 3px;
				background-color: #fff;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20%;
				box-shadow: 0px 5px 10px 2px #B5C1C5, 0 0 0 0px #EEF5F7 inset;
				text-align: center;
			}

			.input{
				border-radius: 3px ;
				border: 1px solid #cccccc;
				width: 250px;


			}
			.input:focus{
				outline: none;
				box-shadow:0 0 0 1px #26b3e7;
			}
		</style>
		
	</head>

	<body>
		<div>
		<form>
			<div id="loguear">
				<div><label>Usuario:</label><input placeholder="Usuario" type="text" name="user" id="user" class="input" /></div>
				<div><label>Contrase&ntilde;a:</label><input placeholder="Contrase&ntilde;a" type="password" name="pass" class="input" id="pass" /></div></br>
				<div><button type="button" class="myButton" id="envio"/>Ingresar</button>&nbsp;<button name="limpiar" type="reset" class="myButton" />Limpiar</button></div>
			</br>
			</div>		
		</form>	
		</div>
	</body>
</html>
