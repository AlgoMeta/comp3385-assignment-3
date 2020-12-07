<?php
	use Framework\Command;
	use Framework\CommandContext;
	
	class IndexCommand extends Command {
		function __construct() {
			$this->controller = new IndexController();
		}

		public function execute(CommandContext $context):void {
			$this->controller->setCommandContext($context);
			$this->controller->run();
		}
	}

?>