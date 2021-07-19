<?php
    require_once "../core/conexionConfig.php";
	class AsociadoModel extends conexionConfig{

		private $conn;
		public function __construct(){
			try{
				$this->conn=conexionConfig::connect();
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}

        public function create($data){
			$result = false;
			$nombre = $data['nombre'];
			$apellido = $data['apellido'];
            $fecha_nac = $data['fecha_nac'];
            $telefono = $data['telefono'];
            $dui = $data['dui'];
            $estado = "A";

			
			try{
				$sql = "INSERT INTO `asociado`(`nombres`, `apellidos`, `fecha_nac`, `telefono`, `dui`, `estado`) VALUES ('$nombre','$apellido','$fecha_nac','$telefono','$dui','$estado')";
				$stm = $this->conn->prepare($sql);
				$stm->execute();
				if($stm->rowCount()){
					echo "Se ha creado el nuevo registro!";
					$result = true;
					
				}else{
					
					echo "No ha creado el nuevo registro!";
                }
			}catch(PDOException $e){
				die($e->getMessage());
			}
			return $result;
		}

		public function getAll(){

			try{
				$sql = "SELECT * FROM asociado ORDER BY id;";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				while($result=$stmt->fetch())
				{
					$rows[]=$result;
				}
				
				return $rows;
				
			}catch(PDOException $e){
				die($e->getMessage());
			}
			

		}





    }


?>