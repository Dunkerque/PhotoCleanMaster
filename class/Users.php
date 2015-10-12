<?php

/**
 * Created by PhpStorm.
 * User: danny
 * Date: 04/10/2015
 * Time: 14:57
 */
class Users
{
    private $id_client;
    private $nom;
    private $prenom;
    private $login;
    private $mdp;
    public $email;
    private $adresse;
    private $tel;

    /**
     * @param mixed $id_client
     */
    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function getId()
    {
        return $this->id_client;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function getMdp()
    {
        return $this->mdp;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function getTel()
    {
        return $this->tel;
    }
}