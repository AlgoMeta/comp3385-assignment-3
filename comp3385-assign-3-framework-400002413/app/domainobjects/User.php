<?php
    use Framework\DomainObject;

    class User implements DomainObject {
        private $name;
        private $email;
        private $password;

        function __construct($nm, $em, $pass) {
            $this->name = $nm;
            $this->email = $em;
            $this->password = $pass;
        }

        public function getName() {
            return $this->name;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPass() {
            return $this->password;
        }
    }

?>