<?php
    spl_autoload_register(function ($class) {
        $path = __DIR__ . "/";
        $parts = explode('\\', $class);
        $class = $parts[count($parts) - 1];
        
        $requiredClasses = array(
            "app-commands" =>  $path . "app/commands/" . $class . ".php",
            "app-controllers" =>  $path . "app/controllers/" . $class . ".php",
            "app-models" =>  $path . "app/models/" . $class . ".php",
            "app-domainobjects" =>  $path . "app/domainobjects/" . $class . ".php",
            "app-mappers" =>  $path . "app/mappers/" . $class . ".php",
            "app" =>  $path . "app/" . $class . ".php", 
            "framework" => $path . "framework/" . $class . ".php", 
            "tpl" => $path . "tpl/" . $class . ".php",
            "config" => $path . "config/" . $class . ".php"
        );

        foreach ($requiredClasses as $name => $class) {
            if (file_exists($class)) {
                require_once $class;
            }
        }
    });
?>