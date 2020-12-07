<?php
	namespace Framework;
	
	class RequestHandler {

		private $routes;

		function __construct() {
			$this->routes = array();
		}

		public function route(string $action, string $command):void {
			$action = trim($action, "/");
			if ($action == null) {
				$action = "home";
			}
			$this->routes[$action] = array("command" => $command);
		}

		public function dispatch(string $action):void {
			$action = trim($action, "/");
			if ($action == "comp3385-assign-2-public-400002413") {
				$action = "home";
			}
			$command = $this->routes[$action]["command"];
			$commandClass = new $command();
			$commandClass->execute(new CommandContext());
		}

		public function getRoutes():array {
			return $this->routes;
		}
	}
?>