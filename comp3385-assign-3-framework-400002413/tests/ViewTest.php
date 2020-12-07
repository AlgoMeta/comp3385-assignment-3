<?php
    require "../autoloader.php";

    use Framework\View;
    use PHPUnit\Framework\TestCase;

    class ViewTest extends TestCase{

        public function testViewIsValid(){
            $tmpView = new View();
            $this->assertInstanceOf('Framework\View', $tmpView);
        }

        public function testSetTemplate(){
            $tmpView = new View();
            $fileName = "test.tpl.php";
            $tmpView->setTemplate($fileName);
            $this->assertEquals($tmpView->getTpl(), $fileName);
        }
    }
?>