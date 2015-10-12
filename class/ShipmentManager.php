<?php

/**
 * Created by PhpStorm.
 * User: lopez
 * Date: 08/10/2015
 * Time: 18:11
 */
class ShipmentManager
{
    /**
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * @return mixed
     */
    public function getAllShipment($param = null)
    {
        $oPrepare = $this->db->query("SELECT * FROM ph_shipment");
        $oPrepare->setFetchMode(PDO::FETCH_CLASS, 'Shipment');
        if($param)
        $shipment = $oPrepare->fetch();
        else
            $shipment = $oPrepare->fetchAll();
        return $shipment;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getShipmentFromId($id)
    {
        $oPrepare = $this->db->query("SELECT * FROM ph_shipment WHERE id_shipment = ".$this->db->quote($id));
        $oPrepare->setFetchMode(PDO::FETCH_CLASS, 'Shipment');
        $shipment = $oPrepare->fetch();
        return $shipment;
    }

    /**
     * @param $data
     */
    public function save($data){
        $oPrepare = $this->db->prepare("INSERT INTO ph_shipment (tarif, transport) VALUES(?,?)");
        $oPrepare->execute(array($data['tarif-shipment'], $data['transport-shipment']));
    }

    /**
     * @param $data
     */
    public function delete($data){
        $oPrepapre = $this->db->prepare("DELETE FROM ph_shipment WHERE id_shipment = ?");
        $oPrepapre->execute(array($_GET['target']));
    }

    /**
     * @param $dataOne
     * @param $dataTwo
     * @param $dataThree
     */
    public function update($dataOne, $dataTwo, $dataThree){
        $oPrepare = $this->db->prepare("UPDATE ph_shipment SET tarif = ? , transport = ? WHERE id_shipment = ?");
        $oPrepare->execute(array($_POST['tarif_shipment'], $_POST['transport_shipment'], $_POST['id_shipment']));
    }
}