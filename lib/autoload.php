<?php
function __autoload($className)
{
    $className = ucfirst($className);
    $className = str_replace("\\", "/", $className);
    require_once("class/".$className.".php");
}
