<?php
	use Framework\Controller;
    use Framework\View;
	
    class SignUpController extends Controller{
        public function run():void {
			$this->getSessionManager()->create();

            if (isset($_SESSION["user"])) {
                if (!$this->getSessionManager()->accessible($_SESSION["user"], "login")) {
                    header("Location: index.php?controller=Profile");
                }
            }
			
        	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        		$fullName = $this->commandContext->get("fullname");
        		$email = $this->commandContext->get("email");
        		$password = $this->commandContext->get("password");
        		$repassword = $this->commandContext->get("repassword");
        		$agree = $this->commandContext->get("agree");
        		$errorArray = array();

        		if (!$this->getValidator()->nameIsValid($fullName)) {
                    array_push($errorArray, "Name is invalid");
                }

        		if (!$this->getValidator()->emailIsValid($email)) {
                    array_push($errorArray, "Email is invalid");
                }

                if (!$this->getValidator()->passwordsMatch($password, $repassword)) {
                    array_push($errorArray, "Passwords do not match");
                }

                if (!$this->getValidator()->passwordIsValid($password)) {
                    array_push($errorArray, "Password is invalid");
                }

                if (!isset($agree)) {
                    array_push($errorArray, "Please agree to terms");
                }

                if ($errorArray == array()) {
                    $this->getSessionManager()->create();
                    $this->getSessionManager()->add("signupmsg", "Sign Up Successful. Please login below");
                    $this->setModel(new UserModel());
            		$this->setView(new View());
            		$this->getView()->setTemplate("../../comp3385-assign-2-framework-400002413/tpl/signup.tpl.php");
            		$this->getModel()->makeConnection();
            		$this->getModel()->register($fullName, $email, password_hash($password, PASSWORD_DEFAULT));
            		$this->getResponseHandler()->getHeader()->setData("Header", "Normal");
	            	$this->getResponseHandler()->getState()->setData("State", "Normal");
	            	$this->getResponseHandler()->getLogResponse()->setData("Logger", "User registered successfully");
	            	$this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                    header("Location: index.php?controller=Login");
                } else {
                	$this->setView(new View());
                	$this->getView()->setTemplate("../../comp3385-assign-2-framework-400002413/tpl/signup.tpl.php");
                    $this->getView()->addVar("errorArray", $errorArray);
                    $this->getResponseHandler()->getHeader()->setData("Header", "Warning");
	            	$this->getResponseHandler()->getState()->setData("State", "Warning");
	            	$this->getResponseHandler()->getLogResponse()->setData("Logger", "Form information invalid");
	            	$this->getSessionManager()->create();
	            	$this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                    $this->getView()->display();
                }
        	} else {
            	$this->setView(new View());
            	$this->getView()->setTemplate("../../comp3385-assign-2-framework-400002413/tpl/signup.tpl.php");
            	$this->getResponseHandler()->getHeader()->setData("Header", "Normal");
	            $this->getResponseHandler()->getState()->setData("State", "Normal");
	            $this->getResponseHandler()->getLogResponse()->setData("Logger", "Signup page was visted successfully");
	            $this->getSessionManager()->create();
	            $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
            	$this->getView()->display();
        	}
        }
    }
?>