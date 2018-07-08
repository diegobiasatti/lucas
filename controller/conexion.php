<?php
require_once 'config.php';
class Conexion 
{

public function __construct(){
		
	}
	public static function conectar()
	{
		try
		{
		  $conexion = new PDO("mysql:host=" . HOST . ";dbname=" . AHORRO, USER, PASS);	
		  $conexion->exec("set names utf8");
		  return $conexion;
		}
		catch (PDOException $ex){
			echo $ex->getMessage();
		}

	}
}