<?php 

	namespace Framework;
	use \PDO;
	
	class MOOCConnection extends DatabaseConnection {
		
		function __construct() {
			$this->config = Registry::getInstance()->getDBConfig();
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