<?php
	use Framework\Command;
	use Framework\CommandContext;
	use Framework\SessionManager;
	
	class LogoutCommand extends Command {
		function __construct() {
			$this->controller = null;
		}

		public function execute(CommandContext $context):void {
            SessionManager::create();
            SessionManager::remove("user");
            SessionManager::destroy();
            header("Location: index.php");
		}
	}

?>