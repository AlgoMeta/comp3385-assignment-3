<?php
	use Framework\Command;
	use Framework\CommandContext;
	
	class ProfileCommand extends Command {
		function __construct() {
			$this->controller = new ProfileController();
		}

		public function execute(CommandContext $context):void {
			$this->controller->setCommandContext($context);
			$this->controller->run();
		}
	}

?>