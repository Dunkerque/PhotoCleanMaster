<?php
session_start();
/**
 * Created by PhpStorm.
 * User: danny
 * Date: 04/10/2015
 * Time: 15:50
 */
include("lib/autoload.php");
include("lib/db.php");

$db = Database::getInstance();

// Check method
if(filter_input(INPUT_SERVER, "REQUEST_METHOD") != "POST" && strtolower(filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH')) !== 'xmlhttprequest') {

        $redirect = ActionUser::redirect("index");
}


// Retrive form values
$data = filter_input_array(INPUT_POST, array(
    'user-name' => FILTER_SANITIZE_STRING,
    'user-family-name' => FILTER_SANITIZE_STRING,
    'user-login' => FILTER_SANITIZE_STRING,
    'user-email' => FILTER_SANITIZE_EMAIL,
    'user-tel' => FILTER_SANITIZE_NUMBER_INT,
    'user-adress' => FILTER_SANITIZE_STRING,
    'user-password' => FILTER_SANITIZE_STRING
));
$error = array(
    'statut' => 'success',
);
header("Content-type : application/json");
echo json_encode($error);


if(!empty($data['user-password'])){
    $password = md5($data['user-password']);
    $oPrepare = $db->prepare("
    UPDATE ph_users SET
     nom = :nom, prenom = :prenom, login = :login, mdp = :mdp, email = :email, adresse = :adresse, tel = :tel
     WHERE id_client = :id_client");
    $oPrepare->execute(array(
        ":nom" => $data['user-name'],
        ":prenom" => $data['user-family-name'],
        ":login" => $data['user-login'],
        ":mdp" => $password,
        ":email" => $data['user-email'],
        ":adresse" => $data['user-adress'],
        ":tel" => $data['user-tel'],
        ":id_client" => $_SESSION['id_client'],
    ));
}
else{
    $oPrepare = $db->prepare("
    UPDATE ph_users SET
     nom = :nom, prenom = :prenom, login = :login, email = :email, adresse = :adresse, tel = :tel
     WHERE id_client = :id_client");
    $oPrepare->execute(array(
        ":nom" => $data['user-name'],
        ":prenom" => $data['user-family-name'],
        ":login" => $data['user-login'],
        ":email" => $data['user-email'],
        ":adresse" => $data['user-adress'],
        ":tel" => $data['user-tel'],
        ":id_client" => $_SESSION['id_client'],
    ));
}

