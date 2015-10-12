<?php

/**
 * Created by PhpStorm.
 * User: danny
 * Date: 04/10/2015
 * Time: 20:08
 */
class OrdersManager
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    /**
     * @param $email @param $param = null
     * Retourne les commandes utilisateurs, si le deuxième paramètres est précisé il retournera qu'une commande
     * @return mixed
     */
    public function getOrders($param = null)
    {
        $oPrepare = $this->db->query("SELECT * FROM ph_commande c INNER JOIN ph_users u ON c.id_client = u.id_client");
        $oPrepare->setFetchMode(PDO::FETCH_CLASS, 'Orders');
        if($param)
        $order = $oPrepare->fetchAll();
        else
            $order = $oPrepare->fetch();
        return $order;
    }

    /**
     * @param $filter
     * Retourne les commandes utilisateurs en se basant sur le statut précisé en param
     * @return mixed
     */

    public function getStatutOrder($filter)
    {
        $oPrepare = $this->db->query("SELECT * FROM ph_commande c INNER JOIN ph_users u ON c.id_client = u.id_client WHERE statut = ".$this->db->quote($filter));
        $oPrepare->setFetchMode(PDO::FETCH_CLASS, "Orders");
        $order = $oPrepare->fetchAll();
        return $order;
    }

    public function getLastOrder($limite = null){
        $oPrepare = $this->db->query("SELECT * FROM ph_commande WHERE statut <> 'Livree' ORDER BY id_commande DESC LIMIT $limite");
        $oPrepare->setFetchMode(PDO::FETCH_CLASS, 'Orders');
        $order = $oPrepare->fetchAll();
        return $order;
    }

    public function getOrderFromId($id)
    {
        $oPrepare = $this->db->prepare("SELECT * FROM ph_commande c INNER JOIN ph_users u ON c.id_client = u.id_client WHERE id_commande = ? ");
        $oPrepare->execute(array($id));
        $editOrder = $oPrepare->fetch(PDO::FETCH_OBJ);
        return $editOrder;
    }
    /**
     * Retourne le total de commande
     * @return mixed
     */
    public function getTotalCommande()
    {
        $oPrepare = $this->db->query("SELECT id_commande, count(*) AS total
FROM ph_commande
ORDER BY id_commande");
        $resultat = $oPrepare->fetch();
        return $resultat;
    }

    public function update($dataOne, $dataTwo){
        $oPrepare = $this->db->prepare("UPDATE ph_commande SET statut = ? WHERE id_commande = ?");
        $oPrepare->execute(array($_POST['statut-order'],  $_POST['idCommande']));
    }
}