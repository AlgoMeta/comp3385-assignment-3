<?php
    namespace Framework;

    class Registry {
        private static $instance = null;
        private $sessionManager = null;
        private $validator = null;
        private $dbconfig = null;
        
        public static function getInstance(): Registry {
            if(!self::$instance) {
                self::$instance = new Registry();
            }
            return self::$instance;
        }

        public function getSessionManager(): SessionManager {
            if (is_null($this->sessionManager)) {
                $this->sessionManager = new SessionManager();
            }
            return $this->sessionManager;
        }

        public function getValidator(): Validator {
            if (is_null($this->validator)) {
                $this->validator = new Validator();
            }
            return $this->validator;
        }

        public function getDBConfig(): array {
            if (is_null($this->dbconfig)) {
                $config = parse_ini_file("../../comp3385-assign-3-framework-400002413/config/mooc-config.ini");
                $servername = $config["servername"];
                $username = $config["username"];
                $password = $config["password"];
                $dbname = $config["dbname"];
                $this->dbconfig = array("servername"=>$servername, "username"=>$username, "password"=>$password, "dbname"=>$dbname);
            }
            return $this->dbconfig;
        }
    }
?>