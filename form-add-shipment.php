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
    "tarif-shipment" => FILTER_SANITIZE_NUMBER_INT,
    "transport-shipment" => FILTER_SANITIZE_STRING,
));

$shipment = new Shipment();
$valid = true;
$error = array(
    'statut' => 'error',
);
if($shipment->setTarif($data['tarif-shipment']) == false){
   $error["tarif"] = "Le tarif ne peux pas contenir de chiffre ou ne peux etre vide";
   $valid = false;
}

if($shipment->setTransport($data['transport-shipment']) == false) {
    $error["transport"] = 'Le transporteur ne peux etre vide';
   $valid = false;
}
if($valid == true){
    $save = new ShipmentManager($db);
    $save->save($data);
    $error['statut'] = 'success';
}
header("Content-type : application/json");
echo json_encode($error);
