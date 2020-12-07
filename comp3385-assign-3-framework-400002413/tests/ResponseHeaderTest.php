<?php
    require "../autoloader.php";
    use Framework\ResponseHeader;
    use PHPUnit\Framework\TestCase;

    class ResponseHeaderTest extends TestCase{

        public function testResponseHeaderIsValid(){
            $responseHeader = new ResponseHeader();
            $this->assertInstanceOf('Framework\ResponseHeader', $responseHeader);
        }
        
        public function testSetData(){
            $responseHeader = new ResponseHeader();
            $responseHeader->setData("name", "John Doe");
            $this->assertEquals(true, is_array($responseHeader->getData()));
        }
    }
?>