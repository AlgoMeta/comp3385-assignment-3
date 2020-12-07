<?php
    use Framework\Controller;
    use Framework\View;
    
    class LoginController extends Controller{

        public function run():void {
            $this->setView(new View());
            // $this->setModel(new UserModel());
            $this->setMapper(new UserMapper());
            // $this->getModel()->makeConnection();
            $this->getView()->setTemplate("../../comp3385-assign-3-framework-400002413/tpl/login.tpl.php");
            $this->getSessionManager()->create();

            if (isset($_SESSION["user"])) {
                if (!$this->getSessionManager()->accessible($_SESSION["user"], "login")) {
                    header("Location: index.php?controller=Profile");
                }
            }

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $email = $this->commandContext->get("email");
                $password = $this->commandContext->get("password");

                if ($this->getMapper()->find($email)->getName() == "") {
                    $this->getView()->addVar("loginError", "Invalid email/password");
                    $this->getResponseHandler()->getHeader()->setData("Error");
                    $this->getResponseHandler()->getState()->setData("Error");
                    $this->getResponseHandler()->getLogResponse()->setData("Login unsuccessful");
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                    $this->getView()->display();
                } elseif (!password_verify($password, $this->getMapper()->find($email)->getPassword())) {
                    $this->getResponseHandler()->getHeader()->setData("Error");
                    $this->getResponseHandler()->getState()->setData("Error");
                    $this->getResponseHandler()->getLogResponse()->setData("Login unsuccessful");
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                    $this->getView()->addVar("loginError", "Invalid email/password");
                    $this->getView()->display();
                } else {
                    $this->getResponseHandler()->getHeader()->setData("Success");
                    $this->getResponseHandler()->getState()->setData("Success");
                    $this->getResponseHandler()->getLogResponse()->setData("Login successful");
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("user", $email);
                    header("Location: index.php?controller=Profile");
                }
            } else {
                $this->getResponseHandler()->getHeader()->setData("Info");
                $this->getResponseHandler()->getState()->setData("Info");
                $this->getResponseHandler()->getLogResponse()->setData("Login page was visted successfully");
                $this->getSessionManager()->create();
                $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                $this->getView()->display();
            }
        }
    }
?>