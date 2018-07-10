<?php 
require_once 'conexion.php';

class usuarioController{
	
	private  $conexion;

	public function __construct()
	{
		$this->conexion = Conexion::conectar();
	}

	public function datosUsuario($id_usuario)
	{
		$query = "SELECT * FROM ofertas WHERE id_usuario = :dato"; //pseudo variable
		$consulta = $this->conexion->prepare($query); // informo cual es la query
		$consulta->bindParam(":dato", $id_usuario, PDO::PARAM_INT);
		$consulta->execute();

		$response = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $response;
	}

	

	public function userLogin($nombre_usuario,$password)
	{
	try{
		//$db = getDB();
		$hash_password= hash('sha256', $password); //Password encryption 
		$query = "SELECT id_usuarios FROM usuarios WHERE (username=:nombre_usuario or email=:nombre_usuario) AND password=:hash_password"; 
		$stmt = $this->conexion->prepare($query);
		$stmt->bindParam("nombre_usuario", $nombre_usuario,PDO::PARAM_STR) ;
		$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
		$stmt->execute();
		$count=$stmt->rowCount();
		$data=$stmt->fetch(PDO::FETCH_OBJ);
		//$db = null;
		if($count)
		{
			$_SESSION['id_usuarios']=$data->id_usuarios; // Storing user session value
/*echo "es" .$_SESSION['id_usuarios'];
die();*/
			return true;
		}
		else
		{
			return false;
		} 
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}

	}



	/* User Registration */
	public function userRegistration($nombre_usuario,$password,$email,$username)
	{
		try{
			//$db = getDB();
			$query  = "SELECT id_usuarios FROM usuarios WHERE nombre_usuario=:nombre_usuario OR email=:email";
			$st = $this->conexion->prepare($query); 
			$st->bindParam("nombre_usuario", $nombre_usuario,PDO::PARAM_STR);
			$st->bindParam("email", $email,PDO::PARAM_STR);
			$st->execute();
			$count=$st->rowCount();
			if($count<1)
			{
				$query2 = "INSERT INTO usuarios(nombre_usuario,password,email,username) VALUES (:nombre_usuario,:hash_password,:email,:username)";
				$stmt = $this->conexion->prepare($query2);
				$stmt->bindParam("nombre_usuario", $nombre_usuario,PDO::PARAM_STR) ;
				$hash_password= hash('sha256', $password); //Password encryption
				$stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
				$stmt->bindParam("email", $email,PDO::PARAM_STR) ;
				$stmt->bindParam("username", $username,PDO::PARAM_STR) ;
				$stmt->execute();
				$id_usuarios=$this->conexion->lastInsertId(); // Last inserted row id
				//$db = null;
				$_SESSION['id_usuarios']=$id_usuarios;
				return true;
			}
			else
			{
				//$db = null;
				return false;
			}

		} 
		catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
		}
	}


	/* User Details */
	public function userDetails($id_usuarios)
	{
		try{
			//$db = getDB();
			$query = "SELECT id_ofertas, email, username, nombre_usuario, linea1 , linea2, precio, foto
			FROM usuarios 
			INNER JOIN ofertas 
			ON usuarios.id_usuarios= ofertas.id_usuario
			WHERE usuarios.id_usuarios =:ID";
			//"SELECT email,username,nombre_usuario FROM usuarios WHERE id_usuarios=:id_usuarios";
			$stmt = $this->conexion->prepare($query); 
			$stmt->bindParam("ID", $id_usuarios,PDO::PARAM_INT);
			$stmt->execute();
			//$data = $stmt->fetch(PDO::FETCH_OBJ); //User data
			$data = $stmt->fetchAll(); //User data
			return $data;
		}
		catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}';
		}
	}
	
	

}