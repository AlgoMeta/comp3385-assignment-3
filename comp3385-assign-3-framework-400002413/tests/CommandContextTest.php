<?php
    require "../autoloader.php";
    use Framework\CommandContext;
    use PHPUnit\Framework\TestCase;

    class CommandContextTest extends TestCase{

        public function testCommandContextIsValid(){
            $commandContext = new CommandContext();
            $this->assertInstanceOf('Framework\CommandContext', $commandContext);
        }
        
        public function testAddParam(){
            $commandContext = new CommandContext();
            $commandContext->addParam("name", "John Doe");
            $this->assertEquals("John Doe", $commandContext->get("name"));
        }
    }
?>