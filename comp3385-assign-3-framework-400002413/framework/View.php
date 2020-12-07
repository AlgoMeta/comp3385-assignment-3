<?php

    namespace Framework;

    class View {
        private $tpl;
        private $vars;

        public function __contruct(){
            $this->tpl = "";
            $this->vars = array();
        }

        public function setTemplate($filename):void{
            $this->tpl = $filename;
        }

        public function display():void{
            if($this->vars != array()) {
                extract($this->vars);
            }
            require $this->tpl;
        }

        public function addVar($name, $value):void{
            $this->vars[$name] = $value;
        }

        public function getTpl():string{
            return $this->tpl;
        }

        public function getVars():array{
            return $this->vars;
        }
    }
?>