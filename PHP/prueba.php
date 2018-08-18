<?php 

	class Prueba
	{

		$DB_SERVER = "localhost";
		$DB_BBDD = "prueba";
		$DB_USER = "root";
		$DB_PASSWORD = "";
		$conexion;
		$arrayOptions = array(
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_EMULATE_PREPARES=>FALSE,
			PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'",
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ
		);

		function __construct()
		{
			try {
				
				$conexion = new PDO('mysql:host=' . $DB_SERVER . ';dbname=' . $DB_BBDD, $DB_USER, $DB_PASSWORD, $arrayOptions);
				exit();
			} catch (PDOException $e) {
				
				die("Error de conexión " . $e->getMessage() . " en la línea " . $e->getLine());
			}
		}

		public function UpdateQuery(string $tabla, array $set, string $some_column = null, string $some_value = null)
		{
			$columnas_set = array_column($set); //Separando el array asociativo
			$keys_set = array_keys($set); //Separando el array asociativo

			if (is_assoc($set) && $some_column != null && $some_value != null) {
				
				for ($i = 0; $i <= count($keys_set); $i++) { 
					
					$query = "UPDATE $tabla SET $keys_set[$i] = $columnas_set[$i] WHERE $some_column = $some_value";
					$cons_prep = $conexion->prepare($query);
					$cons_prep->execute();
				}
				$conexion->closeCursor();
			} else {

				return "Hay un error en los parámetros. Asegúrese que ha ingreso los DATOS CORRECTOS en los parámetros";
			}

			return "Correcto";
		}
	}

	$prueba = new Prueba();


	$set = array(
		"Campo1" => "campo1",
		"Campo2" => "campo2"
	);

	$prueba->UpdateQuery("tabla1",$set,"Campo1","canpo1");

 ?>