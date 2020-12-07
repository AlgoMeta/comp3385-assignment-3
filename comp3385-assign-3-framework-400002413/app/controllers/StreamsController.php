<?php
    use Framework\Controller;
    use Framework\View;
    
    class StreamsController extends Controller{
        public function run():void{
            $this->setModel(new StreamModel());
            $this->setView(new View());
            $this->getSessionManager()->create();
            $this->getModel()->makeConnection();
            $this->getView()->setTemplate("../../comp3385-assign-2-framework-400002413/tpl/streams.tpl.php");
            $this->getView()->addVar("streams", $this->getModel()->findStreams());
            $this->getView()->display();
            $this->getResponseHandler()->getHeader()->setData("Header", "Success");
            $this->getResponseHandler()->getState()->setData("State", "Success");
            $this->getResponseHandler()->getLogResponse()->setData("Logger", "Streams successfully visited");
            $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());
               
        }
    }
?>