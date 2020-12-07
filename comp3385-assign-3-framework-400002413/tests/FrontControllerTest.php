<?php
    require "../autoloader.php";
    use Framework\FrontController;
    use Framework\RequestHandler;
    use PHPUnit\Framework\TestCase;

    class FrontControllerTest extends TestCase{

        public function testFrontControllerIsValid(){
            $frontController = new FrontController();
            $this->assertInstanceOf('Framework\FrontController', $frontController);
        }
        
        public function testCreateConnection(){
            $frontController = new FrontController();
            $this->assertInstanceOf('Framework\RequestHandler', $frontController->getRequestHandler());
        }
    }
?>