<?php 

	use Framework\DatabaseConnection;
	
	class MOOCConnection extends DatabaseConnection {
		
		function __construct() {
			$this->config = parse_ini_file("../../comp3385-assign-2-framework-400002413/config/mooc-config.ini");
			$this->servername = $this->config["servername"];
			$this->username = $this->config["username"];
			$this->password = $this->config["password"];
		 	$this->dbname = $this->config["dbname"];
		}

		public function createConnection() {
			return new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
		}
	}

?>