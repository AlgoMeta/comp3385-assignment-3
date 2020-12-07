<?php
    namespace Framework;
    
    class Validator{

        private static $instance = null;
        
        public function nameIsValid($name): bool {
            if ($name != null && $name != "") {
                return true;
            }
            return false;
        }

        public function emailIsValid($email):bool{
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
            return false;
        }

        public function passwordsMatch($password, $repassword):bool{
            if ($password == $repassword) {
                return true;
            }
            return false;
        }

        public function passwordIsValid($password):bool{
            if (strlen($password) < 10) {
                return false;
            } else if(!preg_match('/[A-Z]/', $password)){
                return false;
            } else if(!preg_match('/\d/',$password)){
                return false;
            }
            return true;
        }

        public static function getInstance():Validator {
            if(!self::$instance) {
                self::$instance = new Validator();
            }

            return self::$instance;
        }
    }
    
?>