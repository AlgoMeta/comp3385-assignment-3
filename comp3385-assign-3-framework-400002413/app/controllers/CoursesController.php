<?php
    use Framework\Controller;
    use Framework\View;
    
    class CoursesController extends Controller{
        public function run():void{
            // $this->setModel(new CourseModel());
            $this->setMapper(new CourseMapper());
            $this->setView(new View());
            $this->getSessionManager()->create();

            if (isset($_SESSION["user"])) {
                if($this->getSessionManager()->accessible($_SESSION["user"], "courses")) {
                    // $this->getModel()->makeConnection();
                    $this->getView()->setTemplate("../../comp3385-assign-3-framework-400002413/tpl/courses.tpl.php");
                    $this->getView()->addVar("courses", $this->getMapper()->findCourses());
                    $this->getView()->display();
                    $this->getResponseHandler()->getHeader()->setData("Success");
                    $this->getResponseHandler()->getState()->setData("Success");
                    $this->getResponseHandler()->getLogResponse()->setData("Courses successfully visited");
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                } else {
                    $this->getResponseHandler()->getHeader()->setData("Error");
                    $this->getResponseHandler()->getState()->setData("Error");
                    $this->getResponseHandler()->getLogResponse()->setData("Courses unsuccessfully visited");
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                    header("Location: index.php?controller=Login");
                }
            } else {
                $this->getResponseHandler()->getHeader()->setData("Error");
                $this->getResponseHandler()->getState()->setData("Error");
                $this->getResponseHandler()->getLogResponse()->setData("Courses unsuccessfully visited");
                $this->getSessionManager()->create();
                $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                header("Location: index.php?controller=Login");
            }
        }
    }
?>