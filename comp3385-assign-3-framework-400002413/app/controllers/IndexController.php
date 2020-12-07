<?php
    use Framework\Controller;
    use Framework\View;
    
    class IndexController extends Controller{
        public function run():void{
            // $this->setModel(new CourseModel());
            $this->setMapper(new CourseMapper());
            $this->setView(new View());
            // $this->getModel()->makeConnection();
            $this->getView()->setTemplate("../../comp3385-assign-3-framework-400002413/tpl/index.tpl.php");
            $this->getView()->addVar("mostpopular", $this->getMapper()->findMostPopular());
            $this->getView()->addVar("learnerrecommended", $this->getMapper()->findLearnerRecommended());
            $this->getResponseHandler()->getHeader()->setData("Normal");
            $this->getResponseHandler()->getState()->setData("Normal");
            $this->getResponseHandler()->getLogResponse()->setData("Index page was visted successfully");
            $this->getSessionManager()->create();
            $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
            $this->getView()->display();
        }
    }
?>