<?php	
if(!empty($_SESSION['id_usuarios']))
{ 
	$session_uid=$_SESSION['id_usuarios'];
echo $session_uid;
	include('controller/usuarioController.php');
	$usuario = new usuarioController();
}
if(empty($session_uid))
{
	$url=BASE_URL.'newUser.php';
	header("Location: $url");
}