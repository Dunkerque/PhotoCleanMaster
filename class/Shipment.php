<?php

/**
 * Created by PhpStorm.
 * User: lopez
 * Date: 08/10/2015
 * Time: 17:46
 */
class Shipment
{
    private $id_shipment;
    private $tarif;
    private $transport;

    /**
     * @return mixed
     */
    public function getIdShipment()
    {
        return $this->id_shipment;
    }

    /**
     * @param mixed $id_shipment
     */
    public function setIdShipment($id_shipment)
    {
        $this->id_shipment = $id_shipment;
    }

    /**
     * @return mixed
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * @param mixed $tarif
     */
    public function setTarif($tarif)
    {
        $tarif = trim((int)$tarif);
        if($tarif){
            $this->tarif = $tarif;
            return true;
        }
        else
            return false;
    }

    /**
     * @return mixed
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param mixed $transport
     */
    public function setTransport($transport)
    {
        $transport = trim($transport);
        $len = strlen($transport);
        if($len >= 3 && $len <= 10){
            $this->transport = $transport;
            return true;
        }
        else
            return false;
    }

}