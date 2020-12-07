<?php
	namespace Framework;

	class FrontController {
		private $requestHandler;

		function __construct() {
			$this->requestHandler = new RequestHandler();
		}

		public function getRequestHandler():RequestHandler {
			return $this->requestHandler;
		}
	}

?>