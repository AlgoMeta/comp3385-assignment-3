<?php
    use Framework\Controller;
    use Framework\View;
    
    class IndexController extends Controller{
        public function run():void{
            $this->setModel(new CourseModel());
            $this->setView(new View());
            $this->getModel()->makeConnection();
            $this->getView()->setTemplate("../../comp3385-assign-2-framework-400002413/tpl/index.tpl.php");
            $this->getView()->addVar("mostpopular", $this->getModel()->findMostPopular());
            $this->getView()->addVar("learnerrecommended", $this->getModel()->findLearnerRecommended());
            $this->getResponseHandler()->getHeader()->setData("Header", "Normal");
            $this->getResponseHandler()->getState()->setData("State", "Normal");
            $this->getResponseHandler()->getLogResponse()->setData("Logger", "Index page was visted successfully");
            $this->getSessionManager()->create();
            $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
            $this->getView()->display();
        }
    }
?>