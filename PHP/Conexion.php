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
		public function InsertQuery(string $query, array $marcadores)
		{
			$parametros = func_get_args();

			try {
				if (count($parametros) == 1) {
				
					$cons_prep = $this->conexion->prepare(query);
					$cons_prep->execute();
				} elseif (count($parametros) == 2) {

					$cons_prep = $this->conexion->prepare(query);
					$cons_prep->execute($parametros[1]);
				} else {
				
					throw new ParamsException("Error de paso de parámetros");
							
				}
			} catch (ParamsException $e) {
				
				echo $e->getMessage();
			}
		}

		public function deleteQuery(string $query)
		{
			# code...
		}

		public function updateQuery(string query)
		{

		}

		public function selectQuery(string query)
		{
			# code...
		}
		
		// Variables usadas para establecer conexión y las configuraciones pertinentes
		private DB_SERVER = "localhost";
		private DB_BBDD = "";
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