<?php

require_once 'conexion.php';

class portadaController{
	
	private  $conexion;

	public function __construct()
	{
		$this->conexion = Conexion::conectar();
	}

	

	public function ofertasDisponiblesXuser($id_usuario)
	{
		$query= "SELECT cant_ofertas FROM usuarios WHERE id_usuarios=:ID_usuario";
		$consulta = $this->conexion->prepare($query);
		$consulta->bindParam(":ID_usuario", $id_usuario, PDO::PARAM_INT );
		$consulta->execute();
		$cantidadOfertas = $consulta->fetch();
		return $cantidadOfertas;

	}

	

	public function getOferta($id_oferta)
	{
		$query= "SELECT linea1, linea2, precio, foto FROM ofertas WHERE id_ofertas=:id";
		$getOfer = $this->conexion->prepare($query);
		$getOfer->bindParam(":id", $id_oferta, PDO::PARAM_INT );
		$getOfer->execute();
		return  $getOfer->fetch();
		
	}

	
		
	
}