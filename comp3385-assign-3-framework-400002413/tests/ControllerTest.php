<?php
    require "../autoloader.php";
    use Framework\Controller;
    use Framework\Model;
    use PHPUnit\Framework\TestCase;

    class ControllerTest extends TestCase{

        public function testControllerIsValid(){
            $indexController = new IndexController();
            $this->assertInstanceOf('Framework\Controller', $indexController);
        }
        
        public function testSetModel(){
            $courseModel = new CourseModel();
            $indexController = new IndexController();
            $indexController->setModel($courseModel);
            $this->assertEquals($courseModel, $indexController->getModel());
        }
    }
?>