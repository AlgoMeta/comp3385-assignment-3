<?php
    require "../autoloader.php";
    use Framework\State;
    use PHPUnit\Framework\TestCase;

    class StateTest extends TestCase{

        public function testStateIsValid(){
            $state = new State();
            $this->assertInstanceOf('Framework\State', $state);
        }
        
        public function testSetData(){
            $state = new State();
            $state->setData("name", "John Doe");
            $this->assertEquals(true, is_array($state->getData()));
        }
    }
?>