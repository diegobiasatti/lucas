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
		if ( $producto->execute() ) {
			return true;
		}
		else {return  false;}
	}

	public function getOferta($id_oferta)
	{
		$query= "SELECT linea1, linea2, precio, foto FROM ofertas WHERE id_ofertas=:id";
		$consulta = $this->conexion->prepare($query);
		$consulta->bindParam(":id", $id_oferta, PDO::PARAM_INT );
		$consulta->execute();
		return  $consulta->fetch();
		
	}

	/*public function productoUpdate($id_usuarios)
		{
			$id2 = 1000;
			$nombre2 = "Producto PDO";
			$query2 = "UPDATE productos SET nombre = :nombre WHERE id_producto = :id";
			$producto = $cnxPDO->prepare($query2);
			$producto->bindParam(":id", $id2, PDO::PARAM_INT);
			$producto->bindParam(":nombre", $nombre2, PDO::PARAM_STR);
			if ( $producto->execute() ) {
				echo "PDO: Actualizado ok<br>";
			}
		}
	*/




}