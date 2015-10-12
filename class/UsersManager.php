<?php

/**
 * Created by PhpStorm.
 * User: danny
 * Date: 04/10/2015
 * Time: 14:57
 */
class UsersManager
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    /**
     * @param $email @param mdp = null
     * Retourne les informations de l'utilisateur en precisant son email
     * @return mixed
     */
    public function getUsersInfo($email, $pass = null)
    {
        if($pass){
            $oPrepare = $this->db->query("SELECT * FROM ph_users WHERE email = " . $this->db->quote($email) . " AND mdp = ".$this->db->quote($pass));
        }
        else{
            $oPrepare = $this->db->query("SELECT * FROM ph_users WHERE email = " .$this->db->quote($email));
        }
        //FETCH_CLASS permet d'instance la classe users et donc d'utiliser les getters et setters de celui-ci.
        $oPrepare->setFetchMode(PDO::FETCH_CLASS, 'Users');
        $user = $oPrepare->fetch();
        return $user;
    }

    public function getAllMessage($order = "ASC")
    {
        $oPrepare = $this->db->query("SELECT * FROM ph_users u INNER JOIN ph_commande c ON u.id_client = c.id_client INNER JOIN ph_produit p ON c.id_commande = p.id_commande ORDER BY id_produit $order");
        $oPrepare->setFetchMode(PDO::FETCH_CLASS, 'Users');
        $shipment = $oPrepare->fetchAll();
        return $shipment;
    }
}