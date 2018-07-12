<?php

require_once 'conexion.php';

class ofertaController{
	
	private  $conexion;

	public function __construct()
	{
		$this->conexion = Conexion::conectar();
	}

	public function insertOferta($id_usuario, $id_categoria, $linea1, $linea2, $precio, $fotoUrl)
	{
		$query2 = "INSERT INTO "
		        . "ofertas( id_usuario, id_categoria, linea1, linea2, precio, foto) "
		        . "VALUES (:id_usuario, :id_categoria, :linea1, :linea2, :precio, :foto)";
		$consulta = $this->conexion->prepare($query2);
		$consulta->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
		$consulta->bindParam(":id_categoria", $id_categoria, PDO::PARAM_INT);
		$consulta->bindParam(":linea1", $linea1, PDO::PARAM_STR);
		$consulta->bindParam(":linea2", $linea2, PDO::PARAM_STR);
		$consulta->bindParam(":precio", $precio, PDO::PARAM_STR);
		$consulta->bindParam(":foto", $fotoUrl, PDO::PARAM_STR);
		
		if( $consulta->execute() ){
			return true;
		}
		else
			return  false;
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

	public function deleteOferta($id_oferta)
	{
		$query2 = "DELETE FROM ofertas WHERE id_ofertas = :id";
		$producto = $this->conexion->prepare($query2);	
		$producto->bindParam(":id", $id_oferta, PDO::PARAM_INT);
		$solucion = $producto->execute();
		return $solucion;
	}

	public function getOferta($id_oferta)
	{
		$query= "SELECT linea1, linea2, precio, foto FROM ofertas WHERE id_ofertas=:id";
		$getOfer = $this->conexion->prepare($query);
		$getOfer->bindParam(":id", $id_oferta, PDO::PARAM_INT );
		$getOfer->execute();
		return  $getOfer->fetch();
		
	}

	public function updateOferta($id_oferta, $id_categoria, $linea1, $linea2, $precio, $fotoUrl)
		{
			$query2 = "UPDATE ofertas SET"
			." id_categoria=:id_cat, linea1=:l1, linea2=:l2, precio=:precio, foto=:fotoUrl WHERE id_ofertas = :id_oferta";
			$ofertaUpd = $this->conexion->prepare($query2);
			$ofertaUpd->bindParam(":id_oferta", $id_oferta, PDO::PARAM_INT);
			$ofertaUpd->bindParam(":id_cat", $id_categoria, PDO::PARAM_INT);
			$ofertaUpd->bindParam(":l1", $linea1, PDO::PARAM_STR);
			$ofertaUpd->bindParam(":l2", $linea2, PDO::PARAM_STR);
			$ofertaUpd->bindParam(":precio", $precio, PDO::PARAM_STR);
			$ofertaUpd->bindParam(":fotoUrl", $fotoUrl, PDO::PARAM_STR);
			
			$solucion= $ofertaUpd->execute() ;
				return $solucion;
			}
		
	
}