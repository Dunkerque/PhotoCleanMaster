<?php

/**
 * Created by PhpStorm.
 * User: danny
 * Date: 03/10/2015
 * Time: 14:25
 */
class Database
{
    private static $db = null;
    private static $db_host;
    private static $db_name;
    private static $db_user;
    private static $db_pass;

    public static function setConfiguration($host, $dbname, $user, $pass)
    {
        self::$db_host = $host;
        self::$db_name = $dbname;
        self::$db_user = $user;
        self::$db_pass = $pass;
    }
    // retourne une seul instance de la connection de la bdd
    public static function getInstance()
    {
        if(self::$db) return self::$db;
        try
        {
            self::$db = new PDO('mysql:host='.self::$db_host.';dbname='.self::$db_name,self::$db_user, self::$db_pass);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->exec("SET CHARACTER SET utf8");
            return self::$db;
        }
        catch (Exception $e)
        {
            echo "Echec de la connexion bdd.";
            @mail("dannypachecolopez@gmail.com", "Echec de la connexion à la base de données.", "Message technique : " . $e->getMessage() . "\nPage: " . $e->getFile() . "\nLigne: " . $e->getLine(), "From: " ."dannypachecolopez@gmail.com");
            die();


        }
    }

}