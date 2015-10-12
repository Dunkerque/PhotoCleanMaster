<?php
/**
 * Created by PhpStorm.
 * User: danny
 * Date: 30/09/15
 * Time: 15:19
 */
$db_host = "group4.estiam.com";
$db_port = 3306;
$db_database = "project-photo";
$db_user = "root";
$db_pass = "estiam";
try
{
    $db = new PDO('mysqlhost='.$db_host.';port='.$db_port.';dbname='.$db_database,    $db_user, $db_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    var_dump(db);
}
catch (Exception $e)
{
    die("Internal Error gg");
}