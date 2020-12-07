<?php
    require "../autoloader.php";
    use Framework\ResponseHandler;
    use Framework\ResponseHeader;
    use Framework\State;
    use Framework\Logger;
    use PHPUnit\Framework\TestCase;

    class ResponseHandlerTest extends TestCase{

        public function testResponseHandlerIsValid(){
            $responseHandler = new ResponseHandler(new ResponseHeader(), new State(), new Logger());
            $this->assertInstanceOf('Framework\ResponseHandler', $responseHandler);
        }

        public function testGetInstance(){
            $this->assertInstanceOf('Framework\ResponseHandler', ResponseHandler::getInstance());
        }
    }

?>