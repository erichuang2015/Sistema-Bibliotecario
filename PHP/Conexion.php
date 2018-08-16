<?php 

	public class Conexion
	{
		function __construct()
		{
			$conexion = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_BBDD,DB_USER,DB_PASSWORD);
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
	}
 ?>