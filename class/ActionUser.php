<?php
Class ActionUser
{
    private $db = null;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    // verifie si l'admin a entrer les bonnes informations
    /**
     * @param $email @param $password
     * Retourne si l'utilisateur qui se connecte est bien un administrateur
     * @return boolean
     */
    public function checkIsAdmin($email, $password)
    {
        $password = md5($password);
        $oPrepare = $this->db->prepare("SELECT * FROM ph_users WHERE email = ? AND mdp = ? AND type = 1");
        $oPrepare->execute(array($email,$password));
        $oResultat = $oPrepare->rowCount();
        if($oResultat == 0)
            return false;
        else
            return true;
    }
    //message d'utilisateur lors de deconnexion, connection etc ...
    public static function messageUser($type, $content)
    {
        return "<div style='text-align:center;' class='alert alert-{$type}'>{$content} <button class='close'' type='button'>x</button></div>";
    }
    // verifie si l'admin est connecté
    public static function isLogged()
    {
        if(!isset($_SESSION['active']) || $_SESSION['active'] == 0)
            return true;
        return false;
    }

    public static function redirect($path, $param = null)
    {
        if($param){
            header("Location:".$path.".php?$param");
            die();
        }
        else{
            header("Location:".$path.".php");
            die();
        }
    }

}