<?php

/**
 * Created by PhpStorm.
 * User: lopez
 * Date: 08/10/2015
 * Time: 17:46
 */
class FormatManager
{

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getAllFormat()
    {
        $oPrepare = $this->db->query("SELECT * FROM ph_format");
        $oPrepare->setFetchMode(PDO::FETCH_CLASS, 'Format');
        $format = $oPrepare->fetchAll();
        return $format;
    }
    /**
     * @param $format
     * Retourne si le champs format éxiste déjà ou pas
     * @return mixed
     */
    public function isDuplicate($format){
        $format = (string)($format);
        $oPrepare = $this->db->prepare("SELECT * FROM ph_format WHERE format = ?");
        $oPrepare->execute(array($format));
        $oResultat = $oPrepare->rowCount();
        if($oResultat == 0)
            return false;
        else
            return true;
    }

    public function save($data){
            $oPrepare = $this->db->prepare("INSERT INTO ph_format (format, tarif) VALUES(?,?)");
            $oPrepare->execute(array($data['name-format'], $data['tarif-format']));
    }

    public function delete($data){
        $oPrepapre = $this->db->prepare("DELETE FROM ph_format WHERE id_format = ?");
        $oPrepapre->execute(array($_GET['target']));
    }

    public function update($dataOne, $dataTwo, $dataThree){
        $oPrepare = $this->db->prepare("UPDATE ph_format SET tarif = ? , format = ? WHERE id_format = ?");
        $oPrepare->execute(array($_POST['tarif_format'], $_POST['name_format'], $_POST['id_format']));
    }
}