<?php
    require "../autoloader.php";
    use Framework\RequestHandler;
    use PHPUnit\Framework\TestCase;

    class RequestHandlerTest extends TestCase{

        public function testRequestHandlerIsValid(){
            $requestHandler = new RequestHandler();
            $this->assertInstanceOf('Framework\RequestHandler', $requestHandler);
        }

        public function testFindAll(){
            $requestHandler = new RequestHandler();
            $this->assertEquals(true, is_array($requestHandler->getRoutes()));
        }
    }

?>