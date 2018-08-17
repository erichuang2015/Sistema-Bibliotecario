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
		public function InsertQuery(string $tabla, array $columnas = null, array $valores, array $marcadores = null)
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
					if ($columnasAfectadas <= 0) {
						 
						 return 0;
					} else {

						return 1;
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

		public function deleteQuery(string $query)
		{

		}

		public function updateQuery(string $query)
		{

		}

		public function selectQuery(string $query)
		{
			# code...
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