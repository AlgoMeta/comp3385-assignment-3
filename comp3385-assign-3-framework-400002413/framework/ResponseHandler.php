<?php

	namespace Framework;
	
	class ResponseHandler {
		private $responseHeader;
		private $state;
		private $logger;
		private static $instance = null;

		function __construct(ResponseHeader $header, State $state, Logger $logger) {
			$this->responseHeader = $header;
			$this->state = $state;
			$this->logger = $logger;
		}

		public function getHeader():ResponseHeader {
			return clone $this->responseHeader;
		}

		public function getState():State {
			return clone $this->state;
		}

		public function getLogResponse(): Logger{
			return clone $this->logger;
		}

		public static function getInstance():ResponseHandler {
            if(!self::$instance) {
                self::$instance = new ResponseHandler(new ResponseHeader(), new State(), new Logger());
            }

            return self::$instance;
        }
	}

?>