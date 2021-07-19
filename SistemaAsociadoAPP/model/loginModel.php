<?php
	require_once "../core/conexionConfig.php";
	class LoginModel extends conexionConfig{

		private $conn;
		public function __construct(){
			try{
				$this->conn=conexionConfig::connect();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}

		public function getSession($data){
			$result = false;
			$user = $data['user'];
			$pass = $data['passwd'];
			
			try{
				$sql = "SELECT * FROM usuarios WHERE usuario = '$user' AND password = '$pass' ";
				$stm = $this->conn->prepare($sql);
				$stm->execute();
				if($stm->fetchColumn()>0){
					$result = true;
				}
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $result;
		}

		public function closeSesion($data){
		if($data['user']|=""){
			session_unset();
			session_destroy();
			$respuesta = "true";
		}else{
			$respuesta = "false";
		}
		return $respuesta;
		}
	}
	
?>