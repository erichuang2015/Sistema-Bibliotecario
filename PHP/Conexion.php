<?php 

	public class Conexion
	{
		function __construct()
		{
			$conexion = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_BBDD,DB_USER,DB_PASSWORD,arrayOptions);
		}

		public function insertQuery()
		{


		}

		public function deleteQuery()
		{
			# code...
		}

		public function updateQuery()
		{

		}

		public function selectQuery()
		{
			# code...
		}
	
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