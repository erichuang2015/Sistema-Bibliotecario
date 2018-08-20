<?php 

	class Prueba
	{
		function __construct()
		{
			try {
				
				$this->conexion = new PDO('mysql:host=' . $this->DB_SERVER . ';dbname=' . $this->DB_BBDD, $this->DB_USER, $this->DB_PASSWORD, $this->arrayOptions);
			} catch (PDOException $e) {
				
				die("Error de conexión " . $e->getMessage() . " en la línea " . $e->getLine());
				exit();
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

		//Función que comprueba si un array es asociativos
		private function is_assoc(array $array) {

			return array_keys( $array ) !== range( 0, count($array) - 1 );
		}

		private $DB_SERVER = "localhost";
		private $DB_BBDD = "prueba";
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

	echo "Iniciando prueba... <br>";
	$prueba = new Prueba();
	echo "objeto instanciado... <br>";

	$insertar = $prueba->InsertQuery("tabla1",["Prueba de un solo valor","Otro valor"]);

	$consulta = $prueba->UpdateQuery("tabla1",["Campo1" => "'1'", "Campo2" => "'2'"], "Campo1","'Prueba1'");
	echo "$consulta";

 ?>