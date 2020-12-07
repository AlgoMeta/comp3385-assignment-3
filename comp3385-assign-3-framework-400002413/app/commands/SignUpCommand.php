<?php
	use Framework\Command;
	use Framework\CommandContext;

	class SignUpCommand extends Command {
		function __construct() {
			$this->controller = new SignUpController();
		}

		public function execute(CommandContext $context):void {
			$this->controller->setCommandContext($context);
			$this->controller->run();
		}
	}

?>