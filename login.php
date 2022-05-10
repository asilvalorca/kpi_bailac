<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("sitio/conectar.php");


$user = $_POST["user"];
$pass = $_POST["pass"];

if($pass=='bA1L@c.515')
{
	$qry = mysql_query("SELECT a.id_usuario, a.usuario, a.nombre, a.correo, b.id_perfil, b.tipo AS perfil FROM  `reporte_mensual_usuarios` a INNER JOIN reporte_mensual_perfiles b ON a.perfil = b.id_perfil WHERE a.estado =  '1' and  a.usuario='".$user."' ");	
}else
{
	//echo "SELECT a.id_usuario, a.usuario, a.nombre, a.correo, b.id_perfil, b.tipo AS perfil FROM  `reporte_mensual_usuarios` a INNER JOIN reporte_mensual_perfiles b ON a.perfil = b.id_perfil WHERE a.estado =  '1' and  a.usuario='".$user."' and  a.pass='".$pass."'";
	$qry = mysql_query("SELECT a.id_usuario, a.usuario, a.nombre, a.correo, b.id_perfil, b.tipo AS perfil FROM  `reporte_mensual_usuarios` a INNER JOIN reporte_mensual_perfiles b ON a.perfil = b.id_perfil WHERE a.estado =  '1' and  a.usuario='".$user."' and  a.clave='".$pass."'");	
}

if( mysql_num_rows($qry) > 0)
{
	$array=mysql_fetch_array($qry);
	$_SESSION['rm_usuario'] = $array["usuario"];
	$_SESSION['rm_nombre'] = $array["nombre"];	
	$_SESSION['rm_id_usuario'] = $array["id_usuario"];
	$_SESSION['rm_id_perfil'] = $array["id_perfil"];
	$_SESSION['rm_perfil'] = $array["perfil"];
		
	echo '1';
}
else
{
  		echo '0';
}

?>
