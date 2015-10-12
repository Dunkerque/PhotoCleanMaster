<?php
include("lib/autoload.php");
include("lib/db.php");
$db = Database::getInstance();
if(filter_input(INPUT_SERVER, "REQUEST_METHOD") != "POST" && strtolower(filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH')) !== 'xmlhttprequest') {

    $redirect = ActionUser::redirect("index");
}


$data = filter_input_array(INPUT_POST, array(
    'id_shipment' => FILTER_SANITIZE_NUMBER_INT,
    'tarif_shipment' => FILTER_SANITIZE_NUMBER_INT,
    'transport_shipment' => FILTER_SANITIZE_STRING,
));

$error = array(
    'statut' => 'success',
);
$update = new ShipmentManager($db);
$update->update($_POST['id_shipment'], $_POST['tarif_shipment'], $_POST['transport_shipment']);

header("Content-type : application/json");
echo json_encode($error);
?>
