<?php
    require "../autoloader.php";
    use Framework\Logger;
    use PHPUnit\Framework\TestCase;

    class LoggerTest extends TestCase{

        public function testLoggerIsValid(){
            $logger = new Logger();
            $this->assertInstanceOf('Framework\Logger', $logger);
        }
        
        public function testSetData(){
            $logger = new Logger();
            $logger->setData("name", "John Doe");
            $this->assertEquals(true, is_array($logger->getData()));
        }
    }
?>