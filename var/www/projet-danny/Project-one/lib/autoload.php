<?php
function __autoload($className)
{
    $className = strtolower($className);
    require("../class/".$className."php");
}