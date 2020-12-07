<?php
    
    namespace Framework;
    
    abstract class Controller{
        protected $model;
        protected $view;
        protected $commandContext;
        protected $validator;
        protected $responseHandler;
        protected $sessionManager;
        
        function __construct(){
            $this->model = null;
            $this->view = null;
            $this->commandContext = null;
            $this->validator = Validator::getInstance();
            $this->responseHandler = ResponseHandler::getInstance();
            $this->sessionManager = SessionManager::getInstance();
        }

        public function setModel(Model $m):void{
            $this->model = $m;
        }

        public function setView(View $v):void{
            $this->view = $v;
        }

        public function getModel():Model{
            return $this->model;
        }

        public function getView():View{
            return $this->view;
        }

        public function setCommandContext(CommandContext $context) {
            $this->commandContext = $context;
        }

        public function getResponseHandler() {
            return $this->responseHandler;
        }

        public function getSessionManager() {
            return $this->sessionManager;
        }

        public function getValidator() {
            return $this->validator;
        }

        public abstract function run():void;
    }
?>