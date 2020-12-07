<?php

    namespace Framework;
    
    abstract class Model{
        use ModelMethods;

        protected $databaseConnection;
    }
?>