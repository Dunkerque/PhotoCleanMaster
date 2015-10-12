<?php
/**
 * Created by PhpStorm.
 * User: danny
 * Date: 04/10/2015
 * Time: 12:49
 */
session_start();
session_destroy();
unset($_SESSION);
header("Location:login.php?m=deconnexion");
