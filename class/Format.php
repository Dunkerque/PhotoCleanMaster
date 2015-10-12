<?php

/**
 * Created by PhpStorm.
 * User: lopez
 * Date: 08/10/2015
 * Time: 17:46
 */
class Format
{
    private $id_format;
    private $format;
    private $tarif;

    /**
     * @return mixed
     */
    public function getIdFormat()
    {
        return $this->id_format;
    }

    /**
     * @param mixed $id_format
     */
    public function setIdFormat($id_format)
    {
        $this->id_format = $id_format;
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param mixed $format
     */
    public function setFormat($format)
    {
        $format = trim($format);
        $len = strlen($format);
        if($len >= 3 && $len <= 10 && ctype_alpha($format)){
            $this->format = $format;
            return true;
        }
        else
            return false;
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

}