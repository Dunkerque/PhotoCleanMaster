<?php

/**
 * Created by PhpStorm.
 * User: danny
 * Date: 04/10/2015
 * Time: 20:08
 */
class Orders
{
    private $id_commande;
    private $id_client;
    private $prix;
    private $date_commande;
    private $statut;

    /**
     * @return mixed
     */
    public function getIdCommande()
    {
        return $this->id_commande;
    }

    /**
     * @param mixed $id_commande
     */
    public function setIdCommande($id_commande)
    {
        $this->id_commande = $id_commande;
    }

    /**
     * @return mixed
     */
    public function getIdClient()
    {
        return (int)$this->id_client;
    }

    /**
     * @param mixed $id_client
     */
    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getDateCommande()
    {
        return strftime("%A %d %B %Y",strtotime($this->date_commande));
    }

    /**
     * @param mixed $date_commande
     */
    public function setDateCommande($date_commande)
    {
        $this->date_commande = $date_commande;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

}