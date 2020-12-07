<?php
    use Framework\FrontController;

    require_once "../../comp3385-assign-3-framework-400002413/autoloader.php";

    $frontController = new FrontController();

    $frontController->getRequestHandler()->route("/", "IndexCommand");
    $frontController->getRequestHandler()->route("/index.php", "IndexCommand");
    $frontController->getRequestHandler()->route("/index.php?controller=SignUp", "SignUpCommand");
    $frontController->getRequestHandler()->route("/index.php?controller=Login", "LoginCommand");
    $frontController->getRequestHandler()->route("/index.php?controller=Profile", "ProfileCommand");
    $frontController->getRequestHandler()->route("/index.php?controller=Courses", "CoursesCommand");
    $frontController->getRequestHandler()->route("/index.php?controller=Streams", "StreamsCommand");
    $frontController->getRequestHandler()->route("/index.php?controller=AboutUs", "AboutCommand");
    $frontController->getRequestHandler()->route("/index.php?controller=Logout", "LogoutCommand");

    $action = basename($_SERVER['REQUEST_URI']);
    $frontController->getRequestHandler()->dispatch($action);
?>