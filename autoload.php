<?php
spl_autoload_register(function($className){
    $className = str_replace("\\","/",$className);
    require "./class/".$className.".php";
    });