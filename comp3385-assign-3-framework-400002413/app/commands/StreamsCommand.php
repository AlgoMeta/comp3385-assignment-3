<?php
	use Framework\Command;
	use Framework\CommandContext;
	
	class StreamsCommand extends Command {
		function __construct() {
			$this->controller = new StreamsController();
		}

		public function execute(CommandContext $context):void {
			$this->controller->setCommandContext($context);
			$this->controller->run();
		}
	}

?>