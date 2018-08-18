<?php 

	public class Conexion
	{
		function __construct()
		{
			try {
				
				$conexion = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_BBDD,DB_USER,DB_PASSWORD,arrayOptions);
				exit();
			} catch (PDOException $e) {
				
				die("Error de conexión " . $e->getMessage() . " en la línea " . $e->getLine());
			}
		}

		//Métodos de consulta que devuelven arrays
		public function InsertQuery(string $tabla, array $valores, array $marcadores = null, array $columnas = null)
		{
			if ($columnas == null) {
				try {

					//Convirtiendo los array a strings para que el query pueda ejecutarse
					$values_imploded = implode("','",$valores);
					$query = "INSERT INTO $tabla VALUES('$values_imploded')";

					$cons_prep = $conexion->prepare($query);
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

						return "Se agregaro un nuevo dato";
					}
				} catch (PDOException $e) {
					
					die("Error " . getMessage() . "en la línea " . $e->getLine());
					exit();
				}
			} else {
				try {

					//Convirtiendo los array a strings para que el query pueda ejecutarse
					$keys_imploded = implode($columnas);
					$values_imploded = implode("','",$valores);

					$query = "INSERT INTO $tabla($keys_imploded) VALUES('$values_imploded')"; //Iniciando consulta

					$cons_prep = $conexion->prepare($query); //Preparando consulta
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
						 
						 return 0;
					} else {

						return 1;
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

					$cons_prep = $conexion->prepare($query);
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

					$cons_prep = $conexion->prepare($query);
					$cons_prep->execute();
					$cons_prep->closeCursor();
				} catch (PDOException $e) {
					
					die("Error " . $e->getMessage() . " en la línea " . $e->getLine());
				}
			} else {

				return "Hubo un error a la hora de ejecutar la consulta. Por favor inténtelo de nuevo";
			}
		}

		public function UpdateQuery(string $tabla, array $set, string $some_column = null, string $some_value = null)
		{
			$columnas_set = preg_split("/[\s,]+/", array_column($set)); //Separando el array $set en string y luego en array con una expresión regular que los separa por comas o espacios en blanco.
			$keys_set = preg_split("/[\s,]+/", array_keys($set)); //Separando el array $set en string y luego en array con una expresión regular que los separa por comas o espacios en blanco.

			if (is_assoc($set) && $some_column != null && $some_value != null) {
				
				for ($i = 0; $i <= count($set); $i++) { 
					
					$query = "UPDATE $tabla SET $columnas_set[$i] = $keys_set[$i] WHERE $some_column = $some_value";
				}
			}
		}

		public function selectQuery(string $query)
		{
			# code...
		}
		
		//Función que comprueba si un array es asociativos
		private function is_assoc(array $array) {

			return array_keys( $array ) !== range( 0, count($array) - 1 );
		}

		// Variables usadas para establecer conexión y las configuraciones pertinentes
		private DB_SERVER = "localhost";
		private DB_BBDD = "prueba";
		private DB_USER = "root";
		private DB_PASSWORD = "";
		private $conexion;
		private $arrayOptions = array(
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_EMULATE_PREPARES=>FALSE,
			PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'",
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ
		);
	}
 ?>