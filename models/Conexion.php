<?php 

	class Conexion
	{
		function __construct()
		{
			try {
				
				$this->conexion = new PDO('mysql:host=' . $this->DB_SERVER . ';dbname=' . $this->DB_BBDD,$this->DB_USER, $this->DB_PASSWORD, $this->arrayOptions);
			} catch (PDOException $e) {
				
				die("Error de conexión " . $e->getMessage() . " en la línea " . $e->getLine());
			}
		}

		//Métodos de consulta que devuelven arrays
		public function InsertQuery(string $tabla, array $valores, array $columnas = null, array $marcadores = null)
		{
			if ($columnas == null) {
				try {

					//Convirtiendo los array a strings para que el query pueda ejecutarse
					$values_imploded = implode("','",$valores);
					if ($marcadores == null) {
						
						$query = "INSERT INTO $tabla VALUES('$values_imploded')";
					} else {

						$query = "INSERT INTO $tabla VALUES($values_imploded)";
					}

					$this->execQuery($query, $marcadores);
				} catch (PDOException $e) {
					
					die("Error " . $e->getMessage() . "en la línea " . $e->getLine());
				} 
			} else {
				try {

					//Convirtiendo los array a strings para que el query pueda ejecutarse
					$keys_imploded = implode($columnas);
					$values_imploded = implode("','",$valores);

					if ($marcadores == null) {
						
						$query = "INSERT INTO $tabla($keys_imploded) VALUES('$values_imploded')"; //Iniciando consula
					} else {

						$query = "INSERT INTO $tabla($keys_imploded) VALUES($values_imploded)"; //Iniciando consula
					}

					echo $query;
					$this->execQuery($query, $marcadores);
				} catch (PDOException $e) {
					
					die("Error " . getMessage() . "en la línea " . $e->getLine());
				}
			}
		}

		public function DeleteQuery(string $tabla, string $campoEvaluar = null, string $condicional = null)
		{
			$query;

			if ($campoEvaluar == null && $condicional == null) {
				
				$query = "DELETE FROM $tabla"; //Consulta de eliminación
			} elseif ($campoEvaluar != null && $condicional != null) {
				
				$query = "DELETE FROM $tabla WHERE $campoEvaluar LIKE '$condicional'"; //Consulta de eliminación
			} else {

				return "Hubo un error a la hora de ejecutar la consulta. Por favor inténtelo de nuevo";
			}

			$this->execQuery($query);
		}

		public function UpdateQuery(string $tabla, array $set, string $some_column = null, string $some_value = null)
		{
			$keys_set = array_keys($set); //Separando el array asociativo

			if ($this->is_assoc($set) && $some_column != null && $some_value != null) {

				$query = "UPDATE $tabla SET ";

				for ($i = 0; $i < count($keys_set) ; $i++) { 
					
					$valorPorVuelta = $keys_set[$i];
					if ($i != count($keys_set)-1) {

						$query .= "$valorPorVuelta = '$set[$valorPorVuelta]', ";
					}else {

						$query .= "$valorPorVuelta = '$set[$valorPorVuelta]' ";
					}
				}

				$query .= "WHERE $some_column = '$some_value'";
				$this->execQuery($query);
			} else {

				return "Hay un error en los parámetros. Asegúrese que ha ingreso los DATOS CORRECTOS en los parámetros";
			}

			return "Correcto";	
		}

		public function SelectQuery(array $columnsSelect = null, string $tabla, string $someColumn = null, string $someValue = null)
		{
			if ($columnsSelect == null) {
				
				if ($someColumn == null || $someValue == null) {
					
					$query = "SELECT * FROM $tabla";
				} else {

					$query = "SELECT * FROM $tabla WHERE $someColumn LIKE '$someValue'";
				}
			} else {

				if ($someColumn == null || $someValue == null) {
					
					$arrays_imploded = implode(",", $columnsSelect);
					$query = "SELECT $arrays_imploded FROM $tabla";
				} else {

					$query = "SELECT * FROM $tabla WHERE $someColumn LIKE '$someValue'";
				}
			}

			return $this->execQuery($query);

			$query;
		}
		
		//Función que comprueba si un array es asociativos
		private function is_assoc(array $array)
		{

			return array_keys( $array ) !== range( 0, count($array) - 1 );
		}

		//Función que ejecuta una consulta
		public function execQuery(string $query, array $marcadores = null)
		{
			try {
				
				$cons_prep = $this->conexion->prepare($query);
				if ($marcadores == null) {
					
					$cons_prep->execute();
				} else {

					$cons_prep->execute($marcadores);
				}

				$filasAfectadas = $cons_prep->rowCount();
				if ($filasAfectadas == 0) {
					
					return "No se ha afectado ninguna fila";
				} else {

					return $cons_prep->fetchAll();
				}
				$cons_prep->closeCursor();
			} catch (PDOException $e) {
			
				die("Error " . $e->getMessage() . " en la línea " . $e->getLine());	
			}
		}

		// Variables usadas para establecer conexión y las configuraciones pertinentes
		private $DB_SERVER = "localhost";
		private $DB_BBDD = "";
		private $DB_USER = "root";
		private $DB_PASSWORD = "";
		private $conexion;
		private $arrayOptions = array(
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_EMULATE_PREPARES=>FALSE,
			PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'",
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
		);
	}
 ?>