<?php
    namespace Framework;
    
    class CommandContext {
        private $params = [];
        private $error = "";

        public function __construct() {
            $this->params = $_REQUEST;
        }

        public function addParam(string $key, $val) {
            $this->params[$key] = $val;
        }

        public function get(string $key) {
            if (isset($this->params[$key])) {
                return $this->params[$key];
            }
            return null;
        }

        public function setError($error): string {
            $this->error = $error;
        }

        public function getError(): string{
            return $this->error;
        }
    }
?>