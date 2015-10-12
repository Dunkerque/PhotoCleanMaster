<?php
/**
 * Created by PhpStorm.
 * User: lopez
 * Date: 09/10/2015
 * Time: 19:30
 */
include("lib/autoload.php");
include("lib/db.php");

$db = Database::getInstance();

if(filter_input(INPUT_SERVER, "REQUEST_METHOD") != "POST" && strtolower(filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH')) !== 'xmlhttprequest') {

    $redirect = ActionUser::redirect("index");
}


$data = filter_input_array(INPUT_POST, array(
    "tarif-format" => FILTER_SANITIZE_NUMBER_INT,
    "name-format" => FILTER_SANITIZE_STRING,
));

$format = new Format();
$valid = true;
$error = array(
    'statut' => 'error',
);
if($format->setTarif($data['tarif-format']) == false){
    $error["tarif"] = "Le tarif ne peux pas contenir de chiffre ou ne peux etre vide";
    $valid = false;
}

if($format->setFormat($data['name-format']) == false) {
    $error["format"] = 'Le format n\'est pas correct';
    $valid = false;
}
if($valid == true){
    $save = new FormatManager($db);
    if($save->isDuplicate($data['name-format'])){
        $error['duplicate'] = 'Le nom du format existe deja';
    }else{
        $save->save($data);
        $error['statut'] = 'success';
    }

}
header("Content-type : application/json");
echo json_encode($error);
