<?php
    use Framework\Controller;
    use Framework\View;
    use Framework\Mapper;
    
    class StreamsController extends Controller{
        public function run():void{
            // $this->setModel(new StreamModel());
            $this->setMapper(new StreamMapper());
            $this->setView(new View());
            $this->getSessionManager()->create();
            // $this->getModel()->makeConnection();
            $this->getView()->setTemplate("../../comp3385-assign-3-framework-400002413/tpl/streams.tpl.php");
            $this->getView()->addVar("streams", $this->getMapper()->findStreams());
            $this->getView()->display();
            $this->getResponseHandler()->getHeader()->setData("Success");
            $this->getResponseHandler()->getState()->setData("Success");
            $this->getResponseHandler()->getLogResponse()->setData("Streams successfully visited");
            $this->getSessionManager()->add("Response Handler", $this->getResponseHandler());     
        }
    }
?>