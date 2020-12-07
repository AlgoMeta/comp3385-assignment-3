<?php
	
	use Framework\Command;
	use Framework\CommandContext;
	
	class AboutCommand extends Command {
		function __construct() {
			$this->controller = null;
		}

		public function execute(CommandContext $context):void {
			echo "No about page given. <a href='index.php'>Click Here</a>";
		}
	}
?>