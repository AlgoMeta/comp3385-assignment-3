<?php
	use Framework\Command;
	use Framework\CommandContext;
	
	class CoursesCommand extends Command {
		function __construct() {
			$this->controller = new CoursesController();
		}

		public function execute(CommandContext $context):void {
			$this->controller->setCommandContext($context);
			$this->controller->run();
		}
	}

?>