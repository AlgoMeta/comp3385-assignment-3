<?php
    require "../autoloader.php";
    use Framework\Model;
    use PHPUnit\Framework\TestCase;

    class ModelTest extends TestCase{

        public function testModelIsValid(){
            $courseModel = new CourseModel();
            $this->assertInstanceOf('Framework\Model', $courseModel);
        }

        public function testFindAll(){
            echo "After you start your web server to run this test";
            $courseModel = new CourseModel();
            $this->assertEquals(true, is_array($courseModel->findAll()));
        }
    }

?>