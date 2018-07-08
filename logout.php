<?php
include 'config.php';
/*include('controller/usuarioController.php');
$usuario = new usuarioController();
*/
$session_uid='';
$_SESSION['id_usuarios']=''; 
if(empty($session_uid) && empty($_SESSION['id_usuarios']))
{
	$url=BASE_URL.'index.php';
	header("Location: $url");
//die();
//echo "";
}