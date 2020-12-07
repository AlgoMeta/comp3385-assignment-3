<?php
    require "../autoloader.php";
    use Framework\Command;
    use Framework\CommandContext;
    use PHPUnit\Framework\TestCase;

    class CommandTest extends TestCase{

        public function testCommandIsValid(){
            $aboutCommand = new AboutCommand();
            $this->assertInstanceOf('Framework\Command', $aboutCommand);
        }
        
        public function testExecute(){
            $aboutCommand = new AboutCommand();
            $this->assertEquals(null, $aboutCommand->execute(new CommandContext()));
        }
    }
?>