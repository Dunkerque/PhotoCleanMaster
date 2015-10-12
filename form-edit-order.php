<?php
include("lib/autoload.php");
include("lib/db.php");

if(filter_input(INPUT_SERVER, "REQUEST_METHOD") != "POST" && strtolower(filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH')) !== 'xmlhttprequest') {

    $redirect = ActionUser::redirect("index");
}

$db = Database::getInstance();

$data = filter_input_array(INPUT_POST, array(
    'order_statut' => FILTER_SANITIZE_STRING,
    'id_commande' => FILTER_SANITIZE_NUMBER_INT,
));
$error = array(
    'statut' => 'success',
);
$update = new OrdersManager($db);
$update->update($data['order_statut'], $data['id_commande']);

header("Content-type : application/json");
echo json_encode($error);
