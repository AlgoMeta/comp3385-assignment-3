<?php

	namespace Framework;
	
	abstract class DatabaseConnection {
		protected $servername;
		protected $username;
		protected $password;
		protected $dbname;
		protected $config;

		abstract public function createConnection();
	}

?>