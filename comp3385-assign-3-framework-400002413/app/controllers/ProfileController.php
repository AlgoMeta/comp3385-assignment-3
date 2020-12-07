<?php
    use Framework\Controller;
    use Framework\View;
    
    class ProfileController extends Controller{
        public function run():void{
            // $this->setModel(new UserModel());
            $this->setMapper(new UserMapper());
            $this->setView(new View());
            $this->getSessionManager()->create();

            if (isset($_SESSION["user"])) {
                if($this->getSessionManager()->accessible($_SESSION["user"], "profile")) {
                    // $this->getModel()->makeConnection();
                    $this->getView()->setTemplate("../../comp3385-assign-3-framework-400002413/tpl/profile.tpl.php");
                    $this->getView()->addVar("courses", $this->getMapper()->findCourses());
                    $this->getView()->display();
                    $this->getResponseHandler()->getHeader()->setData("Success");
                    $this->getResponseHandler()->getState()->setData("Success");
                    $this->getResponseHandler()->getLogResponse()->setData("Profile successfully visited");
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                } else {
                    $this->getResponseHandler()->getHeader()->setData("Error");
                    $this->getResponseHandler()->getState()->setData("Error");
                    $this->getResponseHandler()->getLogResponse()->setData("Profile unsuccessfully visited");
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                    header("Location: index.php");
                }
            } else {
                $this->getResponseHandler()->getHeader()->setData("Error");
                $this->getResponseHandler()->getState()->setData("Error");
                $this->getResponseHandler()->getLogResponse()->setData("Profile unsuccessfully visited");
                $this->getSessionManager()->create();
                $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                header("Location: index.php");
            }
        }
    }
?>