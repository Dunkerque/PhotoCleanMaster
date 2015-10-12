<?php
include("lib/autoload.php");
include("lib/db.php");

if(filter_input(INPUT_SERVER, "REQUEST_METHOD") != "GET" && strtolower(filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH')) !== 'xmlhttprequest') {

    $redirect = ActionUser::redirect("index");
}


$db = Database::getInstance();

$data = filter_input(INPUT_GET, 'target',FILTER_SANITIZE_NUMBER_INT);

$error = array(
    'statut' => 'success',
);
$delete = new FormatManager($db);
$delete->delete($_GET['target']);
header('Content-type : application/json');
echo json_encode($error);
