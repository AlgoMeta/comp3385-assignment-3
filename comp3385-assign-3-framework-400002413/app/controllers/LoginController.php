<?php
    use Framework\Controller;
    use Framework\View;
    
    class LoginController extends Controller{

        public function run():void {
            $this->setView(new View());
            $this->setModel(new UserModel());
            $this->getModel()->makeConnection();
            $this->getView()->setTemplate("../../comp3385-assign-2-framework-400002413/tpl/login.tpl.php");
            $this->getSessionManager()->create();

            if (isset($_SESSION["user"])) {
                if (!$this->getSessionManager()->accessible($_SESSION["user"], "login")) {
                    header("Location: index.php?controller=Profile");
                }
            }

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $email = $this->commandContext->get("email");
                $password = $this->commandContext->get("password");

                if ($this->getModel()->findRecord($email) == array()) {
                    $this->getView()->addVar("loginError", "Invalid email/password");
                    $this->getResponseHandler()->getHeader()->setData("Header", "Error");
                    $this->getResponseHandler()->getState()->setData("State", "Error");
                    $this->getResponseHandler()->getLogResponse()->setData("Logger", "Login unsuccessful");
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                    $this->getView()->display();
                } elseif (!password_verify($password, $this->getModel()->findRecord($email)[0]["password"])) {
                    $this->getResponseHandler()->getHeader()->setData("Header", "Error");
                    $this->getResponseHandler()->getState()->setData("State", "Error");
                    $this->getResponseHandler()->getLogResponse()->setData("Logger", "Login unsuccessful");
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                    $this->getView()->addVar("loginError", "Invalid email/password");
                    $this->getView()->display();
                } else {
                    $this->getResponseHandler()->getHeader()->setData("Header", "Success");
                    $this->getResponseHandler()->getState()->setData("State", "Success");
                    $this->getResponseHandler()->getLogResponse()->setData("Logger", "Login successful");
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("user", $email);
                    header("Location: index.php?controller=Profile");
                }
            } else {
                $this->getResponseHandler()->getHeader()->setData("Header", "Normal");
                $this->getResponseHandler()->getState()->setData("State", "Normal");
                $this->getResponseHandler()->getLogResponse()->setData("Logger", "Login page was visted successfully");
                $this->getSessionManager()->create();
                $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                $this->getView()->display();
            }
        }
    }
?>