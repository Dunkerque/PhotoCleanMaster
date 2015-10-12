<?php

/**
 * Created by PhpStorm.
 * User: danny
 * Date: 04/10/2015
 * Time: 19:34
 */
class Tools
{
    //Outils de debug
    public static function debug($value)
    {
        echo "<pre>", (print_r($value, true)), "</pre>";
    }
}