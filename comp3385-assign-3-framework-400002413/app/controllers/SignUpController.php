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
					// $this->setModel(new UserModel());
					$this->setMapper(new UserMapper());
            		$this->setView(new View());
            		$this->getView()->setTemplate("../../comp3385-assign-3-framework-400002413/tpl/signup.tpl.php");
					// $this->getModel()->makeConnection();
					$user = new User($fullName, $email, password_hash($password, PASSWORD_DEFAULT));
            		$this->getMapper()->insert($user);
            		$this->getResponseHandler()->getHeader()->setData("Normal");
	            	$this->getResponseHandler()->getState()->setData("Normal");
	            	$this->getResponseHandler()->getLogResponse()->setData("User registered successfully");
	            	$this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                    header("Location: index.php?controller=Login");
                } else {
                	$this->setView(new View());
                	$this->getView()->setTemplate("../../comp3385-assign-3-framework-400002413/tpl/signup.tpl.php");
                    $this->getView()->addVar("errorArray", $errorArray);
                    $this->getResponseHandler()->getHeader()->setData("Warning");
	            	$this->getResponseHandler()->getState()->setData("Warning");
	            	$this->getResponseHandler()->getLogResponse()->setData("Form information invalid");
	            	$this->getSessionManager()->create();
	            	$this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
                    $this->getView()->display();
                }
        	} else {
            	$this->setView(new View());
            	$this->getView()->setTemplate("../../comp3385-assign-3-framework-400002413/tpl/signup.tpl.php");
            	$this->getResponseHandler()->getHeader()->setData("Normal");
	            $this->getResponseHandler()->getState()->setData("Normal");
	            $this->getResponseHandler()->getLogResponse()->setData("Signup page was visted successfully");
	            $this->getSessionManager()->create();
	            $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
            	$this->getView()->display();
        	}
        }
    }
?>