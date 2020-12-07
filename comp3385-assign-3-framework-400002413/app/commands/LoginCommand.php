<?php
	use Framework\Command;
	use Framework\CommandContext;
	
	class LoginCommand extends Command {
		function __construct() {
			$this->controller = new LoginController();
		}

		public function execute(CommandContext $context):void {
			$this->controller->setCommandContext($context);
			$this->controller->run();
		}
	}

?>