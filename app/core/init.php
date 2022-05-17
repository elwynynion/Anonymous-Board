<?php

require_once('app/core/functions.php');

spl_autoload_register(function($class){
    require_once $_SERVER['DOCUMENT_ROOT'].'/app/classes/'.$class.'.php';
});