<?php 

	class Conexion
	{
		function __construct()
		{
			try {
				
				$this->conexion = new PDO('mysql:host=' . $this->DB_SERVER . ';dbname=' . $this->DB_BBDD,$this->DB_USER, $this->DB_PASSWORD, $this->arrayOptions);
				exit();
			} catch (PDOException $e) {
				
				die("Error de conexión " . $e->getMessage() . " en la línea " . $e->getLine());
			}
		}

		//Métodos de consulta que devuelven arrays
		public function InsertQuery(string $tabla, array $valores, array $columnas = null, array $marcadores = null) : string
		{
			if ($columnas == null) {
				try {

					//Convirtiendo los array a strings para que el query pueda ejecutarse
					$values_imploded = implode("','",$valores);
					$query = "INSERT INTO $tabla VALUES('$values_imploded')";

					$cons_prep = $this->conexion->prepare($query);
					if ($marcadores == null) {
						
						$cons_prep->execute();
						$cons_prep->closeCursor();
					} else {

						$cons_prep->execute(htmlentities($marcadores,ENT_HTML5,"UTF-8"));
						$cons_prep->closeCursor();
					}

					//Comprobando si se han afectado columnas
					$columnasAfectadas = $cons_prep->rowCount();
					if ($columnasAfectadas == 0) {
						 
						 return "No se agregó ningún dato. Revisar bien la petición(query)";
					} else {

						return "Se ha agregado un nuevo dato";
					}
				} catch (PDOException $e) {
					
					die("Error " . $e->getMessage() . "en la línea " . $e->getLine());
					exit();
				} 
			} else {
				try {

					//Convirtiendo los array a strings para que el query pueda ejecutarse
					$keys_imploded = implode($columnas);
					$values_imploded = implode("','",$valores);

					$query = "INSERT INTO $tabla($keys_imploded) VALUES('$values_imploded')"; //Iniciando consulta

					$cons_prep = $this->conexion->prepare($query); //Preparando consulta
					if ($marcadores == null) { //Executando consulta con caracteres escapados para evitar la inyección sql
						
						$cons_prep->execute();
						$cons_prep->closeCursor();
					} else {

						$cons_prep->execute(htmlentities($marcadores,ENT_HTML5,"UTF-8"));
						$cons_prep->closeCursor();
					}

					//Comprobando si se han afectado columnas
					$columnasAfectadas = $cons_prep->rowCount();
					if ($columnasAfectadas <= 0) {
						 
						 return "";
					} else {

						return "";
					}
				} catch (PDOException $e) {
					
					die("Error " . getMessage() . "en la línea " . $e->getLine());
				}
			}
		}

		public function DeleteQuery(string $tabla, string $campoEvaluar = null, string $condicional = null)
		{
			if ($campoEvaluar == null && $condicional == null) {
				
				try {
					
					$query = "DELETE FROM $tabla"; //Consulta de eliminación

					$cons_prep = $this->conexion->prepare($query);
					$cons_prep->execute();
					$cons_prep->closeCursor();

					$columnasAfectadas = $cons_prep->rowCount();
					if ($columnasAfectadas == 0) {
						
						return "No se eliminó ningún dato";
					} else {

						return "Se han eliminado $columnasAfectadas datos";
					}
				} catch (PDOException $e) {
					
					die("Error " . $e->getMessage() . " en la línea " . $e->getLine());
				}
			} elseif ($campoEvaluar != null && $condicional != null) {
				
				try {
					
					$query = "DELETE FROM $tabla WHERE $campoEvaluar LIKE $condicional"; //Consulta de eliminación

					$cons_prep = $this->conexion->prepare($query);
					$cons_prep->execute();
					$cons_prep->closeCursor();
				} catch (PDOException $e) {
					
					die("Error " . $e->getMessage() . " en la línea " . $e->getLine());
				}
			} else {

				return "Hubo un error a la hora de ejecutar la consulta. Por favor inténtelo de nuevo";
			}
		}

		public function UpdateQuery(string $tabla, array $set, string $some_column = null, string $some_value = null) : string
		{
			try {
				$keys_set = array_keys($set); //Separando el array asociativo

				if ($this->is_assoc($set) && $some_column != null && $some_value != null) {

					$query = "UPDATE $tabla SET ";

					for ($i = 0; $i < count($keys_set) ; $i++) { 
					
						$valorPorVuelta = $keys_set[$i];
						if ($i != count($keys_set)-1) {

							$query .= "$valorPorVuelta = $set[$valorPorVuelta], ";
						}else {

							$query .= "$valorPorVuelta = $set[$valorPorVuelta] ";
						}
					}

					$query .= "WHERE $some_column = $some_value";
					$cons_prep = $this->conexion->prepare($query);
					$cons_prep->execute();

				} else {

					return "Hay un error en los parámetros. Asegúrese que ha ingreso los DATOS CORRECTOS en los parámetros";
				}

				return "Correcto";

			} catch (PDOException $e) {

				 die("Error de conexión " . $e->getMessage() . " en la línea " . $e->getLine());
			}
		}

		public function SelectQuery(array $columnsSelect = null, string $tabla, string $someColumn, string $someValue)
		{
			if ($columnsSelect == null) {
				
				$sql = "SELECT * FROM $tabla WHERE $someColumn = $someValue";
			}
		}
		
		//Función que comprueba si un array es asociativos
		private function is_assoc(array $array) {

			return array_keys( $array ) !== range( 0, count($array) - 1 );
		}

		// Variables usadas para establecer conexión y las configuraciones pertinentes
		private $DB_SERVER = "localhost";
		private $DB_BBDD = "prueba";
		private $DB_USER = "root";
		private $DB_PASSWORD = "";
		private $conexion;
		private $arrayOptions = array(
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_EMULATE_PREPARES=>FALSE,
			PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'",
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ
		);
	}
 ?>